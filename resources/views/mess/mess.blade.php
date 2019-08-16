@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')

<br>
<a href="/mess/members" class="view btn-sm active">View Member</a>

{{--@if (user.user_type != "member") {--}}
<a href="/mess/invite" class="view btn-sm active">Invite Member</a>
{{--@endif--}}

<br><br><br>
