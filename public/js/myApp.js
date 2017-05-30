var myApp = angular.module('myApp', ['vcRecaptcha'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});