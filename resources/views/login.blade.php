<div ng-app="loginRecord" ng-controller="loginController" id="loginbox" style="margin-top:50px; width: 30%; margin-left: 35%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">{{ trans('content.SignIn') }}</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">{{ trans('content.Forgot password?') }}</a></div>
        </div>

        <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

            <form id="loginform" class="form-horizontal" role="form">
                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>{{ trans('content.Error') }}:</p>
                    <span></span>
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input id="login-username" type="text" class="form-control" name="username" ng-model="login.username" placeholder="{{ trans('content.Username or email') }}">
                </div>
    
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input id="login-password" type="password" class="form-control" name="password" ng-model="login.password" placeholder="{{ trans('content.Password') }}">
                </div>
    
                <div class="input-group">
                    <div class="checkbox">
                        <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1"> <p style="padding-top: 3px;">{{ trans('content.Remember me') }}</p>
                        </label>
                    </div>
                </div>
    
                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    <div class="col-sm-12 controls">
                        <a id="btn-login" href="#" class="btn btn-success" ng-click="signIn()">{{ trans('content.Login') }}</a>
                        <a id="btn-fblogin" href="#" class="btn btn-primary">{{ trans('content.Login with Facebook') }}</a>
                    </div>
                </div>
    
                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            {{ trans('content.Don\'t have an account!') }}
                            <a href="" ng-click="signUp()">
                            {{ trans('content.Sign Up here') }}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>