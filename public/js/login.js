myApp.controller('loginController', function($scope, $http) {
    $scope.login = {
        username: '',
        password: ''
    };
    /*
    $scope.signIn = function() {
        console.log("username: " + $scope.login.username);
        console.log("password: " + $scope.login.password);
    };

    $scope.signUp = function() {
        $('#myLogin').modal('hide');
        // $('.modal-backdrop').remove();
        $('#mySignup').modal('show');
    };

    $scope.resetPassword = function() {
        $('#myLogin').modal('hide');
        // $('.modal-backdrop').remove();
        $('#myPassword').modal('show');
    };*/
});