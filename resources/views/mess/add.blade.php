@include('../partials/header')
@include('../partials/navbar')

<div class="container">
    <div class="jumbotron">
        <h2>Create Mess!</h2>
    </div>

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Create</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">

                        {{csrf_field()}}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!--  @csrf -->

                        <div class="form-group">
                            <input type="text" name="mess_name" id="mess_name" class="form-control input-sm"
                                   placeholder="Mess Name">
                            {{session('msg')}}

                        </div>

                        <input type="submit" value="Create" class="btn btn-info btn-block">

                    </form>

                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</div>
