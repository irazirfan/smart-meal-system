@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')

<br>
<a href="/mess/members/{{user.mess_id}}" class="view btn-sm active">View Member</a>

@if (user.role != "member") {
<a href="/mess/invite/{{user.mess_id}}" class="view btn-sm active">Invite Member</a>
}
@endif

<br><br><br>
