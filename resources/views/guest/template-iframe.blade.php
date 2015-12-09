<!DOCTYPE html>
<html lang="{{ LaravelGettext::getLocale() }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="/favicon.ico" />

	@yield('meta')
	<meta property="og:title" content="@yield('title') | ED100">
	<meta property="og:url" content="{{ Request::url() }}">

	<title>@yield('title') | ED100</title>

	<link href="/js/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="/js/owl-carousel/owl.theme.css" rel="stylesheet">
	<link href="/css/app.css" rel="stylesheet">
	@yield('css')

	<script src="/js/modernizr.js"></script>
</head>
<body id="guestTemplateIFrameBody">
<div id="guestTemplateIFrame">
	@include('guest.messages')
	@yield('content')
	<script src="/js/jquery-2.1.4.min.js"></script>
	<script src="/js/foundation/foundation.min.js"></script>
	<script src="/js/owl-carousel/owl.carousel.min.js"></script>
	<script>
		$(document).foundation();
	</script>
	@yield('js')
</div>
</body>
</html>
