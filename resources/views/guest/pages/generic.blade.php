@extends('guest.template')

@section('title', $page->title)

@section('meta')
	<meta name="description" content="{{ $page->og_desc }}">
	<meta property="og:description" content="{{ $page->og_desc }}">
	<meta property="og:image" content="{{ asset('img/logo.jpg') }}">
@endsection

@section('content')
<div id="pagesGeneric">
	<div class="row">
		<div class="small-12 column">
			<h1>
				{{ $page->{'title_' . $locale->lang} }}
			</h1>
			{!! $page->{'html_' . $locale->lang} !!}
		</div>
	</div>
</div>
@endsection
