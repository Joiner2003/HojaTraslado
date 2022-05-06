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
$(document).ready(function(){

    $.ajax({
        type: 'POST',
        url: '../../Actions/buscardoc/buscarparamedico.php',
        data: {'peticion': 'buscarparamedico'}    
    })
    .done(function(listar_paramedico){
        $('#NomParamedico').html(listar_paramedico)
    })
    .fail(function(){
        alert('Error')
    })
})


</script>

<script> 
$(document).ready(function(){

    $.ajax({
        type: 'POST',
        url: '../../Actions/buscardoc/buscarmedico.php',
        data: {'peticion': 'buscarmedico'}    
    })
    .done(function(listar_Medico){
        $('#NomMedico').html(listar_Medico)
    })
    .fail(function(){
        alert('Error')
    })
})


</script>

<script> 
$(document).ready(function(){

    $.ajax({
        type: 'POST',
        url: '../../Actions/buscardoc/buscarcomandante.php',
        data: {'peticion': 'buscarcomandante'}    
    })
    .done(function(listar_Comandante){
        $('#NomComandante').html(listar_Comandante)
    })
    .fail(function(){
        alert('Error')
    })
})


</script>

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

