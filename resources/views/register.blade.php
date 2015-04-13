@extends('app')

@section('content')
<form action="user/register" method="post" accept-charset="utf-8">
  <input type="email" name="email" class="form-control" placeholder="邮箱" required="">
  <input type="username" name="username" class="form-control" placeholder="用户名" required="">
  <input type="password" name="password" class="form-control" placeholder="密码" required="">
  <input type="submit" />
</form>

@endsection


@section('scripts')
@endsection