/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


angular.module('formvalidation',[])

.controller('stageController', ['$scope', function($scope){
    $scope.user = {};
    $scope.user.firstname ='';
    $scope.user.lastname ='';
    $scope.user.date ='';
    $scope.user.education ='';
    $scope.user.job ='';
    $scope.user.party = '';
    $scope.user.area = '';
    $scope.user.description = '';
    $scope.user.pic = '';
    
    var resetUser = angular.copy($scope.user);
    $scope.submitForm = function () {
        console.info("Here I should implement the logic to send a request to the server.");
    };
    
    $scope.resetForm = function (){
      $scope.user = angular.copy(resetUser);
      $('#reset').click(function(){
          $('#party option[value="0"]').attr('selected','selected');
      });
      $('#reset').click(function(){
          $('#area option[value="0"]').attr('selected','selected');
      });
      $('#pic').fileinput('clear');
      $scope.form.$setPristine();
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