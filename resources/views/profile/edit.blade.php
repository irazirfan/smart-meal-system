@include('../partials/header')
@include('../partials/navbar')

<div class="container">

    <div class="jumbotron">
        <h2>Update Profile</h2>
    </div>


    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Here</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control input-sm"
                                           value="{{$result->name}}">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm"
                                           value="{{$result->password}}">
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Update" class="btn btn-info btn-block">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
