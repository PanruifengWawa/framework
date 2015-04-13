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
<<<<<<< HEAD
		window.iu = {};
		window.iu['user'] = {{$user}};
=======
		window.iu = null;
		window.iu['user'] = <?php echo $user;?>
>>>>>>> 87f3c646d950dcfdc4139d92722a469145e02b03
	</script>
</head>
<body>
  <div id="J_header"></div>
	@yield('content')

  <script src="UI/base.bundle.js"></script>
	@yield('scripts')
</body>
</html>