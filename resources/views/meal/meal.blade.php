@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')

<br>

<div class="col-md-12 col-md-offset-5">
    <h4>Tomorrow Meals</h4>

    <div class="col-md-2">

        <form role="form" method="post">
            <div class="funkyradio">
                <div class="funkyradio-success">
                    @csrf
                    <input type="checkbox" name="breakfast" id="breakfast"
                    @if($meal->breakfast == 1)
                    checked
                    @endif
                    />
                    <label for="breakfast">Breakfast</label>
                </div>
                <div class="funkyradio-success">
                    <input type="checkbox" name="lunch" id="lunch"
                    @if($meal->lunch == 1)
                    checked
                    @endif
                    />
                    <label for="lunch">Lunch</label>
                </div>
                <div class="funkyradio-success">
                    <input type="checkbox" name="dinner" id="dinner"
                           @if($meal->dinner == 1)
                           checked
                        @endif
                    />
                    <label for="dinner">Dinner</label>
                </div>
                <br>
                <input type="submit" value="Save" class="btn btn-info btn-block">
            </div>
        </form>
    </div>
</div>






<body class="large-screen">
<div class="col-md-12 col-md-offset-5">
    <br><br><br>

    <div class="btn-toolbar buttons">
        <div class="btn-group">
            <button id="desktop" class="btn btn-primary">
                <i class="fa fa-desktop" aria-hidden="true"></i>
                Desktop Table
            </button>
        </div>
        <div class="btn-group">
            <button id="mobile" class="btn btn-default">
                <i class="fa fa-mobile-phone" aria-hidden="true"></i>
                Mobile Card List
            </button>
        </div>
    </div>

</div>





<div class="col-md-12">


    <div class="table-wrapper">



        <table table border="1px" class="table-responsive">
            <thead>
                <tr>
                    <th>Date</th>
                    @for($i=0; $i < count($names); $i++)
                        <th colspan="3">{{ $names[$i]->name }}</th>
                    @endfor
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td></td>
                    @for($i=0; $i < count($names); $i++)
                        <td>B</td>
                        <td>L</td>
                        <td>D</td>
                    @endfor
                </tr>


                @for($j=0; $j < 5; $j++)
                    <tr>
                        <td>{{18+$j}}/08/2019</td>
                        @for($i=0; $i < count($meals); $i++)
                            <td>{{$meals[$i]->breakfast}}</td>
                            <td>{{$meals[$i]->lunch}}</td>
                            <td>{{$meals[$i]->breakfast}}</td>

                            @if($i >= count($names)-1)
                                @break
                            @endif
                        @endfor

                    </tr>
                @endfor



            </tbody>
        </table>










    </div>
    <br><br><br>
</div>

</body>
