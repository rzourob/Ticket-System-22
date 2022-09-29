<script>


$('.addRow').click(function () {
    $('#select_xrayTest').clone().appendTo('#select_xrayTest')

  })

  $('tbody').on('click','.deleteRow', function(){ 
      var numItems = $('.deleteRow').length
     if(numItems > 1){
        $(this).parent().parent().remove();
     }  
});

</script>