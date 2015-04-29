@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-2">
        @include('profile.navigation', ['active' => 'basic-setting'])
    </div>
    <div class="col-sm-4">
        <form action="/profile" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description"
                       id="description" class="form-control" value="{{$user->description}}"/>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="text" name="avatar"
                       id="avatar" class="form-control" value="{{$user->avatar}}"/>
            </div>
            <div class="form-group">
                <input type="submit" value="提交" class="button"/>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="/UI/barebone.bundle.js"></script>
@endsection