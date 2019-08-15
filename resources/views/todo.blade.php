@extends('layouts.template')

@section('javascript')

	<script>
		var varToken = '{{ csrf_token() }}';
	</script>
	<script src="js/todo4u.js"></script>

@endsection

@section('content')

	@if (Auth::check())

		<div class="toDoItemList">
			<div id="sort">
				<table>
					<tr>
						<td>Sorteren op:</td>
						<td><button id="sortByName">Naam</button></td>
						<td><button id="sortByEditDate">Aanpassingsdatum</button></td>
						<td><button id="sortByEndDate">Einddatum</button></td>
						<td></td>
					</tr>
				</table>
			</div>
			
			<div id="loadToDoItem">
				
			</div>
			
			<div class="expiredItems">
				
				@foreach ($toDoItemList['expired'] as $toDoItem)
						
					@include('todoitem')
				
				@endforeach
			
			</div>
			
			<div class="notExpiredItems">
			
				@foreach ($toDoItemList['notExpired'] as $toDoItem)
						
					@include('todoitem') 
				
				@endforeach
			
			</div>
		</div>
	
	@else
		
		<div>
			<h1>ToDo4U</h1>
			<p>Welcome to ToDo4U, a kickstarter project aimed at managing to-do lists. To get started on your own personal list, sign in or register at the menu on the left.<p>
		</div>
	
	@endif
	
@endsection