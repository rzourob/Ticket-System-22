


@if ($subproblem ->active)
<span class="btn btn-success">{{ $subproblem->activity}}</span>
@else                           
<span class="btn btn-danger">{{ $subproblem->activity}}</span>
@endif