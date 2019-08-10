@include('../partials/header')
@include('../partials/navbar')

<div class="container">

    <div class="jumbotron">
        <h2>Create Mess</h2>
    </div>


    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create Here</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="mess_id" id="mess_id" class="form-control input-sm" placeholder="Mess ID">

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="mess_name" id="mess_name" class="form-control input-sm" placeholder="Mess Name">

                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Create" class="btn btn-info btn-block">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
