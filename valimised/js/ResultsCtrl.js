var main = angular.module('main', ['ngTable']);
main.controller('ResultsCtrl', function($scope, $http, ngTableParams) {
    $http.get('tulemused/get/10/10').
            success(function(data, status, headers, config) {
                
                $scope.data = data;
                $scope.tableParams = new ngTableParams({
                    page: 1, // show first page
                    count: 10 // count per page
                }, {
                    total: $scope.data.length, // length of data
                    getData: function($defer, params) {
                        $defer.resolve($scope.data.slice((params.page() - 1) * params.count(), params.page() * params.count()));
                    }
                });
            }).
            error(function(data, status, headers, config) {
                console.log("Fail!");
            });

});
