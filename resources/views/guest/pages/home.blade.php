@extends('guest.template')

@section('title', $page->title)

@section('meta')
	<meta name="description" content="{{ $page->og_desc }}">
	<meta property="og:description" content="{{ $page->og_desc }}">
	<meta property="og:image" content="{{ asset('img/logo.jpg') }}">
@endsection

@section('js')
<script>
	$(function() {
	});
</script>
@endsection

@section('content')
<div id="pagesHome">
	<section>
		<div class="row">
			<div class="column small-12">
				<h1>This is the home page.</h1>
				<p>This text is rendered from the blade.</p>
			</div>
		</div>
	</section>
	{!! $page->html !!}
</div>
@endsection
