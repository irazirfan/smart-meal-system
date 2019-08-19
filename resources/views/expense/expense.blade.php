@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')

<br>

<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-4 col-md-8 col-sm-offset-2 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Expenses</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="amount" id="amount" class="form-control input-sm" placeholder="Enter amount">
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="item" id="item" class="form-control input-sm" placeholder="Items(Optional)">
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <input type="date" name="date" id="date" class="form-control input-sm" placeholder="">
                                </div>
                            </div>



                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-info btn-block">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <br><br><br>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Name</th>
            <th scope="col">Item</th>
            <th scope="col">Amount</th>
        </tr>
        </thead>
        <tbody>

        <input type="hidden" {{$total_amount = 0}}>

        @foreach($result as $value)
            <tr>
            <th scope="row">{{$value->date}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->item}}</td>
                <td>{{$value->amount}}</td>

        </tr>
        <input type="hidden" {{$total_amount += $value->amount}}>
        @endforeach

        <tr>
            <th scope="row">Total</th>
            <td></td>
            <td></td>
            <td>{{$total_amount}}</td>
        </tr>
        </tbody>
    </table>

</div>
