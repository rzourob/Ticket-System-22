

<script>
var i = 1;
$('.addRow').click(function () {
i++
    $('#lab_select').clone().appendTo('#select_labTest ' )
    // var cloned = $('#lab_select').clone();
    // cloned.attr('id','lab_select' + i);
    // cloned.appendTo('#select_labTest');

    // console.log(cloned);
  })

  $('tbody').on('click','.deleteRow', function(){ 
      var numItems = $('.deleteRow').length
     if(numItems > 1){
        $(this).parent().parent().remove();
     }  
});

</script>






