@include('../partials/header')

<body class="home">
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">

            <div class="navi">
                <ul>

                    <li class=""><a href="/"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>


                    <li><a href="/mess"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Mess</span></a></li>
                    <li><a href="/expense"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Expenses</span></a></li>
                    <li><a href="/meal"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Meal</span></a></li>
                    <li><a href="/calculation"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calculation</span></a>
                    </li>
                    <li><a href="/tomorrows_meal"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tomorrow's Total Meal</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 col-sm-11 display-table-cell v-align">
{{--            <button type="button" class="slide-toggle">Slide Toggle</button>--}}
            <div class="row">
                <header>
                    <div class="col-md-7">
                        <nav class="navbar-default pull-left">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas"
                                        data-target="#side-menu" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        </nav>
                        <div class="search hidden-xs hidden-sm">
                            <input type="text" placeholder="Search" id="search">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="header-rightside">
                            <ul class="list-inline header-top pull-right">

                                @if(session('user_type')== 'manager' && session('mess_id') == null)
                                <li>
                                    <a href="/mess/create" class="view btn-sm active">Create Mess</a>
                                </li>
                                @endif

                                @if($user->status == 'invited')
                                    <li>
                                        <a href="/mess/invitation/{{session('mess_id')}}" class="view btn-sm active">Mess Invitation</a>
                                    </li>
                                @endif

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                                            src="https://image.flaticon.com/icons/svg/17/17004.svg" alt="user">
                                        <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-content">
                                                <span>@if(session('user') != null) {{$user->name}} @endif</span>
                                                <div class="divider">
                                                </div>
                                                <a href="/profile" class="view btn-sm active">View
                                                Profile</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
            </div>
