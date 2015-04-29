@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                @include('profile.navigation', ['active' => 'security-setting'])
            </div>
            <div class="col-sm-4">
                <form action="/profile/security" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label for="password">Old Password</label>
                        <input type="password" name="password"
                               id="password" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" name="newPassword"
                               id="newPassword" class="form-control"/>
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