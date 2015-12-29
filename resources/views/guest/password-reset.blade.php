@extends('guest.template')

@section('title', 'Password Reset')

@section('content')
<section id="password-reset">
	<div class="row">
		<div class="columns small-12 medium-6">
			<form method="POST" action="/password/reset">
				{!! csrf_field() !!}
				<input type="hidden" name="token" value="{{ $token }}">

				<div>
					Email
					<input type="email" name="email" value="{{ old('email') }}" autofocus>
				</div>

				<div>
					Password
					<input type="password" name="password">
				</div>

				<div>
					Confirm Password
					<input type="password" name="password_confirmation">
				</div>

				<div>
					<button type="submit">
						Reset Password
					</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
