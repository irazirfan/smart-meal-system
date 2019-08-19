@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')

<br>
@if(($user->mess_id!= null|| $user->mess_id!= '') && $user->status != "invited" )

    <a href="/mess/{{$user->mess_id}}" class="view btn-sm active">View Member</a>

    @if ($user->user_type == "manager")
        <a href="/mess/invite" class="view btn-sm active">Invite Member</a>
    @endif
@endif

<br><br><br>
