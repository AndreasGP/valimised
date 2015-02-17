/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
'use strict';

angular.module('formvalidation',[]);

function stageController($scope){
    $scope.firstname ='';
    $scope.lastname ='';
    $scope.date ='';
    $scope.education ='';
    $scope.job ='';
    
    
    $scope.submitForm = function () {
        console.info("Here I should implement the logic to send a request to the server.");
    };

}

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