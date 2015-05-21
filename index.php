<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="js/jqgrid/js/i18n/grid.locale-es.js"></script>
<script type="text/javascript" src="js/jqgrid/js/jquery.jqGrid.min.js"></script>
<!--<script type="text/javascript" src="js/jqgrid/js/jquery.jqGrid.src.js"></script>-->




<script language="javascript">
	$(document).ready(inicializarEventos);
	function inicializarEventos(){
//		$("#f1").toggle(mostrarRecuadro,ocultarRecuadro);
					
		$("#enviar").click(guardar);
		$("#f1").toggle(function(){
							ide=$(this).attr('id');
							var idecuadro="#form_"+ide;
							$(idecuadro).hide("slow");
							$(this).attr("src","image/mas.jpeg");},
						function(){	
							ide=$(this).attr('id');
							var idecuadro="#form_"+ide;
							$(idecuadro).show("slow");
							$(this).attr("src","image/menos.jpeg");
						});
		//$( "#datepicker" ).datepicker();
		$( "#fecha" ).datepicker();
		$( "#fecha" ).datepicker( "option", "dateFormat", 'dd/mm/yy' );
		$( "#fecha" ).datepicker( "option", "dayNamesMin", ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'] );
		$( "#enviar" ).button();

		
		$("#Ocultar").click(function(){
			$("#contenido").hide("fast");
		});
		$("#mostrar").click(function(){
			$("#contenido").show(1200);//slow
		});
	}
		function guardar(){
			$.ajax({
			async:true,
			type:"POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"guardar.php",
			data: "&nombre="+$("#txtNombre").val()+"&apellidos="+$("#txtApellidos").val()+"&fecha="+$("#fecha").val(),
			beforeSend:Cargando,
			success:llegadaDatos,
			error:problemas
			});		
		}
		function Cargando(){
			$("#info").html('<img src="image/cargando.gif">');
		}
		function llegadaDatos(datos){
			$( "#dialog-message" ).dialog({
				height:140,
				modal:true
			});
			$("#info").html(datos);
			
		}
		function problemas(){
			$("#info").html('error en la comunicacion con el servidor');
		}
	/* function ocultarRecuadro(){
		ide=$(this).attr('id');
		var idecuadro="#form_"+ide;
		$(idecuadro).hide("slow");
		$(this).attr("src","image/mas.jpeg");
	}
	function mostrarRecuadro(){
		ide=$(this).attr('id');
		var idecuadro="#form_"+ide;
		$(idecuadro).show("slow");
		$(this).attr("src","image/menos.jpeg");
	} */
</script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href="css/tema/redmond/jquery-ui-1.8.13.custom.css" rel="stylesheet" type="text/css" />
<link href="js/jqgrid/css/ui.jqgrid.css" rel="stylesheet" type="text/css" />
</head>

<body>
<input name="Ocultar" type="button" id="Ocultar" value="Ocultar" />
<label>
<input type="button" name="mostrar" id="mostrar" value="mostrar" />
</label>
<div id="dialog-message" title="Informacion Guardada" style="display:none">
	<p>Sus Datos fueron guardados correctamente</p>
</div>
<div id="info"></div>
<div id="contenido">
<table width="273" border="1">
  <tr>
    <td width="17"><img src="image/menos.jpeg" width="20" height="27" id="f1"></td>
    <td width="240">RESERVAS</td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <table width="225" border="1" id="form_f1">
            <tr>
              <td colspan="2">FORMULARIO DE RESERVAS</td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td><label>
                <input type="text" name="txtNombre" id="txtNombre" />
              </label></td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td><label>
                <input type="text" name="txtApellidos" id="txtApellidos" />
              </label></td>
            </tr>
            <tr>
              <td>Fecha:</td>
              <td><input type="text" id="fecha" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><button id="enviar">Enviar</button></td>
            </tr>
              </table>
      </div>
    </td>
  </tr>
</table>
<!--<div id="dialog-message" title="Sistema de Facturacion">
				  			<p>
								<span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
								La Reserva ha sido creada correctamente.
							</p>
	
						</div>-->
</div>

<!--<div id="datepicker"></div>-->
<br/>

<table id="jqgrid"></table>
<div id="pager"></div>
<input type="button" value="nuevo" id="btnadd" />
</body>
</html>
