@include('../partials/header')
@include('../partials/navbar')
@include('../partials/dashboard')

<h2> Member List: </h2>

@for($i=0; $i < result.length; $i++) {
@if (result[$i].status != 'invited') {
<p> {{result[$i].name}}</p>
 }
@endif
 }
@endfor
