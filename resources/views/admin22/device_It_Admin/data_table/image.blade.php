<ul class="list-inline">
    <li class="media d-block d-sm-flex">
        <img alt="" class="main-img-user avatar-lg mg-sm-l-10 mg-b-10 mg-sm-b-0  img-fluid mr-15 avatar-small" height="430" with="450"
        src="{{Storage::url('public/devices/' . $device->image ?? '')}}">
    </li>
</ul>

{{-- 
<td><img class="img-fluid mr-15 avatar-small" height="430" with="450"
     src="{{Storage::url('public/devices/' . $device->image ?? '')}}" alt="user image"></td> --}}

{{-- 

     <div class="media">
        <div class="position-relative">
         <img class="img-fluid mr-15 avatar-small" src="{{Storage::url('public/devices/' . $device->image ?? '')}}" alt=""
         class="main-img-user avatar-lg mg-sm-l-10 mg-b-10 mg-sm-b-0">
        </div>
      </div> --}}