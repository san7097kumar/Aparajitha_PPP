
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verify Your Email Address</div>
                      <div class="card-body">
                       @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                               {{ __('A fresh verification link has been sent to your email address.') }}
                           </div>
                       @endif
                       <a href="{{ url('/') }}/user/reset_password/{{$token}}">Click Here or Copy and Paste the Below link</a>.<br>
                       <p>{{ url('/') }}/user/reset_password/{{$token}}</p>
                   </div>
               </div>
           </div>
       </div>
   </div>
</body>
</html>