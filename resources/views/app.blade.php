<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>InterU</title>
	<?php
		$user = \Session::get('user');
		unset($user->password);
		$user = json_encode($user);
		if(!$user)$user='';
	?>
	<script>
		window.iu = null;
		window.iu['user'] = {{$user}};
	</script>
</head>
<body>
  <div id="J_header"></div>
	@yield('content')

  <script src="UI/base.bundle.js"></script>
	@yield('scripts')
</body>
</html>