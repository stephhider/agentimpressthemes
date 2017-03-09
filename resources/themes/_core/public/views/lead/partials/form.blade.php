<div class="row">
    <div class="col-sm-12">
        <p>
            <strong>Log in using one of your social accounts.</strong>
            <br>
            <small><i>Don't worry... This does not let us post to any of your accounts.</i></small>
        </p>
        <a href="{{ route('social.authenticate', 'facebook') }}" class="btn btn-block btn-social facebook"><i class="fa fa-facebook"></i> Log In with Facebook</a>
        <a href="{{ route('social.authenticate', 'twitter') }}" class="btn btn-block btn-social twitter"><i class="fa fa-twitter"></i> Log In with Twitter</a>
        <a href="{{ route('social.authenticate', 'google') }}" class="btn btn-block btn-social google top-button"><i class="fa fa-google"></i> Log In with Google</a>
    </div>
    <div class="col-sm-12">
        <form class="" action="{{ route('social.login') }}" method="post">
            {!! csrf_field() !!}
            <p><strong>Or... Log in with your email &amp; password.</strong></p>
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="email"><i class="fa fa-user"></i> Username or Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="form-group col-sm-12">
                    <label for="password"><i class="fa fa-key"></i> Password</label>
                    <input id="password" type="password" name="password" value="" class="form-control">
                </div>
                <div class="form-group col-sm-12">
                    <button type="submit" class="btn btn-primary btn-login"><i class="fa fa-lock"></i> Log in</button>
                </div>
                <div class="form-group col-sm-12">
                    <label for="remember">
                        <input id="remember" type="checkbox" name="remember">
                    </label><span class="remember-label"> Remember Me</span>
                </div>
                <div class="form-group col-sm-12">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('social.register') }}">Need to create an account?</a></li>
                        <li><a href="{{ route('social.password') }}">Need to reset your password?</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>