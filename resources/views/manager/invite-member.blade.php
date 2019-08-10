@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')

<div class="container">

    <div class="jumbotron">
        <h2>Invite Members</h2>
    </div>


    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Invite Here</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="member_email" id="mess_id" class="form-control input-sm" placeholder="Enter Member's Email">

                                    <label style="color: red">
                                        <% if(typeof user_exist != "undefined"){ %>
                                        <% if (user_exist == 'no') { %>
                                        User Doesn't Exist!
                                        <% } %>
                                        <% } %>
                                    </label>
                                    <label style="color: red">
                                        <% if(typeof is_invited != "undefined"){ %>
                                        <% if (is_invited == 'yes') { %>
                                        User is already invited or being added to a mess!
                                        <% } %>
                                        <% } %>
                                    </label>
                                </div>
                                <input type="submit" value="Invite" class="btn btn-info btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
