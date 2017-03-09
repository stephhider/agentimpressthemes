@extends('layout.master')
@section('content')
    <section class="main-section">
        <div class="container">
            <div class="row">
                <div class="login-wrap col-lg-8 col-lg-offset-2">
                    <form class="wow fadeIn" action="{{ route('social.register') }}" method="post">
                        {!! csrf_field() !!}
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="form-group">
                                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                </div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Create an account</h4>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="name"><i class="fa fa-user"></i> Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="password"><i class="fa fa-key"></i> Password</label>
                                <input id="password" type="password" name="password" value="" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="confirm"><i class="fa fa-key"></i> Confirm Password</label>
                                <input id="confirm" type="password" name="password_confirmation" value="" class="form-control">
                            </div>
                            <div class="form-group col-sm-12">
                                <button type="submit" class="btn btn-primary btn-login">
                                    <i class="fa fa-lock"></i> Register
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection