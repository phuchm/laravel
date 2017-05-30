myApp.controller('employeeController', function($scope, $http, vcRecaptchaService) {
    $scope.response = null;
    $scope.widgetId = null;
    $scope.model = {
        key: '6LeR1xcUAAAAAJA_KE9i_Luib8rbPjYfRRNiFG6d'
    };
    $scope.setResponse = function (response) {
        console.info('Response available');
        $scope.response = response;
    };
    $scope.setWidgetId = function (widgetId) {
        console.info('Created widget ID: %s', widgetId);
        $scope.widgetId = widgetId;
    };
    $scope.cbExpiration = function() {
        console.info('Captcha expired. Resetting response object');
        vcRecaptchaService.reload($scope.widgetId);
        $scope.response = null;
    };
    // Retrieve employees listing from API
    $scope.get = function() {
        $("#overlay-layer").show();
        $http({
            method : "GET",
            url : "/get/employees"
        }).then(function success(response) {
            // console.log("Employees: " + JSON.stringify(response));
            $("#overlay-layer").hide();
            $scope.employees = response.data;
        }, function error(response) {
            // console.log("Employees: " + JSON.stringify(response));
            $("#overlay-layer").hide();
            if (response.data.message) {
                alert(JSON.stringify(response.data.message));
                return;
            }
            alert(response.statusText);
        });
    };

    $scope.get();

    $scope.signUp = function() {
        $('#myLogin').modal('hide');
        $('#mySignup').modal('show');
    };

    $scope.logIn = function() {
        $('#mySignup').modal('hide');
        $('#myLogin').modal('show');
    };

    // Show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;
        $('#myModal').modal('show');
        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Employee";
                break;
            case 'edit':
                $scope.form_title = "Employee Detail";
                $scope.id = id;
                $("#overlay-layer").show();
                $http.get('/read/employee/' + id)
                .then(function success(response) {
                    // console.log("Employees: " + JSON.stringify(response));
                    $("#overlay-layer").hide();
                    $scope.employee = {};
                    $scope.employee = response.data;
                }, function error(response) {
                    // console.log("Error: " + JSON.stringify(response));
                    $('#myModal').modal('hide');
                    $("#overlay-layer").hide();
                    $scope.employee = {};
                    if (response.data.message) {
                        alert(JSON.stringify(response.data.message));
                        return;
                    }
                    alert(response.statusText);
                });
                break;
            default:
                break;
        }
    };

    // Save new record / update existing record
    $scope.save = function(modalstate, id) {
        $('#myModal').modal('hide');
        var url = "/create/employee";

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url = "/update/employee/" + id;
        }
        $("#overlay-layer").show();
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.employee),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function success(response) {
            // console.log("Employees: " + JSON.stringify(response));
            $("#overlay-layer").hide();
            $scope.employee = {};
            $scope.get();
        }, function error(response) {
            // console.log("Error: " + JSON.stringify(response));
            $("#overlay-layer").hide();
            $scope.employee = {};
            if (response.data.message) {
                alert(JSON.stringify(response.data.message));
                return;
            }
            alert(response.statusText);
        });
    };

    // Delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $("#overlay-layer").show();
            $http({
                method: 'POST',
                url: '/delete/employee/' + id
            }).then(function success(response) {
                // console.log("Employees: " + JSON.stringify(response));
                $("#overlay-layer").hide();
                $scope.employee = {};
                $scope.get();
            }, function error(response) {
                // console.log("Error: " + JSON.stringify(response));
                $("#overlay-layer").hide();
                $scope.employee = {};
                if (response.data.message) {
                    alert(JSON.stringify(response.data.message));
                    return;
                }
                alert(response.statusText);
            });
        } else {
            return false;
        }
    };

    $scope.submit = function () {
        var valid;
        /**
         * SERVER SIDE VALIDATION
         *
         * You need to implement your server side validation here.
         * Send the reCaptcha response to the server and use some of the server side APIs to validate it
         * See https://developers.google.com/recaptcha/docs/verify
         */
        console.log('sending the captcha response to the server', $scope.response);
        if (valid) {
            console.log('Success');
        } else {
            console.log('Failed validation');
            // In case of a failed validation you need to reload the captcha
            // because each response can be checked just once
            vcRecaptchaService.reload($scope.widgetId);
        }
    };
});
/*
.controller('loginController', function($scope, $http) {
    $scope.login = {
        username: '',
        password: ''
    };

    $scope.signIn = function() {
        console.log("username: " + $scope.login.username);
        console.log("password: " + $scope.login.password);
    };
});*/