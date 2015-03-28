main.controller('VotingCtrl', function ($scope, $filter, $http, ngTableParams) {
    //This needs t obe rewritten to watch the dropdown menus and change data in table
    //according to the values in dropdown.
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
    });
});

function vote(id){
    //Add to db the vote.
}
