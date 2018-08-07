@extends('layouts.app')

@section('content')
<div class="container">
          <div class="card card-container">
  <h2 style="font-size: 20px">Login to your account</h2> 
                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                        @csrf

                         @if ($message = Session::get('success'))
                          <div class="alert alert-success">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif
                        @if ($message = Session::get('warning'))
                          <div class="alert alert-warning">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email address" required autofocus>

                      @if ($errors->has('email'))
                           <span class="invalid-feedback">
                           <strong>{{ $errors->first('email') }}</strong>
                         </span>
                     @endif


                <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                  

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif


                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <!--<a href="{{ route('password.request') }}" class="forgot-password">
                Forgot the password?
                 -->
                 <a href="{{ route('register') }}">Not member yet?</a> 

            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->

            </div>
        </div>
    </div>
</div>
@endsection

