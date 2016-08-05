@extends('admin.master')
@section('content')
    <form action="{!! route('admin.user.getAdd') !!}" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="register-container animated fadeInDown">
            @include('admin.alert.notify')
            <div class="registerbox bg-white">
                <div class="registerbox-title">Register</div>
                <div class="registerbox-caption ">Please fill in your information</div>
                <div class="registerbox-textbox">
                    <input type="text" name="txtuser" class="form-control" placeholder="Username" />
                </div>
                <div class="registerbox-textbox">
                    <input type="password" name="txtpass" class="form-control" placeholder="Enter Password" />
                </div>
                <div class="registerbox-textbox">
                    <input type="password" name="txtrepass" class="form-control" placeholder="Confirm Password" />
                </div>
                <div class="registerbox-textbox">
                    <input type="email" name="txtemail" class="form-control" placeholder="Email" />
                </div>
                <div class="registerbox-submit">
                    <input type="submit" class="btn btn-primary pull-right" value="SUBMIT">
                </div>
            </div>
        </div>
    </form>
@endsection
