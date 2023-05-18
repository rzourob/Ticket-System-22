<!-- jquery -->

<!-- jquery -->
<script src="{{ URL :: asset('assets/js/jquery-3.3.1.min.js')}}"></script>

<!-- plugins-jquery -->
<script src="{{ URL :: asset('assets/js/plugins-jquery.js')}}"></script>

{{-- <!-- plugin_path -->
<script>var plugin_path = '{{asset ('assets/js')}}';</script> --}}

<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>

{{-- <!-- colorpicker -->
<script src="{{ URL :: asset('assets/js/bootstrap-colorpicker.min.js.map')}}"></script> --}}

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

<!-- jsnicescroll -->
{{-- <script src="{{ URL :: asset('assets/js/jsnicescroll/jquery.nicescroll.js')}}"></script> --}}



<!-- DataTables  & Plugins -->
{{-- <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> --}}


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}

@yield('js')


