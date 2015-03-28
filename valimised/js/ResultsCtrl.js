$(function () {
    'use strict';

    var line_chart_options = {
        scaleGridLineColor: "rgba(0,0,0,.05)",
        responsive: true
    };

    $http.get('../tulemused/getStat').success(function (data) {
        
    }).error(function (data, status, headers, config) {
        console.log("Fail!");
    });

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

    $('#tab1').on('shown.bs.tab', function (e) {
        if (myLineChart2) {
            myLineChart2.destroy();
        }
        if (myLineChart3) {
            myLineChart3.destroy();
        }
        if (myLineChart4) {
            myLineChart4.destroy();
        }
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
        myLineChart2 = new Chart(ctx2).Line(Data, line_chart_options);
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

function generateLabelsFromDB()
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

function generateDataSetsFromDB()
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
}