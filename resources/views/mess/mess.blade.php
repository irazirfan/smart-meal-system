@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')

<br>
@if(session('mess_id')!= null || session('mess_id')!= '')
    <?php
        $mess_id = session('mess_id');
    ?>
@endif
<a href="/mess/members/{{$mess_id}}" class="view btn-sm active">View Member</a>

@if (session('user_type') != "member") {
<a href="/mess/invite" class="view btn-sm active">Invite Member</a>
@endif

<br><br><br>
