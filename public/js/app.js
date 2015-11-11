/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var app = angular.module("VideoPost", []);

app.directive("uploaderModel", [
    "$parse",
    function ($parse) {
        return {
            'restrict': 'A',
            'link': function ($scope, element, attr) {
                element.on('change', function (e) {
                    $parse(attr.uploaderModel).assign($scope, element[0].files[0])
                });
            }
        };
    }
]);

var InicioController = function ($scope, upload) {
    $scope.uploadFile = function () {
        var titulo = $scope.titulo;
        var descripcion = $scope.descripcion;
        var file = $scope.file;
        console.log(titulo);
        console.log(descripcion);
        console.log(file);
        upload.uploadFile(titulo, descripcion, file).then(function (res) {
            console.log(res);
        });
    };
};

app.controller("InicioController", ["$scope", "upload", InicioController]);


var UploadService = function ($http, $q) {
    this.uploadFile = function (titulo, descripcion, file) {
        var deferred = $q.defer();
        var formData = new FormData();
        formData.append('titulo', titulo);
        formData.append('descripcion', descripcion);
        formData.append('file', file);
        return $http.post('videopostcon/uploadfile', formData, {
            'headers': {
                'Content-type': undefined
            },
            transformRequest: formData

        }).success(function (res) {
            deferred.resolve(res);
        }).error(function (mensaje, codigo) {
            deferred.reject(mensaje);
        }
        );
        return deferred.promise;
    };
};

app.service("upload", ["$http", "$q", UploadService]);