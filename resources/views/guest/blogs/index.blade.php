@extends('guest.template')

@section('title', 'Blog')

@section('meta')
	<meta name="description" content="">
	<meta property="og:description" content="">
	<meta property="og:image" content="{{ asset('img/ed100-logo.png') }}">
@endsection

@section('content')
<div id="blogsIndex">
	<section class="blogs">
		@foreach ($blogs as $blog)
			<div class="row blog">
				<div class="small-12 column">
					<a href="{{ $blog->{'url_' . $locale->lang}() }}" class="blogTitle">
						{{ $blog->{'title_' . $locale->lang} }}
					</a>
					<div>
						{{ str_limit($blog->{'plaintext_' . $locale->lang}, 500) }}
					</div>
				</div>
			</div>
		@endforeach
	</section>
</div>
@endsection
