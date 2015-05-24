main.controller('CandidateAreaCtrl', function ($scope, $filter, $http, ngTableParams) {

    $scope.search = function (areaid, partyid, name) {

        console.log("areaid: " + areaid);
        console.log("partyid: " + partyid);
        console.log("name: " + name);

        if (areaid === undefined) {
            areaid = -1;
        }
        if (partyid === undefined) {
            partyid = -1;
        }
        if (name === undefined) {
            name = -1;
        }
        
        $http.get('/valimised/kandidaadid/search/' + areaid + '/' + partyid + '/' + name).
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
                    console.log("Success!");
                    console.log($scope.data);
                }).
                error(function (data, status, headers, config) {
                    console.log("Fail!");
                });

    }
    
});

