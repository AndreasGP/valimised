/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    var today = new Date();
    var yearItems = '<option selected="selected" value="0">- Aasta -</option>';

    for (var i = 1900; i < today.getFullYear(); i++) {
        yearItems += "<option value='" + i + "'>" + i + "</option>";
    }
    $("#yeardropdown").html(yearItems);
});
var changed = false;
function yearchange() {
    if (!changed) {
        var monthItems = '<option selected="selected" value="0">- Kuu -</option>';
        for (var i = 1; i < 13; i++) {
            monthItems += "<option value='" + i + "'>" + i + "</option>";
        }
        changed = true;
        $("#monthdropdown").html(monthItems);
    }
    else{
        monthchange();
    }
}
;

function monthchange() {
    var value = $("#monthdropdown").val();
    var year = $("#yeardropdown").val();
    var dayItems = '<option selected="selected" value="0">- Päev -</option>';
    if (value == 2 && ((year % 4 == 0 && year % 100 != 0) || (year % 400 == 0)))
    {
        for (var i = 1; i < 30; i++) {
            dayItems += "<option value='" + i + "'>" + i + "</option>";
        }
    }
    else if (value == 2)
    {
        for (var i = 1; i < 29; i++) {
            dayItems += "<option value='" + i + "'>" + i + "</option>";
        }
    }
    else if ((value % 2 == 0) && (value != 2)) {
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