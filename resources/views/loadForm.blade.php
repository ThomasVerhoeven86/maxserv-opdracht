<div class="addItem">
	<form action="addToDoItem" method="POST">
		@csrf
		<table>
			<tr>
				<td>Naam</td>
				<td><input type="text" name="name" required></td>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td>Begindatum</td>
				<td><input type="date" name="startDate" required></td>
				<td rowspan="2"><input type="submit" name="submit" value="Verzenden"></td>
			</tr>
			<tr>
				<td>Afgerond</td>
				<td><input type="checkbox" name="finished"></td>
				<td>Einddatum</td>
				<td><input type="date" name="endDate" required></td>
			</tr>
			<tr>
				<td>Inhoud</td>
				<td colspan="4"><textarea name="content"></textarea></td>
			</tr>
		</table>
	</form>
</div>