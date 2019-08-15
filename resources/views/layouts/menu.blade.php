@if (\Auth::check())
	
	<div class="menuItem">
		<span class="welcome">Welkom {{ Auth::user()->name }}
		<div class="menuItem">
			<a href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
				{{ __('Logout') }}
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</div>
	</div>

	<div class="menuItem">
		<span id="addToDoItem" class="menuButton">To-do item toevoegen</span>
	</div>
	<div class="menuItem">
		<span id="deleteToDoItem" class="menuButton">Geselecteerde todo items verwijderen</span>
	</div>

@else
		
	<div class="menuItem">
		<div>{{ __('Login') }}:</div>
		<form method="POST" action="{{ route('login') }}">
			@csrf

			<label for="loginEmail">{{ __('E-Mail Address') }}</label>
			<input id="loginEmail" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
			@error('email')
				<span role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror

			<label for="loginPassword">{{ __('Password') }}</label>
			<input id="loginPassword" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
			@error('password')
				<span role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		
			<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
			<label for="remember">
				{{ __('Remember Me') }}
			</label>
	
			<button type="submit">
				{{ __('Login') }}
			</button><br>

			@if (Route::has('password.request'))
				<a href="{{ route('password.request') }}">
					{{ __('Forgot Your Password?') }}
				</a>
			@endif
		</form>
	</div>
	
	<div class="menuItem">
		<div>{{ __('Register') }}</div>
		<form method="POST" action="{{ route('register') }}">
			@csrf
			
			<label for="registerName">{{ __('Name') }}</label>
			<input id="registerName" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
			@error('name')
				<span role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror

			<label for="registerEmail">{{ __('E-Mail Address') }}</label>
			<input id="registerEmail" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
			@error('email')
				<span role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			
			<label for="registerPassword">{{ __('Password') }}</label>
			<input id="registerPassword" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
			@error('password')
				<span role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			
			<label for="password-confirm">{{ __('Confirm Password') }}</label>
			<input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
			<button type="submit">
				{{ __('Register') }}
			</button>
		</form>
	</div>

@endif