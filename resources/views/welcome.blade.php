<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" ng-app="employeeRecords">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/angular.min.js" type="text/javascript"></script>
        <script src="js/employees.js" type="text/javascript"></script>
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
                        <li><a href="/">{{ trans('content.SignIn') }}</a></li>
                        <li><a href="/">{{ trans('content.SignUp') }}</a></li>
                    </ul>
                </div> <!--/.nav-collapse -->
            </div> <!--/.container-fluid -->
        </nav>

        <div ng-controller="employeesController" class="container">
            <div id="main">
            <h2>Employees Database</h2>

            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Position</th>
                        <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Employee</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="employee in employees">
                        <td><% employee.id %></td>
                        <td><% employee.name %></td>
                        <td><% employee.email %></td>
                        <td><% employee.contact_number %></td>
                        <td><% employee.position %></td>
                        <td>
                            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', employee.id)">Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(employee.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel"><% form_title %></h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmEmployees" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname" value="<% name %>" 
                                        ng-model="employee.name" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmEmployees.name.$invalid && frmEmployees.name.$touched">Name field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<% email %>" 
                                        ng-model="employee.email" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmEmployees.email.$invalid && frmEmployees.email.$touched">Valid Email field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Contact Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="<% contact_number %>" 
                                        ng-model="employee.contact_number" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="frmEmployees.contact_number.$invalid && frmEmployees.contact_number.$touched">Contact number field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Position</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="position" name="position" placeholder="Position" value="<% position %>" 
                                        ng-model="employee.position" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="frmEmployees.position.$invalid && frmEmployees.position.$touched">Position field is required</span>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer">
                CÔNG TY <b>Sợ vợ toàn tập</b>. Số nhà Thiên đường thứ 2, Phường Cống Vị, Quận Ba Đình, Tp Hà Nội
                <br>
                Điện thoại: Vợ giữ tiền rồi làm gì có tiền mà mua điện thoại
                <br>
                Ghi nhớ: <b>Vợ là thanh niên cứng, tôi là thanh niên nửa cứng nửa mềm</b> do Vợ cấp từ ngày cưới
            </div>
            </div>
        </div>
    </body>
</html>
