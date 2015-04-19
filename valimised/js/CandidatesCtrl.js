main.controller('CandidatesCtrl', function ($scope, $filter, $http, ngTableParams) {

    $scope.$watch("areaid", function () {
        $http.get('../kandidaadid/get/' + $scope.areaid + '/10/10').
                success(function (data) {
                    $scope.data = data;
                    $scope.tableParams = new ngTableParams({
                        page: 1, // show first page
                        count: 10, // count per page
                        sorting: {
                            id: 'asc'     // initial sorting
                        }
                    }, {
                        total: $scope.data.length, // length of data
                        getData: function ($defer, params) {
                            var orderedData = params.sorting() ?
                                    $filter('orderBy')($scope.data, params.orderBy()) :
                                    $scope.data;

                            $defer.resolve(orderedData.slice((params.page() - 1) * params.count(),
                                    params.page() * params.count()));

                        }
                    });
                }).
                error(function (data, status, headers, config) {
                    console.log("Fail!");
                });

        $scope.candidatePage = function (id) {
            window.location.href = "morsakabi.planet.ee/valimised/kandidaat/nr/" + id;
        };
    });
    


});
