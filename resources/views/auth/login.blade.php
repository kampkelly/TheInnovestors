@extends('layouts.new_master')

@section('content')
 <div class="login-container">
<div class="container" style="padding-top: 100px;">
    <div class="row login">
    <div style="height: 70px;"></div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 offset-md-2">
            <div class="car" id="login">
                <div class="card-header text-success">
                 
               <!--    <?php $cookie_name = 'the_in_us_name'; ?>
                   @if(isset($_COOKIE[$cookie_name]))
                   <span style="colr: blue;">Welcome back {{$_COOKIE[$cookie_name]}}!</span>
                   @endif  -->
                   <b>Login To Your Account </b>
                </div>
                <div class="card-body">
                <span class="text-center dont-show" v-bind:style="styleObject">@{{message}}</span>
                
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}" >
                         {{ csrf_field() }}
                       
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                            <label for="email" class="col-md-4 control-label">E-Mail Address/Username</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" autofocus placeholder="Enter Email/Username" v-model="email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Type Password" v-model="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-block" v-show="login">
                                    Login
                                </button>
                                <button class="btn btn-success btn-block dont-show" v-show="loading" :disabled="disabled"><i class="fa fa-circle-o-notch fa-spin"></i> Logging in</button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                <a class="btn btn-link" href="/">
                                    Register
                                </a>
                                <h6 class="text-center text-white mb-3">Or Login With</h6>
                                <ul class="list-inline list-unstyled" style="display: flex;">
                                <a href="/auth/facebook" class="btn btn-primary" :disabled="disabled" style="cursor: pointer; flex: 1; margin-right: 10px;"> Facebook</a>
                            <a href="{{ url('/auth/google') }}" class="btn btn-md btn-danger" :disabled="disabled" style="cursor: pointer; flex: 1; margin-left: 10px;">Google</a>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--most popular page -->
            
            <!--most popular page -->
        </div>
    </div>
</div>
</div>
<div style="height: 0px;"></div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
<script type="text/javascript">
    
    

     var input = {
  "url": "http://metallidurans15.com",
  "depth": 3
};
Algorithmia.client("simmQHdSCeJYe71n3gkt7jsIlFi1")
           .algo("algo://web/ErrorScanner/0.1.3")
           .pipe(input)
           .then(function(output) {
             console.log(output);
           });
</script>
