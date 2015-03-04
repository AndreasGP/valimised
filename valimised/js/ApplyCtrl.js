/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

main.controller('stageController', ['$scope', '$http', function ($scope) {
                console.info("Here I should implement the logic to send a request to the server.");
                $scope.user = {};
                $scope.user.firstname = '';
                $scope.user.lastname = '';
                $scope.user.year = '';
                $scope.user.moth = '';
                $scope.user.day = '';
                $scope.user.education = '';
                $scope.user.job = '';
                $scope.user.party = '';
                $scope.user.area = '';
                $scope.user.description = '';
                $scope.user.pic = '';
                var resetUser = angular.copy($scope.user);
                $scope.submitForm = function () {
                    console.info("Here I should implement the logic to send a request to the server.");
                };
                $scope.resetForm = function () {
                    $scope.user = angular.copy(resetUser);
                    $('#reset').click(function () {
                        $('#party option[value="0"]').attr('selected', 'selected');
                    });
                    $('#reset').click(function () {
                        $('#area option[value="0"]').attr('selected', 'selected');
                    });
                    $('#pic').fileinput('clear');
                    $scope.form.$setPristine();
                };
                $scope.preview = function () {
                    $http({
                        method: 'POST',
                        url: 'kandideerimine/esita/',
                        data: "firstname=" + $scope.user.firstname,
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    }).success(function (data, status, headers, config) {

                    }).
                            error(function (data, status, headers, config) {
                                console.log("Fail!");
                            });
                };
                $scope.postDB = function () {
                    var queryString = "firstname=" + $scope.user.firstname;
                    queryString += "&lastname=" + $scope.user.lastname + "&date=" + $scope.user.date
                            + "&education=" + $scope.user.education + "&job=" + $scope.user.job + "&party=" +
                            $scope.user.party + "&area=" + $scope.user.area + "&description=" + $scope.user.description;
                    $http({
                        method: 'POST',
                        url: 'request-url',
                        data: "firstname=" + $scope.user.firstname,
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    });
                };
            }]);
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#output')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}