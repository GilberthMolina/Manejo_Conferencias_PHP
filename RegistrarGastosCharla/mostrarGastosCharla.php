<?php
/*Se incluyen el archivo de conexion de la base de datos*/
require_once("../includes/fachadaGastosCharla.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Mostrar los Gastos de las Charlas</title>
		<link rel="stylesheet" type="text/css" href="../css/registrarGastosCharla/styles_mostrar.css" />
		<script type="text/javascript" src="../js/scripts.js"></script>
	</head>
	<body>
		<?php
			/*Se incluye la barra de navegacion, la imagen de registrix y el footer*/
			include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_registrar_gastos_charla.php';
			include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix.php';
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Mostrar los gastos de las charlas
				</div>
				<br>
				<form id="gastos_charla" name="gastos_charla" method="post" action="mostrarGastosCharla.php">
					<fieldset>
						<legend>Lista de Gastos de las Charlas</legend>
							<table width="800" cellpadding="6">
							  <tr>
								<td colspan="7" align="center">
									<div id="descripcionGastosCharla">
										La siguiente tabla muestra los gastos registrados para las charlas, donde el campo costo est&aacute; relacionado a el gasto de la charla
									</div>
									<div id="registroGastosCharla">
										Registrar gasto de una charla
									</div>
									<a href="registroGastosCharla.php" title="Agregar un nuevo gasto de la charla"><img align="right" src="../imagenes/agregar.png" alt="registrar gasto charla" width="35" height="35"/></a>
								</td>
							  </tr>
							  <tr>
								<th width="123" align="center">Titulo charla</th>
								<th width="100" align="center">Nombre gasto</th>
								<th width="100" align="center">Descripci&oacute;n</th>
								<th width="100" align="center">Costo</th>
								<th width="78" align="center">Estado</th>
								<th width="5" align="center">Editar</th>
								<th width="5" align="center">Eliminar</th>
							  </tr>
							  <?php
							  /*Se define una variable con un color determinado para cambiar los colores de las filas de la tabla*/
							  $color='#DBF1F7';
                                                          
							  /*Se hace la instancia del objeto de la fachada*/
							  $mostrarGastos = new fachadaGastosCharla();
							  $registro = $mostrarGastos->mostrarGastosCharla();
							  
							  /*Se realiza un ciclo para llenar la tabla de la consulta de los proveedores*/
							  for ($i=0;$i<count($registro);$i++) {
							  
							  /*Condicional para que las filas de la tabla tengan dos colores*/
							  $color=('#F0F0F0'==$color)?'#DBF1F7':'#F0F0F0';
                               ?>
							  <tr bgcolor="<?php echo $color ?>">
								<td align="center"><?php echo $registro[$i]['titulo_charla']; ?></td>
								<td align="center"><?php echo $registro[$i]['nombre_tipo_gasto']; ?></td>
								<td align="center"><?php echo $registro[$i]['descripcion_tipo_gasto']; ?></td>
								<td align="center"><?php echo "$ ".$registro[$i]['costo']; ?></td>
								<td align="center"><?php echo $registro[$i]['esta_aprobado']; ?></td>
								<td align="center"><a href="editarGastosCharla.php?idgasto=<?php echo $registro[$i]['id_gasto'];?>&idcharla=<?php echo $registro[$i]['id_charla'];?>&idtipogasto=<?php echo $registro[$i]['id_tipo_gasto'];?>" title="Editar gasto"><img src="../imagenes/editar.png" alt="editar gasto" width="25" height="25"/></a></td>
								<td align="center"><a href="#" onclick="borrarGastosCharla(<?php echo $registro[$i]['id_gasto']; ?>);" title="Eliminar gasto"><img src="../imagenes/borrar.png" alt="borrar gasto" width="25" height="25"/></a></td>
							  <?php } ?>
							  </tr>
							  <tr>
								<td>
								<br />
									<input id="enviar" type="submit" value="Volver a consultar" >
								<br />
								</td>
							</tr>
						</table>
					</fieldset>
				</form>
				<div id="registro">
					<table>
						<tr>
							<td>
								<?php 
								/*Si la variable $numeroDeFilasGastos es igual a 0, que se muestra el siguiente mensaje*/
								if ($i == 0) {
									echo "Nota: <br>";
									echo "En este momento no hay ning&uacute;n gasto registrado para las charlas";
								} ?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="footer">
			<p>Registrix - Maximum Intelligence &copy;</p>
		</div>
	</body>
</html>
