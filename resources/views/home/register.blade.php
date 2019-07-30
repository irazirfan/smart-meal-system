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
                                <input id="email" type="text" name="email" class="form-control input-sm"
                                       placeholder="Email">
                                       <span id="email_exist" style="color: red">
                                           
                                       </span>
                                </div>
                            </div>
                            
                            <div class="col-xs-6 col-sm-6 col-md-8">
                                <div class="form-group">
                                <input id="password" type="password" name="password" class="form-control input-sm"
                                       placeholder="Password">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-8">
                                <div class="form-group">
                                    <select id="user_type" name="user_type" style="height: 100%; width: 100%;padding-top: 1px">
                                    <option value="">Select User Type</option>
                                    <option value="member">Member</option>
                                    <option value="manager">Manager</option>
                                </select>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-8">
                                <input id="submit" class="btn btn-info btn btn-block" type="submit" value="Save">
                            </div>

                            
                            </div>
                        </div>
                </form>

                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach

            </div>
        </div>

        </div>
</div>



<script type="text/javascript">
$('#email').on('keyup',function(){
$value=$(this).val();
console.log($value);
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':$value},
success:function(data){
    console.log(data);
if(data=="true"){
    $('#email_exist').text("Email already exists");
    $('#submit').attr("disabled", true);
}
else
{
    $('#email_exist').text("");
    $('#submit').attr("disabled", false);
}
}
});
})
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>