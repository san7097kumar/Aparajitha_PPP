<?php

namespace Sandeep\Aparajitha_PPP\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Sandeep\Aparajitha_PPP\Rules\IsValidPassword;
use Sandeep\Aparajitha_PPP\Models\PasswordHistory;

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




}
