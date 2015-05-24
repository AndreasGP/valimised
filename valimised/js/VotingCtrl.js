main.controller('VotingCtrl', function ($scope, $filter, $http, ngTableParams) {
    //This needs t obe rewritten to watch the dropdown menus and change data in table
    //according to the values in dropdown.
    
    $scope.fetchData = function($id) {
        $http.get('/valimised/kandidaadid/getJSON/' + $id).
                success(function (data) {
                    $scope.data = data;

                    $("#candidatename").text(data['id'] + " - " + data['firstname'] + " " + data['lastname']);
                    $("#candidateparty").text(data['party']);
                }).
                error(function () {
                    console.log("Fail!");
                });
    }
    
    
    $scope.vote = function() {
        $candidateid = document.getElementById("candidate").value;
        $http.post('/valimised/haaleta/' + $candidateid).
                success(function () {
                    console.log("Success!");
                    $("#success_message").show();
                }).
                error(function () {
                    console.log("Fail!");
                    $("#fail_message").show();
                });
    }
    
     $scope.cancelVote = function() {
        $http.delete('/valimised/haaleta').
                success(function () {
                    console.log("Success!");
                    $("#success_message2").show();
                }).
                error(function () {
                    console.log("Fail!");
                    $("#fail_message2").show();
                });
    }

});


$(".document").ready(function() {
   $("#selection").hide(); 
   $("#success_message").hide();
   $("#fail_message").hide();
   $("#success_message2").hide();
   $("#fail_message2").hide();
});

candidateChanged = function() {
    $id = document.getElementById("candidate").value;
    $("#noSelection").hide();
    $("#selection").show(); 
    angular.element(document.getElementById('voting')).scope().fetchData($id);
}
