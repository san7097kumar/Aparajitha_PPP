<?php

namespace Sandeep\Aparajitha_PPP\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use DB;
use Mail;
use Carbon\Carbon; 
use Illuminate\Support\Str;
use Sandeep\Aparajitha_PPP\Rules\IsValidPassword;
use Sandeep\Aparajitha_PPP\Models\PasswordHistory;
// use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    //
    public function user(Request $request)
    {
        return view("aparajitha_ppp::pages.access_controller.user");
    }

    public function user_action(Request $request)
    {
        $rules = [
            'name'=>'required|min:5|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                new isValidPassword(),
            ],
            'confirm_password'=>'required_with:password|same:password'
        ];
        $attributes=$request->validate($rules);

        $attributes['password']=bcrypt($attributes['password']);
        $user=User::create($attributes);
        PasswordHistory::create(['user_id'=>$user->id,'password'=>$user->password]);

        // return redirect('/login')->with('success','your account is successfully created');
        return response()->json([
            'success'  => ['message'=>['successfully created']],
        ], 200);
    }

    //Login Action's

    public function login()
    {
        return view("aparajitha_ppp::pages.access_controller.login");
    }

    public function login_action(Request $request)
    {
        $rules = [
            'email'=>'required|email',
            'password' =>'required'
        ];
        $attributes=$request->validate($rules);
        if(auth()->attempt($attributes))
        {
            return redirect('/')->with('success','login successfully');
            
        }

        return back()->with('error','Incorrect email or password');
        
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success','Good Bye!');
    }

    public function dashboard()
    {
        return view("aparajitha_ppp::dashboard");
    }

  

    public function change_password()
    {
        return view("aparajitha_ppp::pages.access_controller.change_password");
    }

    public function change_password_action(Request $request)
    {
        
        $rules = [
            'old_password'=>'required',
            'new_password' => [
                'required',
                'string',
                new isValidPassword(),
            ],
            'confirm_password'=>'required_with:new_password|same:new_password'
        ];
        
        $attributes=$request->validate($rules);
        $count=0;
        $DB_password=User::select('password')->where('id',auth()->user()->id)->first();

        //    return auth()->user()->id;
        //    if (!\Hash::check($request->new_password , $DB_password->password )) 
        //     {
          $passwordHistory=PasswordHistory::select('password')
          ->where('user_id',auth()->user()->id)
          ->orderBy('created_at', 'DESC')
          ->take(5)->get();
          
          foreach($passwordHistory as $history)
          {
            if(\Hash::check($request->new_password , $history->password )) 
            {
               $count=$count+1;
            }
          }

          if($count>0)
          {
            return response()->json([
                'errors'  => ['message'=>['You used this password recently. Please choose a different one.']],
            ], 422);
            // return back()->with('error','You used this password recently. Please choose a different one.');
          }
          
          if(!\Hash::check($request->new_password , $DB_password->password )) 
          {
             if(\Hash::check($request->old_password , $DB_password->password )) 
                {
                    $update_password=bcrypt($request->new_password);
                    $add_new_password=array("password"=>$update_password);
                    $user_update= User::where('id',auth()->user()->id)->update($add_new_password);
                    PasswordHistory::create(['user_id'=>auth()->user()->id,'password'=>$update_password]);
                    // return back()->with('success','Password changed successfully');
                    return response()->json([
                        'success'  => ['message'=>['Password changed successfully']],
                    ], 200);
                }
                else
                {
                    return response()->json([
                                'errors'  => ['message'=>['Incorrect old password']],
                            ], 422);
                }
            }
            else
            {
                return response()->json([
                    'errors'  => ['message'=>['You used this password recently. Please choose a different one.']],
                ], 422);
            }

    }

    //forgotpassword 

    public function forgot_password()
    {
        return view("aparajitha_ppp::pages.access_controller.forgot_password");
    }

    public function forgot_password_action(Request $request)
    {
        
        $validator = $request->validate([
            'email' => 'required|email|exists:users',
        ],
        [
            'email.exists'=> 'This email address is not found ', // custom message
           ]
        );

        // $user = User::where('email',$request->email)->whereNull('deleted_at')->first();
        // if($user == null){
        //     // return 'User Not found';
        //     // return Redirect::back()->withErrors(['error' => 'User Not found']);
        //     return redirect()->back()->with('error', 'This email address is not found');   
        // }
        $token =Str::random(64);
    
          DB::table('password_resets')->insert(
              ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
          );
    
          Mail::send('aparajitha_ppp::emails.verify', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password Notification');
          });
    
          return back()->with('success', 'We have e-mailed your password reset link!');

    }


    public function getPassword($token) { 
        auth()->logout();
        return view('aparajitha_ppp::pages.access_controller.reset_password', ['token' => $token]);
     }

     public function updatePassword(Request $request)
     {

    
        $rules = [
            'email' => 'required|email|exists:users',
            'new_password' => [
                'required',
                'string',
                new isValidPassword(),
            ],
            'confirm_password'=>'required_with:new_password|same:new_password',
            // 'token'=>'required'
        ];
        
        $attributes=$request->validate($rules);
        // return $request->token;
   
     $updatePassword = DB::table('password_resets')
                         ->where(['email' => $request->email, 'token' => $request->token])
                         ->first();
   
                        
     if(!$updatePassword)
         return back()->withInput()->with('error', 'Invalid token!');
   
         $count=0;
         $DB_password=User::select('password','id')->where('email',$request->email)->first();
         $user_id=$DB_password->id;
           $passwordHistory=PasswordHistory::select('password_histories.password')
           ->join('users','users.id','=','password_histories.user_id')
           ->where('users.email',$request->email)
           ->orderBy('password_histories.created_at', 'DESC')
           ->take(5)->get();
           
           foreach($passwordHistory as $history)
           {
             if(\Hash::check($request->new_password , $history->password )) 
             {
                $count=$count+1;
             }
           }
 
           if($count>0)
           {
            //  return response()->json([
            //      'errors'  => ['message'=>['You used this password recently. Please choose a different one.']],
            //  ], 422);
             return back()->with('error','You used this password recently. Please choose a different one.');
           }
           
           if(!\Hash::check($request->new_password , $DB_password->password )) 
           {
                $update_password=bcrypt($request->new_password);
                $add_new_password=array("password"=>$update_password);
                $user_update= User::where('id',$user_id)->update($add_new_password);
                PasswordHistory::create(['user_id'=>$user_id,'password'=>$update_password]);
                return back()->with('success','Password changed successfully');
           }
           else
            {
                return back()->with('error', 'You used this password recently. Please choose a different one.');
            }



   
       DB::table('password_resets')->where(['email'=> $request->email])->delete();
   
       return back()->with('success', 'Your password has been changed!');
   
     }



}
