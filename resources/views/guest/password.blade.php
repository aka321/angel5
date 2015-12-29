@extends('guest.template')

@section('title', 'Password Reset')

@section('content')
<section id="password">
	<div class="row">
		<div class="columns small-12 medium-6">
			<form method="POST" action="/password/email">
				{!! csrf_field() !!}

				<div>
					Email
					<input type="email" name="email" value="{{ old('email') }}" autofocus>
				</div>

				<div>
					<button type="submit">
						Send Password Reset Link
					</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
