<!-- jquery -->
<script src="{{ URL :: asset('assets/js/jquery-3.3.1.min.js')}}"></script>

<!-- plugins-jquery -->
<script src="{{ URL :: asset('assets/js/plugins-jquery.js')}}"></script>

{{-- <!-- plugin_path -->
<script>var plugin_path = '{{asset ('assets/js')}}';</script> --}}

<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>


<!-- chart -->
<script src="{{ URL :: asset('assets/js/chart-init.js')}}"></script>

<!-- calendar -->
<script src="{{ URL :: asset('assets/js/calendar.init.js')}}"></script>

<!-- charts sparkline -->
<script src="{{ URL :: asset('assets/js/sparkline.init.js')}}"></script>

<!-- charts morris -->
<script src="{{ URL :: asset('assets/js/morris.init.js')}}"></script>

<!-- datepicker -->
<script src="{{ URL :: asset('assets/js/datepicker.js')}}"></script>

<!-- sweetalert2 -->
<script src="{{ URL :: asset('assets/js/sweetalert2.js')}}"></script>

<!-- toastr -->
<script src="{{ URL :: asset('assets/js/toastr.js')}}"></script>

<!-- validation -->
<script src="{{ URL :: asset('assets/js/validation.js')}}"></script>

<!-- lobilist -->
<script src="{{ URL :: asset('assets/js/lobilist.js')}}"></script>
 
<!-- custom -->
<script src="{{ URL :: asset('assets/js/custom.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('js/crud.js')}}"></script>

<script src="{{ asset('assets/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

@yield('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>



