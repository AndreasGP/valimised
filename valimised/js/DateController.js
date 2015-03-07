$(document).ready(function () {
    var today = new Date();
    var yearItems = '<option selected="selected" value="0">- Aasta -</option>';

    for (var i = today.getFullYear() - 17; i >= 1900; i--) {
        yearItems += "<option value='" + i + "'>" + i + "</option>";
    }
    $("#yeardropdown").html(yearItems);
});

$('.selectpicker').selectpicker();


function onYearChange() {
    var month = $("#monthdropdown").val();
    if (isNaN(month) === false) {
        if (month == 2) {
            updateDay();
        }
    } else {
        //Months havent been initialized yet
        var monthItems = '<option selected="selected" value="0">- Kuu -</option>';
        for (var i = 1; i <= 12; i++) {
            monthItems += "<option value='" + i + "'>" + i + "</option>";
        }
        $("#monthdropdown").html(monthItems);
    }
    $('.selectpicker').selectpicker('refresh');
}
;

function onMonthChange() {
    updateDay();
    $('.selectpicker').selectpicker('refresh');
}
;

function updateDay() {
    console.log("Updating day");
    var month = $("#monthdropdown").val();
    var year = $("#yeardropdown").val();
    var dayItems = '<option selected="selected" value="0">- Päev -</option>';
    if (month == 2 && ((year % 4 == 0 && year % 100 != 0) || (year % 400 == 0)))
    {
        for (var i = 1; i < 30; i++) {
            dayItems += "<option value='" + i + "'>" + i + "</option>";
        }
    }
    else if (month == 2)
    {
        for (var i = 1; i < 29; i++) {
            dayItems += "<option value='" + i + "'>" + i + "</option>";
        }
    }
    else if ((month % 2 == 0) && (month != 2)) {
        for (var i = 1; i < 31; i++) {
            dayItems += "<option value='" + i + "'>" + i + "</option>";
        }
    }
    else {
        for (var i = 1; i < 32; i++) {
            dayItems += "<option value='" + i + "'>" + i + "</option>";
        }
    }

    $("#daydropdown").html(dayItems);
}
;