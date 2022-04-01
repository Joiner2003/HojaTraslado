<!DOCTYPE html>

<?php 

include("conexion.php");
$IdServicio = 0;
$IdServicio =$_GET['IdServicio'];

//$_SESSION['IdServicio']=$IdServicio;
echo $IdServicio;
//$Ids = $_GET['IdServicio'];
//echo $IdServicio;
/*$Idserv = array();
$Idserv[0] = $Ids;
//echo $Idserv[0];//Devuelve el valor Manzana.
//echo $Ids;*/
?>

<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejemplo canvas mano alzada</title>
</head>
<body>

<!-- creamos el camvas -->
<canvas id='canvas' width="200" height="200" style='border: 1px solid #CCC;'>
    <p>Tu navegador no soporta canvas</p>
</canvas>

<!-- creamos el form para el envio -->
<form id='formCanvas' method='post' action='firma3.php' ENCTYPE='multipart/form-data'>
    <button type='button' onclick='LimpiarTrazado()'>Borrar</button>
    <button type='button' onclick='GuardarTrazado()'>Guardar</button>
    <input type='hidden' name='imagen' id='imagen' />
</form>

<script type="text/javascript">
    /* Variables de Configuracion */
    var idCanvas='canvas';
    var idForm='formCanvas';
    var inputImagen='imagen';
    var estiloDelCursor='crosshair';
    var colorDelTrazo='#555';
    var colorDeFondo='#fff';
    var grosorDelTrazo=2;

    /* Variables necesarias */
    var contexto=null;
    var valX=0;
    var valY=0;
    var flag=false;
    var imagen=document.getElementById(inputImagen); 
    var anchoCanvas=document.getElementById(idCanvas).offsetWidth;
    var altoCanvas=document.getElementById(idCanvas).offsetHeight;
    var pizarraCanvas=document.getElementById(idCanvas);

    /* Esperamos el evento load */
    window.addEventListener('load',IniciarDibujo,false);

    function IniciarDibujo(){
      /* Creamos la pizarra */
      pizarraCanvas.style.cursor=estiloDelCursor;
      contexto=pizarraCanvas.getContext('2d');
      contexto.fillStyle=colorDeFondo;
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
      contexto.strokeStyle=colorDelTrazo;
      contexto.lineWidth=grosorDelTrazo;
      contexto.lineJoin='round';
      contexto.lineCap='round';
      /* Capturamos los diferentes eventos */
      pizarraCanvas.addEventListener('mousedown',MouseDown,false);// Click pc
      pizarraCanvas.addEventListener('mouseup',MouseUp,false);// fin click pc
      pizarraCanvas.addEventListener('mousemove',MouseMove,false);// arrastrar pc

      pizarraCanvas.addEventListener('touchstart',TouchStart,false);// tocar pantalla tactil
      pizarraCanvas.addEventListener('touchmove',TouchMove,false);// arrastras pantalla tactil
      pizarraCanvas.addEventListener('touchend',TouchEnd,false);// fin tocar pantalla dentro de la pizarra
      pizarraCanvas.addEventListener('touchleave',TouchEnd,false);// fin tocar pantalla fuera de la pizarra
    }

    function MouseDown(e){
      flag=true;
      contexto.beginPath();
      valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
      contexto.moveTo(valX,valY);
    }

    function MouseUp(e){
      contexto.closePath();
      flag=false;
    }

    function MouseMove(e){
      if(flag){
        contexto.beginPath();
        contexto.moveTo(valX,valY);
        valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
        contexto.lineTo(valX,valY);
        contexto.closePath();
        contexto.stroke();
      }
    }

    function TouchMove(e){
      e.preventDefault();
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseMove(touch);
      }
    }

    function TouchStart(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseDown(touch);
      }
    }

    function TouchEnd(e){
      if (e.targetTouches.length == 1) { 
        var touch = e.targetTouches[0]; 
        MouseUp(touch);
      }
    }

    function posicionY(obj) {
      var valor = obj.offsetTop;
      if (obj.offsetParent) valor += posicionY(obj.offsetParent);
      return valor;
    }

    function posicionX(obj) {
      var valor = obj.offsetLeft;
      if (obj.offsetParent) valor += posicionX(obj.offsetParent);
      return valor;
    }

    /* Limpiar pizarra */
    function LimpiarTrazado(){
      contexto=document.getElementById(idCanvas).getContext('2d');
      contexto.fillStyle=colorDeFondo;
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
    }

    /* Enviar el trazado */
    function GuardarTrazado(){
      imagen.value=document.getElementById(idCanvas).toDataURL('image/png');
      document.forms[idForm].submit();
    }
</script>



<?php 
// comprovamos si se envió la imagen
if (isset($_POST['imagen'])) {

    $baseImage = $_POST['imagen'];
    echo dato;
    echo $baseImage;
  /*  $im1= file_get_contents("En_firma.png");
    $En_firma2 = base64_encode($im1);*/
    //$blobImage = base64_decode($baseImage);
    $insertar = "UPDATE Ota_Informe_Traslado
    SET Firma1='$baseImage'
    WHERE IdServicio= 4";
    $result = sqlsrv_query($conn,$insertar);

    
    
    if ($result) {
      echo $_SESSION['IdServicio'];
   //  echo $Idserv[0];
      # code...
     // echo "<script language='javascript' type ='text/javascript'> window.close();</script>";
      echo '<img src="'.$_POST['imagen'].'" border="1">';// Esta linea genera la imagen
    //  $id = $_GET['IdServicio'];
    //  echo "$id";
     // echo "Con base 64 es". $baseImage;
    }else{
      echo $_SESSION['IdServicio'];
      echo "No se pudo guardar";
     // echo $Idserv[0];
    }

   

    // mostrar la imagen
   

    // funcion para gusrfdar la imagen base64 en el servidor
    // el nombre debe tener la extension
    /*function uploadImgBase64 ($base64, $name){
        // decodificamos el base64
        $datosBase64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
        // definimos la ruta donde se guardara en el server
        $path= $_SERVER['DOCUMENT_ROOT'].'/firmas/'.$name;
        // guardamos la imagen en el server
        if(!file_put_contents($path, $datosBase64)){
            // retorno si falla
            return false;
        }
        else{
            // retorno si todo fue bien
            return true;
        }
    }*/

    // llamamos a la funcion uploadImgBase64( img_base64, nombre_fina.png) 
   // uploadImgBase64($_POST['imagen'], 'mi_imagen_'.date('d_m_Y_H_i_s').'.png' );
}
?>

</body>
</html>