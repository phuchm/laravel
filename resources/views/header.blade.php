<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" ng-app="myApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/angular.min.js" type="text/javascript"></script>
        <script src="js/myApp.js" type="text/javascript"></script>
        <script src="js/employees.js" type="text/javascript"></script>
        <script src="js/login.js" type="text/javascript"></script>

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="overlay-layer" style="display: none;"></div>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Laravel</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/">{{ trans('content.Home') }}</a></li>
                        <li><a href="/">{{ trans('content.About') }}</a></li>
                        <li><a href="/">{{ trans('content.Contact') }}</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('content.Language') }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/en">{{ trans('content.English') }}</a></li>
                                <li><a href="/vi">{{ trans('content.Vietnamese') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="" data-toggle="modal" data-target="#myLogin">{{ trans('content.SignIn') }}</a></li>
                        <li><a href="" data-toggle="modal" data-target="#mySignup">{{ trans('content.SignUp') }}</a></li>
                    </ul>
                </div> <!--/.nav-collapse -->
            </div> <!--/.container-fluid -->
        </nav>