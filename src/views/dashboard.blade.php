

@extends('aparajitha_ppp::layouts.base')
@section('content')
<?php $page = 'dashboard';  ?>
<div class="app-main__outer">
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="icon-gradient iocn-bg-blue-gradient" style="position: relative;top: -10px;left:-5px">
                    <i class="material-icons vm page-icon" style="font-size: 44px;">dashboard</i>
                    </i>
                </div>
                {{-- <div><span class="page-title">User</span> --}}
                    <div class="page-title-subheading">Dashboard
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
                   
                    </div>

                </div>
            </div>
        </div>
</div>




@endsection