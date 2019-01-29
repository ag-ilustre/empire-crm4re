<!DOCTYPE html>
<html>
<head>
	<title>@yield('pagetitle')</title>
	@include('header')
</head>
<body>
	@include('nav')
	
	@yield('agent_body')
	
</body>
</html>