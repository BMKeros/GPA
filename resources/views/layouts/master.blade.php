<!DOCTYPE html>
<html>

	@include('layouts.head')

	<body class="nav-md">
	<div class="container body">


		<div class="main_container">
			@include('layouts.sidenavbar')
			@include('layouts.topnav')

			<div class="right_col" role="main"> <!-- page content -->
				@yield('content')

			</div>

		</div>

	</div>

		<script src="{{ asset('plugins/bootstrap.min.js') }}"></script>

		<script src="{{ asset('plugins/bootstrap-progressbar.min.js')}}"></script>

		<script src="{{ asset('plugins/icheck.min.js') }}"></script>

		<script src="{{ asset('js/custom.js') }}"></script>

		<script>
			NProgress.done();
		</script>

		@yield('script')

	</body>
</html>