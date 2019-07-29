@include('../partials/header')
@include('../partials/navbar')


<div class="container">
    <div class="jumbotron">
        <h2>Sign Up!</h2>
    </div>
</div>

        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign Up</h3>
            </div>
            <div class="panel-body">
                <form method="post">
                    @csrf
                    <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-8">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control input-sm"
                                           placeholder="Name">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-8">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control input-sm"
                                       placeholder="Email">
                                </div>
                            </div>
                            
                            <div class="col-xs-6 col-sm-6 col-md-8">
                                <div class="form-group">
                                <input type="password" name="password" class="form-control input-sm"
                                       placeholder="Password">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-8">
                                <div class="form-group">
                                    <select style="height: 100%; width: 100%;padding-top: 1px">
                                    <option name="user_type" value="">Select User Type</option>
                                    <option name="user_type" value="memeber">Member</option>
                                    <option name="user_type" value="manager">Manager</option>
                                </select>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-8">
                                <input class="btn btn-info btn btn-block" type="submit" value="Save">
                            </div>

                            
                            </div>
                        </div>
                </form>
            </div>
        </div>

        </div>
</div>