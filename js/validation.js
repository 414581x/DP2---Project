var app = angular.module("App", []);


app.controller("myCtrl",function($scope) {
	$scope.onlyletter = RegExp(/^[a-zA-Z\s]*$/);
	$scope.itemCode = RegExp(/^([0-9]{6,6})$/);
	$scope.pswd = RegExp(/^(?=.*[$%^&*])[A-Za-z\d$%^&*]{8,}$/);
	$scope.email = RegExp(/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/);
	$scope.mobile = RegExp(/^([04]{2,2})([0-9]{8,8})*$/);
	$scope.flag = false;

});


