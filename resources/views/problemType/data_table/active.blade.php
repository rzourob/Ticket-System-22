
@if ($problem ->active)
<span class="btn btn-success">{{ $problem->activity}}</span>
@else                           
<span class="btn btn-danger">{{ $problem->activity}}</span>
@endif