/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    var today = new Date();
    var dayItems = '<option selected="selected" value="0">- Päev -</option>';
    var monthItems = '<option selected="selected" value="0">- Kuu -</option>';
    var yearItems = '<option selected="selected" value="0">- Aasta -</option>';

    for (var i = 1; i < 32; i++) {
        dayItems += "<option value='" + i + "'>" + i + "</option>";
    }
    for (var i = 1; i < 13; i++) {
        monthItems += "<option value='" + i + "'>" + i + "</option>";
    }
    for (var i = 1900; i < today.getFullYear(); i++) {
        yearItems += "<option value='" + i + "'>" + i + "</option>";
    }

    $("#daydropdown").html(dayItems);
    $("#monthdropdown").html(monthItems);
    $("#yeardropdown").html(yearItems);
});

$("#monthdropdown").change(function () {
    var value = $("#monthdropdown").val();
    var dayItems = '<option selected="selected" value="0">- Päev -</option>';
    if (value % 2 === 0 && value !== 2) {
        for (var i = 1; i < 31; i++) {
            dayItems += "<option value='" + i + "'>" + i + "</option>";
        }
    }
    else if(value === 2)
    {
        for (var i = 1; i < 30; i++) {
            dayItems += "<option value='" + i + "'>" + i + "</option>";
        }
    }
    else{
               for (var i = 1; i < 32; i++) {
            dayItems += "<option value='" + i + "'>" + i + "</option>";
        } 
    }
    
    $("#daydropdown").html(dayItems);
});