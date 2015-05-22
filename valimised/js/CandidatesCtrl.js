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
    
    
    $scope.candidategenstat = function (area, party, name) {
        $http.get('/valimised/kandidaadid/search/'+area+'/'+ party +'/'+name).
                success(function (candidate) {
                    $scope.candidate = candidate;
                }).
                error(function () {
                    console.log("Fail!");
                });
    };
});

function addTable(area, party) {
    var skoop = angular.element("#container").scope();
    //Angularist vaja kätte saada :D
   // skoop.candidategenstat(area.selectedIndex, party.selectedIndex, document.getElementById("name").value);
    console.log("here");
    var myTableDiv = document.getElementById("myDynamicTable");
    var table = document.createElement('TABLE');
    table.border = '1';

    var tableBody = document.createElement('TBODY');
    table.appendChild(tableBody);
    
    //luua getinfo meetod, anmed töödelda taelisse
    for (var i = 0; i < 3; i++) {
        var tr = document.createElement('TR');
        tableBody.appendChild(tr);

        for (var j = 0; j < 4; j++) {
            var td = document.createElement('TD');
            td.width = '75';
            td.appendChild(document.createTextNode("Cell " + i + "," + j));
            tr.appendChild(td);
        }
    }
    myTableDiv.appendChild(table);

}
