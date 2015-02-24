/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


angular.module('formvalidation', [])

        .controller('stageController', ['$scope', function ($scope) {
                $scope.user = {};
                $scope.user.firstname = '';
                $scope.user.lastname = '';
                $scope.user.date = '';
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

                $scope.postDB = function () {
                    var ajaxRequest;  // The variable that makes Ajax possible!
                    try {

                        // Opera 8.0+, Firefox, Safari
                        ajaxRequest = new XMLHttpRequest();
                    } catch (e) {

                        // Internet Explorer Browsers
                        try {
                            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                        } catch (e) {

                            try {
                                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                            } catch (e) {

                                // Something went wrong
                                alert("Your browser broke!");
                                return false;
                            }
                        }
                    }

                    // Create a function that will receive data
                    // sent from the server and will update
                    // div section in the same page.
                    ajaxRequest.onreadystatechange = function () {

                        if (ajaxRequest.readyState === 4) {
                            var ajaxDisplay = document.getElementById('ajaxDiv');
                            ajaxDisplay.innerHTML = ajaxRequest.responseText;
                        }
                    };

                    // Now get the value from user and pass it to
                    // server script.
                    var queryString = "&firstname=" + $scope.user.firstname;

                    queryString += "&lastname=" + $scope.user.lastname + "&date=" + $scope.user.date
                    + "&education=" + $scope.user.education + "&job=" + $scope.user.job + "&party=" +
                    $scope.user.party + "&area=" + $scope.user.area + "&description=" + $scope.user.description;
                    ajaxRequest.open("GET", "ajax-example.php" + queryString, true);
                    ajaxRequest.send(null);
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