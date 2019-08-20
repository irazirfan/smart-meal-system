@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')



<br>

<div class="container">

    <br><br><br>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Meal</th>
            <th scope="col">Expenses</th>
            <th scope="col">Meal Cost</th>
            <th scope="col">Return</th>
        </tr>
        </thead>
        <tbody>


        @for($i=0; $i < count($name_list); $i++)
            <tr>
                <td>{{$name_list[$i]->name}}</td>
                    <td>{{$total_meal_user_wise[$i]}}</td>
                    <td>{{$amounts[$i]}}</td>
                    <td>{{$total_meal_user_wise[$i] * $meal_rate }}</td>
                    <td>{{ ($amounts[$i] - ($total_meal_user_wise[$i] * $meal_rate)) }}</td>
                </tr>
            @endfor



        </tbody>

    </table>




    <div class="jumbotron">

        <p style="font-weight: bolder">Meal Rate: {{ $meal_rate }}</p>

    </div>

</div>





