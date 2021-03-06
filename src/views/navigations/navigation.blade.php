<div class="app-sidebar sidebar-shadow">
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
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">

               
                <!-- <li>
                    <a href="">
                        <i class="metismenu-icon material-icons" style="font-size:28px!important">history</i>
                        View History
                    </a>
                </li> -->

            
                
              
             
                
          
            

                <li class="app-sidebar__heading">Access Controls</li>
                
                <li>
                    <a href="{{route('user')}}" <?=($page == 'user'? 'class="mm-active"' : '')?>>
                        <i class="metismenu-icon fa fa-id-user-o fs-19">
                        </i>User
                    </a>
                </li>
                <li>
                    <a href="" <?=($page == 'roles'? 'class="mm-active"' : '')?>>
                        <i class="metismenu-icon fa fa-id-card-o fs-19">
                        </i>Roles
                    </a>
                </li>

 
                <li>
                <a href="" <?=($page == 'users'? 'class="mm-active"' : '')?>>
                    <i class="metismenu-icon material-icons fs-19" style="font-size: 22px!important;">people_alt</i>
                        Users and Access 
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>