
@extends('aparajitha_ppp::layouts.base')
@section('content')
<?php $page = 'user';  ?>
<div class="app-main__outer">
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="icon-gradient iocn-bg-blue-gradient" style="position: relative;top: -10px;left:-5px">
                    <i class="material-icons vm page-icon" style="font-size: 44px;">people</i>
                    </i>
                </div>
                <div><span class="page-title">User</span>
                    <div class="page-title-subheading">User Register
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <div class="p-4">
                        <ul class="tabs-animated-shadow tabs-animated nav">

                            {{-- <li class="nav-item">
                                <a role="tab" class="nav-link show active" id="tab-add" data-toggle="tab"
                                    href="#tab-add-animated" aria-selected="true">
                                    <span class="nav-text"></span>
                                </a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a role="tab" class="nav-link cities show " id="show-roles" data-toggle="tab"
                                    href="#tab-list-animated" aria-selected="false">
                                    <span class="nav-text">Crete Role</span>
                                </a>
                            </li> --}}

                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane show active" id="tab-list-animated" role="tabpanel">

                                <div class="row">
                                    
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 middle mt-3">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-icon-wrap">
                                                            <i class="material-icons vm" style="top: -15px;right: 0px;">user_register</i>
                                                        </div>
                                                        <h6 class="form-title user-form-title">User Register</h6>
                                                        <form id="user_register_form" method="post" action="{{route('user_action')}}">
                                                        <div class="form-group position-relative">
                                                            <label for="email" class="">Email</label>
                                                            <input type="email" name="email" id="email" required class="form-control form-control-sm" placeholder="Email" autocomplete = "off">
                                                        </div>
                                                        <div class="form-group position-relative">
                                                            <label for="name" class="">Name</label>
                                                            <input type="name" name="name" id="name" required class="form-control form-control-sm" placeholder="Name" autocomplete = "off">
                                                        </div>
                                                        <div class="form-group position-relative">
                                                            <label for="Password" class="">Password</label>
                                                            <input type="password" name="password" id="password" required class="form-control form-control-sm" placeholder="New Password" autocomplete = "off">
                                                        </div>
                                                        <div class="form-group position-relative">
                                                            <label for="Confirm Password" class="">Confirm Password</label>
                                                            <input type="password" name="confirm_password" id="confirm_password" required class="form-control form-control-sm" placeholder="Confirm Password" autocomplete = "off">
                                                        </div>
                                                        
                                                        <button type="submit" class="mt-1 btn btn-primary form-control  btn-md-icon" id="user_register_submit"><i class="material-icons">save</i> Submit</button>
                                                    </form> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

            
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
</div>

<script>
    // change_password
           $("#user_register_submit").click(function(e){
          
            var dataString = $("#user_register_form").serialize();
 
                $.ajax({
                    type: 'POST',
                    url: "{{ route('user_action') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}', 
                        'Accept': 'application/json' 
                    },
                    data:dataString,
                    dataType: "text",
                    success: function (response,textStatus,xhr) {
                        if(xhr.status == 200) {
                            $('#user_register_form').trigger("reset");
                            showtoast(' Successfully registerd.', 'now','tsuccess', 5000);
                        }else {
                            showtoast('Something went wrong', 'now', 'tdanger', 5000);
                        }
                    },
                    error: function (err) {
                        if(err.status == 422) {
                            $('#toast-place').html(''); //Clearing old errors
                            showlaravelerrors(err.responseText);
                        }
                    }
                });
            
            e.preventDefault();



        });

</script>


@endsection