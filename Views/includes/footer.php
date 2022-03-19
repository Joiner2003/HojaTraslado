    <!-- Bootstrap core JavaScript-->
    <script src="../Resource/vendor/jquery/jquery.min.js"></script>
    <script src="../Resource/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../Resource/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="../Resource/vendor/datatables/jquery.dataTables.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../Resource/js/sb-admin-2.min.js"></script>
    <script src="../Resource/js/script.js"></script>

</body>

</html>
<script>
    $(function() {
        $('#tablaFiltro').DataTable();
    });

    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").fadeOut(1500);
        },6000);
    });
</script>