@extends('layout.master')
@section('content')
    <section class="main-section">
        <div class="container">
            <div class="row">
                <div class="login-wrap col-lg-8 col-lg-offset-2">
                    {{-- TODO: add new error messagages --}}
                    @if(isset($token))
                        <form method="POST" action="{{ route('social.reset') }}">
                            {!! csrf_field() !!}
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="form-group">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                            <input type="hidden" name="token" value="{{ $token or '' }}">
                            <div class="row-fluid">
                                <div class="col-sm-12">
                                    <h4>Reset Password <br>
                                        <small>Please fill out the form below to reset your password.</small>
                                    </h4>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for="email"><i class="fa fa-user"></i> Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $email }}">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="password"><i class="fa fa-key"></i> Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="password_confirmation"><i class="fa fa-key"></i> Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                                <div class="col-sm-12 form-group">
                                    <button type="submit" class="btn btn-warning btn-reset"><i class="fa fa-lock"></i> Reset Password
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    @else
                        <div class="row-fluid">
                            <div class="col-sm-12">
                                <h4>Wrong Token.</h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection