require('base');

require(['components', 'react'], function(components, React) {

  React.render(
  	<form action="{{ URL::to('/user/register') }}" method="post" accept-charset="utf-8">
	    <input type="email" name="email" className="form-control" placeholder="邮箱" required=""/>
	    <input type="username" name="username" className="form-control" placeholder="用户名" required=""/>
	    <input type="password" name="password" className="form-control" placeholder="密码" required=""/>
	    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	    <input type="submit" />
  	</form>,document.getElementById('J_register'));

});