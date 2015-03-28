main.controller('ResultsCtrl', function ($scope, $http, $filter, ngTableParams) {
    $http.get('tulemused/get/10/10').
            success(function (data, status, headers, config) {
                $scope.data = data;
                $scope.tableParams = new ngTableParams({
                    page: 1, // show first page
                    count: 10, // count per page
                    sorting: {
                        count: 'desc'     // initial sorting
                    }
                }, {
                    total: $scope.data.length, // length of data
                    getData: function ($defer, params) {
                        var orderedData = params.sorting() ?
                                $filter('orderBy')($scope.data, params.orderBy()) :
                                $scope.data;

                        $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
                    }
                });
            }).
            error(function (data, status, headers, config) {
                console.log("Fail!");
            });
            
        angular.module("app", ["js/libs/Chart.js"]).controller("PieCtrl", function ($scope) {
        $scope.labels = ["Download Sales", "In-Store Sales", "Mail-Order Sales"];
        $scope.data = [300, 500, 100];
});    
});
