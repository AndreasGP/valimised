/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

main.controller('stageController', ['$scope', '$http', function ($scope, $http) {
        $scope.user = {};
        $scope.user.year = '';
        $scope.user.month = '';
        $scope.user.day = '';
        $scope.user.education = '';
        $scope.user.job = '';
        $scope.user.party = '';
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
            clearCookies();
        };

        $scope.postDB = function () {
            setCookie("education", $scope.user.education);
            setCookie("job", $scope.user.job);
            setCookie("party", $scope.user.party);
            setCookie("description", $scope.user.description);

            $http({
                method: 'POST',
                url: '/valimised/kandideerimine/esita',
                data: $.param({'areaid': $scope.user.area, 'educationid': $scope.user.education,
                    'partyid': $scope.user.party, 'day': $scope.user.day, 'month': $scope.user.month, 'year': $scope.user.year, 'job': $scope.user.job, 'description': $scope.user.description}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function (response) {
                console.log("Success!");
            }).error(function (response) {
                console.log("Fail!");
            });
        };
    }]);

$(".document").ready(function () {
    if (field1 = getCookie("education"))
        document.form.education.value = field1;
    if (field2 = getCookie("job"))
        document.form.job.value = field2;
    if (field3 = getCookie("party"))
        document.form.party.value = field3;
    if (field4 = getCookie("description"))
        document.form.description.value = field4;
});

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

var today = new Date();
var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000);
// plus 30 days 
function setCookie(name, value) {
    document.cookie = name + "=" + escape(value) + "; path=/; expires=" + expiry.toGMTString();
}

function clearCookies() {
    deleteCookie("job");
    deleteCookie("education");
    deleteCookie("party");
    deleteCookie("description");
}

function getCookie(name) {
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
}