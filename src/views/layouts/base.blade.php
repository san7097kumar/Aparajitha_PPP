
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Aparajitha | Making Corporate India Comply</title>
    <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Aparajitha Application">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/png" href="{{ asset('./aparajitha/favicon16x16.png') }}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ asset('./aparajitha/favicon32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('./aparajitha/favicon96x96.png') }}" sizes="96x96">

    @php
    $starurl = asset('./aparajitha/assets/images/star.png');
    @endphp
    <style>
    .dataTables_processing{
        position:relative;
    }
    .btn-open-options{
        display:none!important;
    }
    .star-load {
    width: 80px;
    height: 80px;
    position: absolute;
    left: 50%;
    /* centers the loading animation horizontally one the screen */
    top: 50%;
    /* centers the loading animation vertically one the screen */
    background-image: url("{{ $starurl }}");
    /* path to your loading animation */
    background-repeat: no-repeat;
    background-position: center;
    margin: -100px 0 0 -60px;
    /* is width and height divided by two */
    margin-top:-40px;
    animation-name: spin;
  animation-duration: 2000ms;
  animation-iteration-count: infinite;
  animation-timing-function: linear; 
  opacity: 0.65;
  background-size: 50px;
    }
    .dataTables_wrapper table{
    min-height:   120px;
    }
    div.dataTables_processing {
    margin-top: 7px!important;
}
    div.dataTables_wrapper div.dataTables_processing {
    background: transparent;
    box-shadow: none;
}
    @keyframes spin {
        from {
            transform:rotate(0deg);
        }
        to {
            transform:rotate(360deg);
        }
    }
    </style>
    <link href="{{ asset('aparajitha/css/main.css') }}" rel="stylesheet">

    <!-- Bootstrap Design Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
    
    <link href="{{ asset('aparajitha/assets/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('aparajitha/assets/css/jquery-ui.css') }}">
    <!-- <link rel="stylesheet" href="./assets/css/datepicker.css"> -->
    <link rel="stylesheet" href="{{ asset('aparajitha/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('aparajitha/assets/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('aparajitha/assets/css/bootstrap-tagsinput.css') }}">

    <link rel="stylesheet" href="{{ asset('aparajitha/assets/css/dropzone.min.css') }}">

    <link href="{{ asset('aparajitha/css/custom.css') }}?v=1.003" rel="stylesheet">

    <script src="{{ asset('aparajitha/assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('aparajitha/assets/scripts/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('aparajitha/assets/scripts/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('aparajitha/assets/scripts/jquery-ui.js') }}"></script>
    <script src="{{ asset('aparajitha/assets/scripts/jquery.dataTables.min.js') }}"></script>
    <!-- <script src="./assets/scripts/bootstrap-datepicker.js"></script>  -->
    <script src="{{ asset('aparajitha/assets/scripts/moment.min.js') }}"></script>
    <script src="{{ asset('aparajitha/assets/scripts/wow.min.js') }}"></script>
    <script src="{{ asset('aparajitha/assets/scripts/dropzone.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    
    <!-- bootstrap paginate button design link -->
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js'></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('aparajitha/assets/css/fonts.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400&display=swap" rel="stylesheet">

    <script  src="{{ asset('aparajitha/js/script.js') }}"></script>
    <script>
    //Datatable error mode
    $.fn.dataTable.ext.errMode = 'throw'; //none to disable

    //Initializing Wow ja
    new WOW().init();
    </script>

</head>


<body>
     
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="position-fixed" id="toast-place" style="top:5px; right:20px;z-index:9999;">
        </div>
      </div>
      <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
          <div class="app-header header-shadow">
              <div class="app-header__logo">
                  <div class="logo-src"></div>
                  <div class="header__pane ml-auto">
                      <div>
                          <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                              data-class="closed-sidebar">
                              <span class="hamburger-box">
                                  <span class="hamburger-inner"></span>
                              </span>
                          </button>
                      </div>
                  </div>
              </div>
              <div class="app-header__mobile-menu">
                  <div>
                      <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                          <span class="hamburger-box">
                              <span class="hamburger-inner"></span>
                          </span>
                      </button>
                  </div>
              </div>
              <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>

            {{-- ooooooooooooooooooooooooooo00000000000000000000000000000000000000000000000000 --}}
            <div class="app-header__content">

                <div class="app-header-right">
                  <div class="header-btn-lg pr-0">
                      <div class="widget-content p-0">
                          <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                  
                            
                                  <!-- <a title="Settings">
                                      <span class="material-icons settings-btn-nav">settings</span>
                                  </a> -->
                                  <a title="Log Out">
                                      <span class="material-icons-outlined logout-btn-nav">power_settings_new</span>
                                  </a>
                                  <div class="btn-group" id="grpbtn">
                                      <a data-toggle="dropdown" aria-haspopup="true"  aria-expanded="true" id="UserMenuButton" class="p-0 btn">
                                          <img width="50" class="rounded-circle" src="{{ asset('aparajitha/assets/images/user.svg') }}" alt="">
                                          <i id="menu-arrow" class="fa fa-angle-up opacity-8"></i>
                                      </a>
                                      <div tabindex="-1" role="menu" id="UserMenuView" aria-hidden="true" class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-184px, 48px, 0px);">
                                      <a href="{{route('change_password')}}" style="text-decoration: none;">
                                          <button type="button" tabindex="0" class="dropdown-item"><i class="material-icons dropdown-icon">key</i> Change Password</button>
                                      </a>
                                      <form action="{{route('logout')}}" method="post" id="logout-form" class="">
                                              @csrf
                                               <button type="submit" id="logout-link" class="dropdown-item"><i class="material-icons dropdown-icon">logout</i>  Logout</button>
                                     </form>
                                      </div>
                                  </div>
                              </div>
                              <div class="widget-content-left  ml-3 header-user-info">
                                  <div class="widget-heading text-capitalize">
                                      {{auth()->user()->name}}
                                  </div>
                                  <div class="widget-subheading">
                                      
                                     
                                  </div>
                              </div>
                             
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            {{-- 0000000000000000000000000000000000000000000000000000000000000000000000000000000000000 --}}
          </div>

          @include('aparajitha_ppp::includes.themes')
          <div class="app-main">
            @include('aparajitha_ppp::navigations.navigation')
            @yield('content')
          </div>

           <!-- Footer -->
           <div class="app-wrapper-footer">
            <div class="app-footer">
                <div class="app-footer__inner" style="padding-left: 30px;">
                    <div class="app-footer-right">
                        <small style="font-family:muli;">© 2022, Aparajitha. All Rights Reserved.</small>
                        <ul class="nav">
                            <li class="nav-item"> </li>
                            <li class="nav-item"> </li>
                        </ul>
                    </div>
                    <div class="app-footer-right">
                        <ul class="nav">
                            <li class="nav-item"> </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link footer-logo">
                                    <img src="{{ asset('aparajitha/assets/images/logo-inverse.png') }}" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
        
  </div>    

      

      <script>
 $(function() {
            $('.logout-btn-nav').click(function(){
                $('#logout-link').click();
            })

            $('#logout-link').on('click', function() {
                localStorage.setItem('logout-event', 'logout' + Math.random());
            });
            window.addEventListener('storage', function(event){
                if (event.key == 'logout-event') { 
                    $('#logout-form').submit();
                }
            });
            @if(Auth::check()) 
                localStorage.setItem('login-event','login'+Math.random());
            @endif

        });

        $("#grpbtn").hover(            
            function() {
                $( "#menu-arrow" ).removeClass( "fa-angle-up" ).addClass( "fa-angle-down" );
                $('#UserMenuView', this).not('.in #UserMenuView').stop(true,true).fadeIn();
                $(this).toggleClass('open');        
            },
            function() {
                $( "#menu-arrow" ).removeClass( "fa-angle-down" ).addClass( "fa-angle-up" );
                $('#UserMenuView', this).not('.in #UserMenuView').stop(true,true).fadeOut();
                $(this).toggleClass('open');       
            }
        );
      </script>  


      <script type="text/javascript" src="{{ asset('aparajitha/assets/scripts/main.js') }}"></script>
      <script src="{{ asset('aparajitha/assets/scripts/select2.min.js') }}"></script>
      <script src="{{ asset('aparajitha/assets/scripts/bootstrap.min.js') }}"></script>
     
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,500,600">
</body>

</html>