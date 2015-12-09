@extends('guest.template')

@section('content')
	<section id="pagesRegister">
		<div class="row">
			<div class="small-6 columns">
				<form method="POST" action="/auth/register">
					{!! csrf_field() !!}

					<div class="row">
						<div class="small-12 column">
							First Name
							<input type="text" name="first_name" value="{{ old('first_name') }}" autofocus>
						</div>
					</div>
					<div class="row">
						<div class="small-12 column">
							Last Name
							<input type="text" name="last_name" value="{{ old('last_name') }}" autofocus>
						</div>
					</div>
					<div class="row">
						<div class="small-12 column">
							Email
							<input type="email" name="email" value="{{ old('email') }}">
						</div>
					</div>
					<div class="row">
						<div class="small-12 column">
							{{ _('Password') }}
							<input type="password" name="password">
						</div>
					</div>
					<div class="row">
						<div class="small-12 column">
							{{ _('Confirm Password') }}
							<input type="password" name="password_confirmation">
						</div>
					</div>
					<div class="row">
						<div class="small-12 column">
							<button type="submit">
								Register
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection