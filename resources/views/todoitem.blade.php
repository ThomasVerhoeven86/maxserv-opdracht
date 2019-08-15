<div class="toDoItem">
	<table>
		<tr>
			<td>Naam <button class="bewerken editNameButton editNameButtonId{{ $toDoItem->id }}">Bewerken</button></td>
			<td class="nameField nameFieldId{{ $toDoItem->id }}">{{ $toDoItem->name }}</td>
			<td>Aanpassingsdatum</td>
			<td class="editDateField editDateFieldId{{ $toDoItem->id }}">{{ $toDoItem->edit_date }}</td>
			<td>Selecteren <input type="checkbox" name="deleteItem" class="deleteItem deleteItemId{{ $toDoItem->id }}"></td>
		</tr>
		<tr>
			<td>Auteur</td>
			<td>{{ $toDoItem->author}}</td>
			<td>Begindatum</td>
			<td>{{ $toDoItem->start_date }}</td>
			<td rowspan="2"></td>
		</tr>
		<tr>
			<td>Afgerond</td>
			<td class="finishedCheckbox finishedId{{ $toDoItem->id }}"><input type="checkbox" name="finished"
				@php
					if ($toDoItem->finished) {
						echo 'checked';
					}
				@endphp 
				></td>
			<td>Einddatum</td>
			<td class="endDateField">{{ $toDoItem->end_date }}</td>
		</tr>
		<tr>
			<td>Inhoud <button class="bewerken editContentButton editContentButtonId{{ $toDoItem->id }}">Bewerken</button></td>
			<td class="contentField contentFieldId{{ $toDoItem->id }}" colspan="4">{{ $toDoItem->content }}</td>
		</tr>
	</table>
</div>