<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="{{ url('css/todo.css') }}">
		
		@if(View::hasSection('css'))
			
			@yield('css')
		
		@endif
		
		@if(View::hasSection('javascript'))
			
			@yield('javascript')
			
		@endif
        
	</head>
	<body>
		<div id="container">
			<div id="header">
			
			</div>
			<div id="menu">
				
				@include('layouts.menu')
				
			</div>
			<div id="content">
				
				@if(View::hasSection('content'))
				
					@yield('content')
				
				@endif
				
			</div>
		</div>
	</body>
</html>