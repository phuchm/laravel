var myApp = angular.module('employeeRecords', []);
myApp.controller('employeesController', function($scope, $http) {
    // Retrieve employees listing from API
    $http({
        method : "GET",
        url : "/api/employees"
    }).then(function success(response) {
        console.log("Employees: " + JSON.stringify(response));
        $scope.employees = response.data;
    }, function error(response) {
        alert(response.statusText);
    });

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
                $http.get('/api/employees/' + id)
                .then(function success(response) {
                    $scope.employee = response;
                }, function error(response) {
                    alert(response.statusText);
                });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    // Save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = "/api/employees";

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.employee),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function success(response) {
            location.reload();
        }, function error(response) {
            alert(response.statusText);
        });
    }

    // Delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: '/api/employees/' + id
            }).then(function success(response) {
                location.reload();
            }, function error(response) {
                alert(response.statusText);
            });
        } else {
            return false;
        }
    }
});