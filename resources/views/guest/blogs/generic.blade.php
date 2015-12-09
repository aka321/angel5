@extends('guest.template')

@section('title', $blog->{'title_' . $locale->lang})

@section('meta')
	<meta name="description" content="{{ $blog->{'og_desc_' . $locale->lang} }}">
	<meta property="og:description" content="{{ $blog->{'og_desc_' . $locale->lang} }}">
	<meta property="og:image" content="{{ asset('img/ed100-logo.png') }}">
@endsection

@section('content')
<div id="blogsGeneric">
	<div class="row">
		<div class="small-12 column">
			<h1>
				{{ $blog->{'title_' . $locale->lang} }}
			</h1>
			{!! $blog->{'html_' . $locale->lang} !!}
		</div>
	</div>
	@include('quiz', ['quiz' => $blog->quiz])
</div>
@endsection
