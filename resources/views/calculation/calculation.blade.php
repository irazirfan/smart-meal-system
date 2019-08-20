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





{{--        <input type="hidden" <%= user_amount = []; %> >--}}

<!--        <% for(var i=0; i < e_name_list.length; i++) { %>-->
<!--            <input type="hidden" <%= single_amount = 0; %> >-->
<!--            <% for(var j=0; j < e_name_list[i].length; j++) { %>-->
<!--                <input type="hidden" <%= single_amount = single_amount + e_name_list[i][j].amount %> >-->
<!---->
<!--            <% } %>-->
<!--            <input type="hidden" <%= user_amount.push(single_amount); %> >-->
<!--        <% } %>-->
<!---->
<!--        <input type="hidden" <%= total_amount = 0; %> >-->
<!---->
<!--        <% for(var i=0; i < user_amount.length; i++) { %>-->
<!---->
<!--            <input type="hidden" <%= total_amount = total_amount + user_amount[i]; %>>-->
<!--        <% } %>-->


<!--        <input type="hidden" <%= total_meal_all_user = 0; %> >-->

<!--        <% for(var i=0; i < total_meal.length; i++) { %>-->
<!--            <input type="hidden" <%= total_meal_all_user = total_meal_all_user + total_meal[i]; %> >-->
<!--        <% } %>-->

<!--        <input type="hidden" <%= meal_rate = total_amount / total_meal_all_user; %> >-->


            @for(var i=0; i < count(name_list); i++)
                <tr>
                    <td><%= name_list[i][0].name %></td>
                    <td><%= total_meal[i] %></td>
                    <td><%= user_amount[i] %></td>
                    <td><%= (total_meal[i] * meal_rate).toFixed(2) %></td>
                    <td><%= (user_amount[i] - (total_meal[i] * meal_rate)).toFixed(2) %></td>
                </tr>
            @endfor

        <tr>
            <th scope="row">Total</th>
            <td><%= total_meal_all_user %></td>
            <td><%= total_amount %></td>
            <td><%= (meal_rate * total_meal_all_user).toFixed(2) %></td>
            <td><%= ((meal_rate * total_meal_all_user)-total_amount).toFixed(2) %></td>
        </tr>
        </tbody>

    </table>


    <% if(!meal_rate){ %>
        <p style="color: red">*Your mess' calculation has not bean started yet!</p>
    <% } %>


    <div class="jumbotron">

        <p style="font-weight: bolder">Meal Rate: <%= meal_rate.toFixed(2) %></p>

    </div>

</div>





