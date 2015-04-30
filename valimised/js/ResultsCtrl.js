main.controller('ResultsCtrl', function ($scope, $http) {

    $scope.switchedToGeneralResults = function () {
        $scope.partygenstat();
        $scope.candidategenstat();
    }

    $scope.partygenstat = function () {
        $http.get('/valimised/tulemused/getGeneralPartyResults/').
                success(function (data) {
                    $scope.data = data;
                }).
                error(function () {
                    console.log("Fail!");
                });
    };

    $scope.candidategenstat = function () {
        $http.get('/valimised/tulemused/getGeneralCandidateResults/').
                success(function (candidate) {
                    $scope.candidate = candidate;
                }).
                error(function () {
                    console.log("Fail!");
                });
    };

    $scope.candidateareastat = function ($id) {

        if ($id === undefined || $id === 0) {
            $id = 1;
        }
        $http.get('/valimised/tulemused/getCandidateResults/' + $id).
                success(function (candidate) {
                    $scope.candidate = candidate;

                    if (typeof candidate != "undefined" && candidate != null && candidate.length > 0) {
                        $("#candidateareaname").text('Valitud piirkond: ' + candidate[0]['areaname']);
                    } else {
                        $("#candidateareaname").text('Valitud piirkond: ' + $("#candidatearea option:selected").text().replace(/[0-9]/g, '').substr(2));
                    }

                }).
                error(function () {
                    console.log("Fail!");
                });
    };

    $scope.partyareastat = function ($id) {
        if ($id === undefined || $id === 0) {
            $id = 1;
        }
        $http.get('/valimised/tulemused/getPartyResults/' + $id).
                success(function (data) {
                    $scope.data = data;

                    if (typeof data != "undefined" && data != null && data.length > 0) {
                        $("#areaname").text('Valitud piirkond: ' + data[0]['areaname']);
                    } else {
                        $("#areaname").text('Valitud piirkond: ' + $("#area option:selected").text().replace(/[0-9]/g, '').substr(2));
                    }

                }).
                error(function () {
                    console.log("Fail!");
                });
    };

    $scope.partystat = function ($id) {

        if ($id === undefined || $id === 0) {
            $id = 1;
        }
        $http.get('/valimised/tulemused/getCandidatePartyResults/' + $id).
                success(function (party) {

                    $scope.party = party;
                    if (typeof party != "undefined" && party != null && party.length > 0) {
                        $("#partyname").text('Valitud erakond: ' + party[0]['partyname']);
                    } else {
                        $("#partyname").text('Valitud piirkond: ' + $("#party option:selected").text().replace(/[0-9]/g, '').substr(2));
                    }
                }).
                error(function () {
                    console.log("Fail!");
                });
    };



});

$(".document").ready(function () {
    window.setTimeout(function () {
        console.log("Called!");
        angular.element("#content").scope().switchedToGeneralResults();
    }, 200);//Give 200ms for the page to load to prevent issues


});

$(".document").ready(function () {
    var skoop = angular.element("#content").scope();
    var time = 2000;
    var refreshIntervalId = window.setInterval(function(){
        console.log("1");
            window.setTimeout(skoop.switchedToGeneralResults(),0);
        }, time);
    $("#tabs li").click(function () {
    if ($(this).prevAll().length + 1 == 1) {
        clearInterval(refreshIntervalId);
        refreshIntervalId = window.setInterval(function(){
            console.log("1");
            window.setTimeout(skoop.switchedToGeneralResults(),0);
        }, time);
    }
    if ($(this).prevAll().length + 1 == 2) {
        clearInterval(refreshIntervalId);
        refreshIntervalId = window.setInterval(function(){
        console.log("2");
        window.setTimeout(skoop.candidategenstat(), 0);
        },time);
    }
    if ($(this).prevAll().length + 1 == 3) {
        clearInterval(refreshIntervalId);
        refreshIntervalId = window.setInterval(function(){
        console.log("Refreshed");
        window.setTimeout(skoop.partystat(), 0);
        },time);
    }
    if ($(this).prevAll().length + 1 == 4) {
        clearInterval(refreshIntervalId);
        refreshIntervalId = window.setInterval(function(){
            console.log("3");
        window.setTimeout(skoop.candidateareastat(), 0);
        },time);
    }
    if ($(this).prevAll().length + 1 == 5) {
        clearInterval(refreshIntervalId);
        refreshIntervalId = window.setInterval(function(){
            console.log("4");
        window.setTimeout(skoop.partyareastat(), 0);
        },time);
    }
});
});

partyChanged = function () {
    $id = document.getElementById("party").value;
    angular.element(document.getElementById('party')).scope().partystat($id);
}

areaChanged = function () {
    $id = document.getElementById("area").value;
    angular.element(document.getElementById('area')).scope().partyareastat($id);
    $id = document.getElementById("candidatearea").value;
    angular.element(document.getElementById('candidatearea')).scope().candidateareastat($id);
}
/*

$(function () {
    'use strict';

    var line_chart_options = {
        scaleGridLineColor: "rgba(0,0,0,.05)",
        responsive: true
    };
    var Data = {
        labels: generateLabelsFromDB(),
        datasets: generateDataSetsFromDB()
    };

    var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };
    var ctx1 = $("#myChart1").get(0).getContext("2d");
    var myLineChart1 = new Chart(ctx1).Line(data, line_chart_options);

    var ctx2 = $("#myChart2").get(0).getContext("2d");
    var myLineChart2;

    var ctx3 = $("#myChart3").get(0).getContext("2d");
    var myLineChart3;

    var ctx4 = $("#myChart4").get(0).getContext("2d");
    var myLineChart4;

    ('#tab1').on('shown.bs.tab', function (e) {
        if (myLineChart2) {
            myLineChart2.destroy();
        }
        if (myLineChart3) {
            myLineChart3.destroy();
        }
        if (myLineChart4) {
            myLineChart4.destroy();
        }
        $
        myLineChart1 = new Chart(ctx1).Line(data, line_chart_options);
    });

    $('#tab2').on('shown.bs.tab', function (e) {
        if (myLineChart1) {
            myLineChart1.destroy();
        }
        if (myLineChart3) {
            myLineChart3.destroy();
        }
        if (myLineChart4) {
            myLineChart4.destroy();
        }
        myLineChart2 = new Chart(ctx2).Line(data, line_chart_options);
    });

    $('#tab3').on('shown.bs.tab', function (e) {
        if (myLineChart2) {
            myLineChart2.destroy();
        }
        if (myLineChart1) {
            myLineChart1.destroy();
        }
        if (myLineChart4) {
            myLineChart4.destroy();
        }
        myLineChart3 = new Chart(ctx3).Line(data, line_chart_options);
    });

    $('#tab4').on('shown.bs.tab', function (e) {
        if (myLineChart2) {
            myLineChart2.destroy();
        }
        if (myLineChart3) {
            myLineChart3.destroy();
        }
        if (myLineChart1) {
            myLineChart1.destroy();
        }
        myLineChart4 = new Chart(ctx4).Line(data, line_chart_options);
    });
});

function generateLabelsFromDB(arr)
{
    var labels = [];

    var rows = jQuery("tr");
    rows.each(function (index) {
        if (index != 0)  // we dont need first row of table
        {
            var cols = $(this).find("td");
            labels.push(cols.first().text());
        }
    });
    return labels;
}

function generateDataSetsFromDB(arr)
{
    var data;
    var datasets = [];
    var rows = jQuery("tr");
    rows.each(function (index) {
        if (index != 0) // we dont need first row of table
        {
            var cols = $(this).find("td");
            var data = [];
            cols.each(function (innerIndex) {
                if (innerIndex != 0) // we dont need first columns of the row                 
                    data.push($(this).text());
            });


            var dataset =
                    {
                        fillColor: colors[index % 3].fillColor,
                        strokeColor: colors[index % 3].strokeColor,
                        highlightFill: colors[index % 3].highlightFill,
                        highlightStroke: colors[index % 3].highlightStroke,
                        data: data
                    }

            datasets.push(dataset);

        }
    });
    return datasets;
}*/

$(".document").ready(function () {
    $('#tabs').tab('show');
});
// Javascript to enable link to tab
var hash = document.location.hash;
var prefix = "tab_";
if (hash) {
    hash = hash.replace(prefix, '');
    var hashPieces = hash.split('?');
    activeTab = $('.nav-tabs a[href=' + hashPieces[0] + ']');
    activeTab && activeTab.tab('show');
}

// Change hash for page-reload
$('.nav-tabs a').on('shown', function (e) {
    window.location.hash = e.target.hash.replace("#", "#" + prefix);
});
