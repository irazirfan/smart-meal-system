@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')

<h2> Member List: </h2>

{{--@if($user->status != "invited" && $user->mess_id != null || $user->mess_id != '')--}}
@foreach($result as $value)
    <tr>
        <td scope="row">{{$value->name}}</td>
        @if(session('user_type') == 'admin')
            <td></td>
        @endif
        <br>
    </tr>
@endforeach
{{--@endif--}}
