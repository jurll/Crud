<?php
$message = "datos enviados correctamente"
?>

    <!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>example</title>
		<link rel="stylesheet" href="style.css">
		<script> const funci = () =>{
			alert('<?php echo $message ?>')
		} </script>
	</head>

	<body>
    <h2>1.Codigo <input type="text" class="codigo" placeholder='ingrese aqui el codigo'></h2>
    <h2>2.Direccion <input type="text" class="direccion" placeholder='ingrese aqui la direccion'></h2>

	<div class='form'>
		<form action="">
        <h2>3.Estado en la ruta</h2>
        <select >
            <option>Desubicado</option>
            <option>Fraude</option>
            <option>Por averiguar</option>
            <option>Otra</option>
			</select>
	</div></form>
		
		
		<div class='form2'>
			<form action="">
		<h2>4.Tipo de vivienda</h2>
		<select >
			<option value="">Residencial</option>
			<option value="">Comercial</option>
			<option value="">Oficial</option>
			<option value="">Usos Compartidos</option>
			</select>

		</div></form>
		
		<div class='form3'><form action="">
		<h2>5.tiene medidor</h2>
		<select> 
			<option value="">Si</option>
			<option value="">No</option>
			<option value="">Sin Matricula</option>
		</select>
		</form></div>

<h2>6.Marca De Medidor<input type="text" placeholder='ingrese aqui la marca'></h2>

<h2>7.Edad Del Medidor<input type='text' placeholder='ingrese el año del medidor'></h2>

		<div class="form4"><form>
		<h2>8.Estado Del Medidor</h2>
		<select>
			<option>Frenado</option>
			<option value="">Dañado</option>
			<option value="">Tapado</option>
			<option value="">Otro</option>
		</select>
		</form></div>

<h2>9.Numero De Medidor<input type="text" placeholder='ingrese aqui el numero medidor'></h2>

		<div class='form5'><form action="">
			<h2>10.Estado De la Acometida</h2>
			<select>
				<option value="">Caja Sin Tapa</option>
				<option value="">Predio en Construccion</option>
				<option value="">Sin llave de Paso</option>
				<option value="">Lote</option>
				<option value="">Otra</option>
			</select>
		</form></div>

		<div class='form6'><form action="">
			<h2>11.Accedo a la lectura</h2>
			<select >
				<option value="">Facil</option>
				<option value="">Obstaculo</option>
				<option value="">No Permiten Ingresar</option>
				<option value="">Es un Edificio sin Portero</option>
				<option value="">Otra</option>
			</select>

		</form></div>
	<h2>12.Georefernciacion<input type="text" placeholder='ingrese aqui Direccion'></h2>
	<h2>13.Numero De Habitantes En El Predio<input type="text" placeholder='ingrese aqui el numero'></h2>
	<h2>14.Codigo De Servicio De Energia<input type="text" placeholder='ingrese aqui el codigo'></h2>
	<h2>15.Nombre Del Propietario o Arrendatario<input type="text" placeholder='ingrese aqui el nombre'></h2>
	<h2>16.Numero De Cedula<input type="text" placeholder='ingrese aqui el numero de cedula'></h2>
	<h2>17.Numero De Telefono<input type="text" placeholder='ingrese aqui el numero de telefono'></h2>
	<h2> 18.Correo Electronico<input type="text" placeholder='ingrese aqui el correo'></h2>
	<h2>19.Notas<input type="text" placeholder='ingrese aqui las notas'></h2>
        <button type="button" onClick='funci()'>Enviar</button>
    </form>
</body>
	</html>

