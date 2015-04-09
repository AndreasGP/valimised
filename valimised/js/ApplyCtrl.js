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
        $scope.cookieCheck = function () {
            
            if(getCookie("education") === null) {
                $("#cookieLabel").hide(); 
            } else {
                $("#cookieLabel").text("Kandidatuur esitatakse automaatselt!");
                $("#cookieLabel").show(); 
                $scope.user.year = getCookie("year");
                $scope.user.month = getCookie("month");
                $scope.user.day = getCookie("day");
                $scope.user.education = getCookie("education");
                $scope.user.job = getCookie("job");
                $scope.user.party = getCookie("party");
                $scope.user.description = getCookie("description");
                //$scope.user.pic = '';
                console.log("Cookies exist! Automatically submitting!");
                console.log(getCookie("year"));
                $scope.postDB();
                $("#cookieLabel").text("Teie varasem kandidatuur on esitatud!");
                clearCookies();
            }
            
        };
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
            
            $connection = hostReachable();
            
            if($connection) {              
                $("#cookieLabel").hide();
                
            } else {
                $("#cookieLabel").text("Serveriga ei saanud ühendust. Teie kandidatuur esitatakse kui te tulete siia lehele tagasi koos ühendusega.");
                $("#cookieLabel").show(); 
                setCookie("education", $scope.user.education);
                setCookie("job", $scope.user.job);
                setCookie("party", $scope.user.party);
                setCookie("description", $scope.user.description);
                setCookie("year", $scope.user.year);
                setCookie("month", $scope.user.month);
                setCookie("day", $scope.user.day);
            }                   
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
    if (field5 = getCookie("year"))
        document.form.yeardropdown.value = field5;
    if (field6 = getCookie("month"))
        document.form.monthdropdown.value = field6;
    if (field7 = getCookie("day"))
        document.form.daydropdown.value = field7;
});

function hostReachable() {

  // Handle IE and more capable browsers
  var xhr = new ( window.ActiveXObject || XMLHttpRequest )( "Microsoft.XMLHTTP" );
  var status;

  // Open new request as a HEAD to the root hostname with a random param to bust the cache
  xhr.open( "HEAD", "//" + window.location.hostname + "/?rand=" + Math.floor((1 + Math.random()) * 0x10000), false );

  // Issue request and handle response
  try {
    xhr.send();
    return ( xhr.status >= 200 && (xhr.status < 300 || xhr.status === 304) );
  } catch (error) {
    return false;
  }

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
    deleteCookie("year");
    deleteCookie("month");
    deleteCookie("day");
}



  function deleteCookie(name)
  {
    var expired = new Date(today.getTime() - 24 * 3600 * 1000); // less 24 hours
    document.cookie=name + "=null; path=/; expires=" + expired.toGMTString();
  }

function getCookie(name) {
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
}