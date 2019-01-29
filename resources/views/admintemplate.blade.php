<!DOCTYPE html>
<html>
<head>
	<title>@yield('pagetitle')</title>
	@include('header')
</head>
<body>
	@include('nav')
	
	@yield('admin_body') {{-- user-defined ('body') --}}
	
</body>
</html>