<!doctype html>
<html lang="{{ app()->getLocale() }}">
	@include('layouts.head')

	<body>
		@include('layouts.nav')

		@yield('content')

		@include('layouts.scripts')
	</body>
</html>
