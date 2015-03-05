/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

main.controller('stageController', ['$scope', '$http', function ($scope, $http) {
        console.info("Here I should implement the logic to send a request to the server.");
        $scope.user = {};
        $scope.user.firstname = '';
        $scope.user.lastname = '';
        $scope.user.year = '';
        $scope.user.month = '';
        $scope.user.day = '';
        $scope.user.education = '';
        $scope.user.job = '';
        $scope.user.party = '';
        $scope.user.area = '';
        $scope.user.description = '';
        $scope.user.pic = '';
        var resetUser = angular.copy($scope.user);
        $scope.submitForm = function () {
            
            console.info("This should submit data.");
            
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
            
            Restangular.one('kandidaat').post($scope.user);
            //Generate object with candidate model. Send object.
            $http({
                method: 'POST',
                url: 'candidate_controller.php',
                data: $scope.user,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function (response) {

            }).error(function (response) {
                console.log("Fail!");
            });
        };
        $scope.postDB = function () {        
            console.log($scope.user);
            $http({
                method: 'POST',
                url: '/valimised/kandideerimine/esita',
                data: $.param({'areaid':$scope.user.area, 'educationid':$scope.user.education,
                    'partyid':$scope.user.party, 'birthdate':$scope.user.date, 'job':$scope.user.job, 'description':$scope.user.description}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function (response) {
                console.log("Success!");
            }).error(function (response) {
                console.log("Fail!");
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