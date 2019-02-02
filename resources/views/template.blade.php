<!DOCTYPE html>
<html>
<head>
	<title>@yield('pagetitle') | Empire: CRM for Real Estate</title>
	@include('header')
</head>
<body>
	@include('nav')
	
	@yield('body') {{-- user-defined ('body') --}}
	
</body>
</html>