@extends('layout.master')
@section('content')
    <section class="main-section">
        <div class="container">
            <div class="row">
                <div class="login-wrap col-lg-8 col-lg-offset-2">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('social.password') }}">
                        {!! csrf_field() !!}
                        <div class="row-fluid">
                            <div class="col-sm-12">
                                <h4>Forgot Password <br><small>Please enter your email below and a link to reset your password will be sent to you.</small></h4>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="email"><i class="fa fa-user"></i> Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-warning btn-login"><i class="fa fa-lock"></i> Request Password Reset</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection