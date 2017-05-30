myApp.controller('loginController', function($scope, $http) {
    $scope.login = {
        username: '',
        password: ''
    };

    $scope.signIn = function() {
        console.log("username: " + $scope.login.username);
        console.log("password: " + $scope.login.password);
    };
});