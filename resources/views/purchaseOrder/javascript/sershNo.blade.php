 {{-- <script>
         $(document).ready(function(){
        let id_no =document.getElementById('id_no');
        id_no.addEventListener('change',updateValue);
        function updateValue (e){
            e.preventDefault();
             if(id_no.value.length === 9) {
                    $.ajax({
                        url: "{{ URL::to('socialstudies1b') }}/" + id_no.value,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                        first_name =document.getElementById('first_name');
                           first_name.value=data[0].first_name;

                           father_name =document.getElementById('father_name');   
                           father_name.value=data[0].father_name;

                           grandfather_name =document.getElementById('grandfather_name');   
                           grandfather_name.value=data[0].grandfather_name;

                           family_name =document.getElementById('family_name');   
                           family_name.value=data[0].family_name;

                            mobile =document.getElementById('mobile');   
                           mobile.value=data[0].mobile;


                           address =document.getElementById('address');   
                           address.value=data[0].address;

        
                           
                            $.each(data, function(key, value) {
                                first_name =document.getElementById('first_name').append('<option value="' +
                                    value + '">' + value + '</option>'); 
                                    
                            });                    
                        }, 
                    });

                } else {
                    console.log('AJAX load did not work');
                }
        }

        });
</script> --}}
