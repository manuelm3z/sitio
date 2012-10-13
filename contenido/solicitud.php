<p class="text-titulos">Solicitud de Hosting</p>

<form id="fs" onsubmit="registro(this); return false"><br/>
	<input type="text" name="nombre" placeholder="Nombre" required><br>
	<input type="text" name="apellido" placeholder="Apellido" required><br>
	<input type="email" name="email" placeholder="Correo Electronico" required><br><br/>
	Plan: <select name="plan">

			<option value="Basico">Básico</option>
			<option value="Intermedio">Intermedio</option>
			<option value="Avanzado">Avanzado</option>
		 </select>
	<input type="submit" value="Solicitar" id="envio">
</form>