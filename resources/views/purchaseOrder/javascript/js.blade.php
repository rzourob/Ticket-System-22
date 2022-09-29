<script>

    function nextForm(){
        let form1 =document.getElementById('form1');
        form1.style.display = 'none';
        var step1 = document.getElementById("step-1");
        step1.classList.remove("btn-success");

        let form2 =document.getElementById('form2');
        form2.style.display = 'block';
        var step2 = document.getElementById("step-2");
        step2.classList.add("btn-success");
        
        
    }

    function secondStepSubmit(){
        
        let form2 =document.getElementById('form2');
        form2.style.display = 'none';
        var step2 = document.getElementById("step-2");
        step2.classList.remove("btn-success");

        let form3 =document.getElementById('form3');
        form3.style.display = 'block';
        var step3 = document.getElementById("step-3");
        step3.classList.add("btn-success");
        
    }

    function backForm(){
        let form2 =document.getElementById('form2');
        form2.style.display = 'none';
        var step2 = document.getElementById("step-2");
        step2.classList.remove("btn-success");

        let form1 =document.getElementById('form1');
        form1.style.display = 'block';
        var step1 = document.getElementById("step-1");
        step1.classList.add("btn-success");
        
        
    }

    function thirdStepSubmit(){
        
        let form3 =document.getElementById('form3');
        form3.style.display = 'none';
        var step3 = document.getElementById("step-3");
        step3.classList.remove("btn-success");

        let form4 =document.getElementById('form4');
        form4.style.display = 'block';
        var step4 = document.getElementById("step-4");
        step4.classList.add("btn-success");
    }

    function backFormSecond(){
        let form3 =document.getElementById('form3');
        form3.style.display = 'none';
        var step3 = document.getElementById("step-3");
        step3.classList.remove("btn-success");

        let form2 =document.getElementById('form2');
        form2.style.display = 'block';
        var step2 = document.getElementById("step-2");
        step2.classList.add("btn-success");
        
        
    }

     function fourthStepSubmit(){
        
        let form4 =document.getElementById('form4');
        form4.style.display = 'none';
        var step4 = document.getElementById("step-4");
        step4.classList.remove("btn-success");

        let form5 =document.getElementById('form5');
        form5.style.display = 'block';
        var step5 = document.getElementById("step-5");
        step5.classList.add("btn-success");
    }


    function backFormfourth(){
        let form4 =document.getElementById('form4');
        form4.style.display = 'none';
        var step4 = document.getElementById("step-4");
        step4.classList.remove("btn-success");

        let form3 =document.getElementById('form3');
        form3.style.display = 'block';
        var step3 = document.getElementById("step-3");
        step3.classList.add("btn-success");
        
        
    }

    function backFormfifth(){
        let form5 =document.getElementById('form5');
        form5.style.display = 'none';
        var step5 = document.getElementById("step-5");
        step5.classList.remove("btn-success");

        let form4 =document.getElementById('form4');
        form4.style.display = 'block';
        var step4 = document.getElementById("step-4");
        step4.classList.add("btn-success");
        
        
    }
    
</script>