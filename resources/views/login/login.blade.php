@include('../partials/header')
@include('../partials/navbar')

<div class="container">
    <div class="jumbotron">
        <h2>Login!</h2>
    </div>

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Login</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">

                        {{csrf_field()}} 
                        <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                       <!--  @csrf -->

                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control input-sm"
                                   placeholder="Email Address">
                                   {{session('msg')}}
            
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-sm"
                                   placeholder="Password">

                        </div>

                        <input type="submit" value="Login" class="btn btn-info btn-block">

                    </form>

                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</div>