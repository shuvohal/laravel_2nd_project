
<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
@include('frontend.includes.meta')
@include('frontend.includes.style')
</head>

<body>

@include('frontend.includes.header')

	@yield('content')
	<!-- Footer -->

	@include('frontend.includes.footer')

</div>

@include('frontend.includes.script')
</body>

</html>
