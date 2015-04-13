@extends('app')

@section('content')
<<<<<<< HEAD
<form action="user/register" method="post" accept-charset="utf-8">
  <input type="email" name="email" class="form-control" placeholder="邮箱" required="">
  <input type="username" name="username" class="form-control" placeholder="用户名" required="">
  <input type="password" name="password" class="form-control" placeholder="密码" required="">
  <input type="submit" />
</form>
=======
  <form action="{{ URL::to('/user/register') }}" method="post" accept-charset="utf-8">
    <input type="email" name="email" class="form-control" placeholder="邮箱" required="">
    <input type="username" name="username" class="form-control" placeholder="用户名" required="">
    <input type="password" name="password" class="form-control" placeholder="密码" required="">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="submit" />
  </form>
>>>>>>> 87f3c646d950dcfdc4139d92722a469145e02b03

@endsection


@section('scripts')
@endsection