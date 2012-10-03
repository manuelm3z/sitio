<form id="fs">
	Nombre:<input type="text" name="nombre"><br>
	Apellido:<input type="text" name="apellido"><br>
	Email:<input type="email" name="email"><br>
	Plan:<select name="plan">
			<option value="Basico">Básico</option>
			<option value="Intermedio">Intermedio</option>
			<option value="Avanzado">Avanzado</option>
		 </select>
	<input type="button" value="Solicitar" onclick="registro(this)">
</form>