/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
'use strict';

angular.module('formvalidation',[]);

function stageController($scope){
    $scope.firstname ='Loll';
    $scope.lastname ='Lammas';
    $scope.date ='0.00.000';
    $scope.education ='Lasteaed';
    $scope.job ='Kraavikaevaja';
    
    
    $scope.submitForm = function () {
        console.info("Here I should implement the logic to send a request to the server.");
    };

}
