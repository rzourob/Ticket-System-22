{{-- 
@if ($maintenancerequest->status)
<span class="btn btn-success">{{ $maintenancerequest->activity}}</span>
@else                           
<span class="btn btn-danger">{{ $maintenancerequest->activity}}</span>
@endif --}}





<span >

    @if($comment->new_status == "Todo")
    <span class=" btn btn-warning">جاري العمل عليها</span>
    
    @elseif($comment->new_status == "Done")
    <span class=" btn btn-primary">انتهت</span>

    
    @endif
</span>