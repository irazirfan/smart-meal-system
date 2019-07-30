<nav class="navbar navbar-inverse">
    <!--    <div class="container">-->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Smart Meal Sytem</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li id="home"><a href="/">HOME</a></li>
            <li id="about"><a href="about">ABOUT US</a></li>
            <li id="contact"><a href="contact">CONTACT US</a></li>
            
            @if(session()->has('user')){
                <li id=""><a href="/logout">LOGOUT</a></li>
            }
            @else{
                <li id=""><a href="/register">SIGN UP</a></li>
                <li id=""><a href="/login">LOGIN</a></li>
            }
            @endif

        </ul>
    </div>
    <!--    </div>-->
</nav>