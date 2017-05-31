myApp.controller('employeeController', function($scope, $http) {
    $scope.employees = []
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

    // $scope.get();

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
        console.log('Success');
    };
});