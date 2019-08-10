@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')

<br>

<h2>You have been invited to join {{result.name.toUpperCase()}}</h2>

<a href="/mess/accept/{{user.mess_id}}>" class="view btn-sm active">Accept</a>
<a href="/mess/cancel/{{user.mess_id}}>" class="view btn-sm active">Cancel</a>
<br><br><br>
