<script>
    $(document).ready(function() {
        $('#ar').hide();
        $('select[name="description_house"]').on('change', function(){
            // var value = $('select[name="description_house"]').find("selected").text();
            var value = $('select[name="description_house"]').val();
            // alert(value);
            if (value == '3' || value == '4' || value == '5'){
                 $('#ar').show();
            } 
            else {
                $('#ar').hide();
            }
        });
    });
</script>



<script>

    $(document).ready(function() {
        $('#ara').hide();
        $('#arr').hide();
        $('#ars').hide();
        $('#arsx').hide();
        $('select[name="source_income"]').on('change', function(){
            // var value = $('select[name="description_house"]').find("selected").text();
            var value = $('select[name="source_income"]').val();
            // alert(value);
            if (value == '1' || value == '2' || value == '3'){
                 $('#ara').show();
                 $('#arr').show();
                 $('#ars').hide();
            } 

            else if (value == '4' || value == '5'){
                 $('#ars').show();
                 $('#ara').hide();
                 $('#arr').hide();
                 $('#arsx').hide();
                
            } 

            else if (value == '6'){
                 $('#arsx').show();
                 $('#ars').hide();
                 $('#ara').hide();
                 $('#arr').hide();
               
                
            } 

            else {
                $('#ara').hide();
                $('#arr').hide();
                $('#ars').hide();
                $('#arsx').hide();
            }
        });
    });
</script>