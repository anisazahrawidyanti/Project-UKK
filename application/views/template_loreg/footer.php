    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.form-checkbox').click(function(){
                if ($(this).is(':checked')) {
                    $('.form-password').attr('type','text');
                } else {
                    $('.form-password').attr('type','password');
                }
            });
        });
    </script>
</body>
</html>