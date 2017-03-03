var myApp = angular.module('employeeRecords', []);
myApp.controller('employeesController', function($scope, $http) {
    // Retrieve employees listing from API
    $scope.get = function() {
        $http({
            method : "GET",
            url : "/get/employees"
        }).then(function success(response) {
            console.log("Employees: " + JSON.stringify(response));
            $scope.employees = response.data;
        }, function error(response) {
            console.log("Error: " + JSON.stringify(response));
            alert(response.statusText);
        });
    }

    $scope.get();

    // Show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Employee";
                break;
            case 'edit':
                $scope.form_title = "Employee Detail";
                $scope.id = id;
                $http.get('/read/employee/' + id)
                .then(function success(response) {
                    console.log("Employees: " + JSON.stringify(response));
                    $scope.employee = response.data;
                    $('#myModal').modal('show');
                }, function error(response) {
                    console.log("Error: " + JSON.stringify(response));
                    $('#myModal').modal('hide');
                    alert(response.statusText);
                });
                break;
            default:
                break;
        }
    }

    // Save new record / update existing record
    $scope.save = function(modalstate, id) {
        $('#myModal').modal('hide');
        var url = "/create/employee";

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url = "/update/employee/" + id;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.employee),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function success(response) {
            console.log("Employees: " + JSON.stringify(response));
            $scope.get();
        }, function error(response) {
            console.log("Error: " + JSON.stringify(response));
            alert(response.statusText);
        });
    }

    // Delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'POST',
                url: '/delete/employee/' + id
            }).then(function success(response) {
                console.log("Employees: " + JSON.stringify(response));
                $scope.get();
            }, function error(response) {
                console.log("Error: " + JSON.stringify(response));
                alert(response.statusText);
            });
        } else {
            return false;
        }
    }
});