<div id="passwordbox" style="margin-top: 50px; width: 45%; margin-left: 25%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">{{ trans('content.Password Reset') }}</div>
            <div style="float: right; font-size: 80%; position: relative; top: -10px"><a data-toggle="modal" data-target="#myLogin" data-dismiss="modal">{{ trans('content.SignIn') }}</a></div>
        </div>

        <div style="padding-top: 30px" class="panel-body" >
            <form id="pwdform" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">{{ trans('content.Registered Email') }}</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="email" placeholder="{{ trans('content.Enter your email address that you used to register') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button id="btn-signup" type="button" class="btn btn-warning">{{ trans('content.Send') }}</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid #888; padding-top: 15px; font-size: 85%" >
                            <i>{{ trans('content.We\'ll send you an email with a link to reset your password') }}</i>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>