<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>InterU</title>
	<?php
		$user = \Session::get('user');
		if(!$user)
			$user='';
		else{
			unset($user->password);
			$user = json_encode($user);
		}
	?>
	<script>
		window.iu = {};
		// window.iu['user'] = {{$user}};
	</script>
</head>
<body>
  <div id="J_header"></div>
	@yield('content')

  <script src="/UI/common.bundle.js"></script>
	@yield('scripts')
</body>
</html>