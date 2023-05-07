       
    <script src="../js/mobilenav.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/orders.js"></script>
    <script src="../js/dropdown_sidebar.js"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> -->


    <!-- Search Function -->
    <script type="text/javascript">
        $("#live_search").on('input', function () {
            const val = $(this).val().toUpperCase()

            // Product search
            $('tr').each(function () {
                if($(this).html().toUpperCase().indexOf(val) !== -1) {
                    $(this).show()
                } else {
                    $(this).hide()
                }
                
            });
        });
    </script>

    <!-- String Counter -->
    <script src="../js/stringcounter.js"></script>

    </body>
</html>