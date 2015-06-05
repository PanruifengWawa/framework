<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>InterU</title>
	<?php
		$user = \Session::get('user');
		if(!$user)
			$user = 'undefined';
		else{
			unset($user->password);
			$user = $user->toJson();
		}
	?>
	<script>
		window.iu = {};
		window.iu['_token'] = '{{{csrf_token()}}}';
		window.iu['user'] = <?php echo $user; ?>;
	</script>
</head>
<body>
  <div id="J_header"></div>
	@yield('content')

  <script src="/UI/common.bundle.js"></script>
	@yield('scripts')
	<script type="text/javascript">
	var jiathis_config = {data_track_clickback:'true'};
	</script>
	<script id="jiathis-script" type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1399172634630776" charset="utf-8"></script>
</body>
</html>