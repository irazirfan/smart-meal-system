@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')

<br>
@if((session('mess_id')!= null || session('mess_id')!= '') && $user->status != "invited" )

    <a href="/mess/{{session('mess_id')}}" class="view btn-sm active">View Member</a>

    @if (session('user_type') == "manager")
        <a href="/mess/invite" class="view btn-sm active">Invite Member</a>
    @endif
@endif

<br><br><br>
