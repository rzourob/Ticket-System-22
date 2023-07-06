<script>
    $(document).ready(function() {
        $('#medical').hide();
        $('#it').hide();

        $('select[name="deviceTypes"]').on('change', function() {
            var value = $('select[name="deviceTypes"]').val();
            // alert(value);
            if (value == '1') {
                $('#medical').show();
                $('#it').hide();
            } else if (value == '2') {
                $('#medical').hide();
                $('#it').show();
            } else {
                $('#medical').hide();
                $('#it').hide();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#TEST1').hide();
        $('#TEST2').hide();

        $('select[name="TYPE_PRO"]').on('change', function() {
            var value = $('select[name="TYPE_PRO"]').val();
            // alert(value);
            if (value == '1') {
                $('#TEST1').show();
                $('#TEST2').hide();
            } else if (value == '2') {
                $('#TEST1').hide();
                $('#TEST2').show();
            } else {
                $('#TEST1').hide();
                $('#TEST2').hide();
            }
        });
    });
</script>


