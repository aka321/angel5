<header id="header">
	<div class="row">
		<div class="large-12 columns">
			<a href="{{ url('home') }}">
				<img src="{{ asset('img/ed100-logo.png') }}" class="topLogo" />
			</a>
		</div>
	</div>
	<div class="row langSwitchWrap">
		<div class="large-12 columns">
			<a href="{{ $otherLangURL or url('switch-locale') }}" class="langSwitch button tiny radius">
				@if ($locale->lang == 'en')
					Español
				@else
					English
				@endif
			</a>
			<a href="{{ url('auth/logout') }}" class="signOut">
				Sign Out
			</a>
		</div>
	</div>
</header>
@include('auth.lessons.index')
