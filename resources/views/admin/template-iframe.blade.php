<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="/favicon.ico" />

	@yield('meta')
	<meta property="og:title" content="@yield('title') | Admin">
	<meta property="og:url" content="{{ Request::url() }}">

	<title>@yield('title') | Admin</title>

	<link href="/css/admin.css" rel="stylesheet">
	<link href="/css/php-diff.css" rel="stylesheet">
	@yield('css')

	<script src="/js/modernizr.js"></script>
</head>
<body>
@include('admin.messages')
@yield('content')
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/foundation/foundation.min.js"></script>
<script>
	$(document).foundation();
</script>
@yield('js')
</body>
</html>
