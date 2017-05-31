<div id="signupbox" style="margin-top:50px; width: 30%; margin-left: 35%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">{{ trans('content.SignUp') }}</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px">
                <a id="signinlink" href="" ng-click="logIn()">{{ trans('content.SignIn') }}</a>
            </div>
        </div>

        <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form">
                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>{{ trans('content.Error') }}:</p>
                    <span></span>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">{{ trans('content.Email') }}</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" placeholder="{{ trans('content.Email Address') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">{{ trans('content.First Name') }}</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="firstname" placeholder="{{ trans('content.First Name') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-md-3 control-label">{{ trans('content.Last Name') }}</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="lastname" placeholder="{{ trans('content.Last Name') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">{{ trans('content.Password') }}</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="passwd" placeholder="{{ trans('content.Password') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="icode" class="col-md-3 control-label">{{ trans('content.Invitation Code') }}</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="icode" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <!-- Button -->
                    <div class="col-md-offset-3 col-md-9">
                        <button id="btn-signup" type="button" class="btn btn-info" ng-click="submit()"><i class="icon-hand-right"></i> &nbsp; {{ trans('content.SignUp') }}</button>
                        <span style="margin-left:8px;">{{ trans('content.Or') }}</span>
                    </div>
                </div>

                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   {{ trans('content.Sign Up with Facebook') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>