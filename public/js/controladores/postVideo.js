var app = angular.module("VideoPost", []);

var InicioController = function ($scope) {
    $scope.uploadFile = function () {
        var name = $scope.name;
        var file = $scope.file;
        console.log(name);
    };
};

app.controller("InicioController", ["$scope",InicioController]);