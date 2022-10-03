function personPicker(object, type, action) {
    var parents = $(object).parents(".personPicker_area");
    var count = parents.find(".personPicker_" + action + " .input-group").length;
    var FieldCount = 0;
    var FieldCountHide = 0;
    if (action == "adult") {
        FieldCount = 3;
        FieldCountHide = 2;
    } else if (action == "child") {
        FieldCount = 3;
        FieldCountHide = 2;
    }
    if (count <= FieldCount) {
        var html = '';
        switch (type) {
            case 'add':
                switch (action) {
                    case 'adult':
                        html += '<div class="input-group person-row-params">';
                        html += '<span class="input-group-addon personPicker_input_addon personPicker_input_count_addon">' + (parseInt(count) + 1) + '</span>';
                        html += '<select class="form-control person-type-food">';
                        html += '<option data-type-food="-FBT">3-разовое питание с лечением</option>';
                        html += '<option data-type-food="-HBT">2-разовое питание с лечением</option>';
                        html += '<option data-type-food="-FB">3-разовое питание без лечением</option>';
                        html += '<option data-type-food="-HB">2-разовое питание без лечением</option>';
                        html += '</select>';
                        html += '<span class="input-group-addon personPicker_input_addon">';
                        html += '<img src="/frontend/images/icons/close.png" class="personPicker_close" onclick="personPicker(this,\'close\',\'adult\')">';
                        html += '</span>';
                        html += '</div>';
                        break;
                    case 'child':
                        html += '<div class="input-group person-row-params">';
                        html += '<span class="input-group-addon personPicker_input_addon personPicker_input_count_addon">' + (parseInt(count) + 1) + '</span>';
                        html += '<select class="form-control person-type-food">';
                        html += '<option data-type-food="range-FBT">3-разовое питание с лечением </option>';
                        html += '<option data-type-food="range-FB">3-разовое питание без лечением</option>';
                        html += '<option data-type-food="range-HBT">-разовое питание с лечением</option>';
                        html += '<option data-type-food="range-HB">-разовое питание без лечением</option>';
                        html += '</select>';
                        html += '<div class="input-group-btn" style="min-width:100px;">';
                        html += '<select class="form-control person-age">';
                        html += '<option selected="selected" >Возраст</option>';
                        html += '<option>0</option>';
                        html += '<option>1</option>';
                        html += '<option>2</option>';
                        html += '<option>3</option>';
                        html += '<option>4</option>';
                        html += '<option>5</option>';
                        html += '<option>6</option>';
                        html += '<option>7</option>';
                        html += '<option>8</option>';
                        html += '<option>9</option>';
                        html += '<option>10</option>';
                        html += '<option>11</option>';
                        html += '<option>12</option>';
                        html += '<option>13</option>';
                        html += '<option>14</option>';
                        html += '<option>15</option>';
                        html += '<option>16</option>';
                        html += '<option>17</option>';
                        html += '</select>';
                        html += '</div>';
                        html += '<span class="input-group-addon personPicker_input_addon">';
                        html += '<img src="/frontend/images/icons/close.png" class="personPicker_close" onclick="personPicker(this,\'close\',\'child\')">';
                        html += '</span>';
                        html += '</div>';
                        break;
                }
                if (count == FieldCountHide) {
                    $(object).parent(".personPicker_adult_add_button").hide();
                }
                parents.find(".personPicker_" + action).append(html);
                break;
            case 'close':
                $(object).parents(".input-group").remove();
                parents.find(".personPicker_" + action + " .input-group").each(function (m) {
                    $(this).find(".personPicker_input_count_addon").html(parseInt(m) + 1);
                });
                if (count <= FieldCount) {
                    parents.find(".personPicker_adult_add_button").show();
                }
                break;
            case 'close_popup':
                $(".personPicker, .personPicker_blank").hide();
                $(".selectpicker").each(function () {
                    $(this).selectpicker("val", "");
                    $(this).selectpicker("refresh");
                });
                $(".navbar-fixed-top").css("z-index", "1000");
                break;
        }
    }
}

function personPickerRooms(object, type) {
    var personPickerCount = $(object).parents(".personPicker_count");
    var personPickerCount_size = $(object).parents(".personPicker_count").attr("class").replace('personPicker_count', '').trim();
    switch (personPickerCount_size) {
        case 'count1':
            if (type == "add") {
                personPickerCount.removeClass("count1").addClass("count2");
                personPickerCount.find(".personPicker_fields.col-md-6.hide").clone().appendTo($(object).parents(".personPicker_count").find(".personPickerNewRoom")).removeClass("hide").find(".personPickerRoomCount").html("2");
                personPickerCount.find(".personPicker_fields.col-md-6").removeClass("col-md-6").addClass("col-md-4");
                personPickerCount.find(".personPicker_room_add.col-md-6").removeClass("col-md-6").addClass("col-md-4");
            } else if (type == "remove") {
                $(object).parents(".personPicker_fields").remove();
                personPickerCount.find(".personPicker_fields:not('.hide')").each(function (m) {
                    $(this).find(".personPickerRoomCount").html(parseInt(m) + 1);
                });
            }
            break;
        case 'count2':
            if (type == "add") {
                personPickerCount.removeClass("count2").addClass("count3");
                personPickerCount.find(".personPicker_fields.col-md-4.hide").clone().appendTo($(object).parents(".personPicker_count").find(".personPickerNewRoom")).removeClass("hide").find(".personPickerRoomCount").html("3");
            } else if (type == "remove") {
                personPickerCount.removeClass("count2").addClass("count1");
                personPickerCount.find(".personPicker_room_add.col-md-4").removeClass("col-md-4").addClass("col-md-6");
                personPickerCount.find(".personPicker_fields.col-md-4").removeClass("col-md-4").addClass("col-md-6");
                $(object).parents(".personPicker_fields").remove();
                personPickerCount.find(".personPicker_fields:not('.hide')").each(function (m) {
                    $(this).find(".personPickerRoomCount").html(parseInt(m) + 1);
                });
            }
            break;
        case 'count3':
            if (type == "remove") {
                $(object).parents(".personPicker_fields").remove();
                personPickerCount.removeClass("count3").addClass("count2");
                if (personPickerCount.find(".personPicker_room_add").css("display") == "none") {
                    personPickerCount.find(".personPicker_room_add.col-md-4").show();
                    personPickerCount.find(".personPicker_fields:not('.hide')").each(function (m) {
                        $(this).find(".personPickerRoomCount").html(parseInt(m) + 1);
                    });
                } else {
                    personPickerCount.removeClass("count3").addClass("count2");
                    personPickerCount.find(".personPicker_fields:not('.hide')").each(function (m) {
                        $(this).find(".personPickerRoomCount").html(parseInt(m) + 1);
                    });
                }
            }
            break;
    }
    var room_counts = personPickerCount.find(".personPicker_fields:not('.hide')").length;
    if (room_counts > 2) {
        $(".addNewRoomPersonPicker").hide();
        $(".personPicker_room_add").hide();
    } else {
        $(".addNewRoomPersonPicker").show();
        $(".personPicker_room_add").show();
    }
}

function createPersonPickerParams(object) {
    var blockNameParams = $(object).parents('.personPicker').find(".name-params"),
        blocksRooms = $(object).parents(".personPicker").find(".room_one_area:not('.hide')"),
        blockPesron = $('.popup-person');
    rooms = [];
    blocksRooms.each(function () {
        var blocksPersonParams = $(this).find('.person-row-params'),
            room = [];
        blocksPersonParams.each(function () {
            var th = $(this),
                roomsObj = {},
                typeFoodSelect = th.find('.person-type-food'),
                typeFood = typeFoodSelect.find('option:checked').data('type-food'),
                age = th.find('.person-age').val();
            if (typeFoodSelect.is(':visible')) {
                roomsObj.typeFood = typeFood, roomsObj.age = (age === undefined) ? 'Adult' : age;
                room.push(roomsObj);
            }
        });
        rooms.push(room);
    });
    blockNameParams.empty();
    for (var keyRoom in rooms) {
        if (rooms[keyRoom]) {
            for (var params in rooms[keyRoom]) {
                var paramsObj = rooms[keyRoom][params];
                blockNameParams.append('<input type="hidden" name="lRooms[' + keyRoom + '][' + params + '][lAge]" value="' + paramsObj.age + '">');
                blockNameParams.append('<input type="hidden" name="lRooms[' + keyRoom + '][' + params + '][lTfd]" value="' + paramsObj.typeFood + '">');
            }
        }
    }
    var room_count = 0;
    var child_count = 0;
    var adult_count = 0;
    var returnVal = 0;
    $(object).parents(".personPicker").find(".room_one_area:not('.hide')").each(function (m) {
        room_count = (m + 1);
    });
    $(object).parents(".personPicker").find(".room_one_area:not('.hide') .personPicker_adult .person-row-params").each(function (m) {
        adult_count = (m + 1);
    });
    $(object).parents(".personPicker").find(".room_one_area:not('.hide') .personPicker_child .person-row-params").each(function (m) {
        child_count = (m + 1);
        var value = $(this).find(".person-age option:selected").text();
        if (value == "Возраст") {
            returnVal++;
            $(this).find(".person-age").css("border", "3px solid #FF3D22");
        } else {
            $(this).find(".person-age").css("border", "0");
        }
    });
    if (returnVal > 0) {
        return false;
    }
    var filterParams = $("#popup-person button");
    filterParams.html('<span> <span>Номеров <span style="">' + room_count + '</span> | Взрослых <span style="">' + adult_count + '</span> | Детей <span style="">' + child_count + '</span> </span> <br> <small class="new_small" style="font-size:14px;">Другие варианты</small> </span>');
    $.magnificPopup.close();
}

function createPersonPickerParamsExtra(object, type) {
    var blockNameParams = $('.personPicker .name-params'),
        filterParams = $("#popup-person button");
    blockNameParams.empty();
    if (type == "1") {
        filterParams.html('<span> <span>Номеров <span style=""><b>1</b></span> | Взрослых <span style=""><b>1</b></span> | Детей <span style=""><b>0</b></span> </span> <br> <small class="new_small" style="font-size:14px;"><b>3</b>-разовое питание с лечением</small> </span>');
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lAge]" value="Adult">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lTfd]" value="-FBT">');
    } else if (type == "2") {
        filterParams.html('<span> <span>Номеров <span style=""><b>1</b></span> | Взрослых <span style=""><b>2</b></span> | Детей <span style=""><b>0</b></span> </span> <br> <small class="new_small" style="font-size:14px;"><b>3</b>-разовое питание с лечением</small> </span>');
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lAge]" value="Adult">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lTfd]" value="-FBT">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][1][lAge]" value="Adult">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][1][lTfd]" value="-FBT">');
    } else if (type == "3") {
        filterParams.html('<span> <span>Номеров <span style=""><b>1</b></span> | Взрослых <span style=""><b>1</b></span> | Детей <span style=""><b>0</b></span> </span> <br> <small class="new_small" style="font-size:14px;"><b>2</b>-разовое питание с лечением</small> </span>');
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lAge]" value="Adult">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lTfd]" value="-HBT">');
    } else if (type == "4") {
        filterParams.html('<span> <span>Номеров <span style=""><b>1</b></span> | Взрослых <span style=""><b>2</b></span> | Детей <span style=""><b>0</b></span> </span> <br> <small class="new_small" style="font-size:14px;"><b>2</b>-разовое питание с лечением</small> </span>');
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lAge]" value="Adult">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lTfd]" value="-HBT">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][1][lAge]" value="Adult">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][1][lTfd]" value="-HBT">');
    }
}

function updateRoomsPersonDetail(object, roomNum, type, age, treatment) {
    var personPickerFields = $(object).find(".personPicker_fields:not('.hide'):eq(" + roomNum + ")");
    var html = '';
    var s = personPickerFields.find(".personPicker_" + type + " .person-row-params").length;
    var s_2 = s + 1;
    switch (type) {
        case 'adult':
            html += '<div class="input-group person-row-params">';
            html += '<span class="input-group-addon personPicker_input_addon personPicker_input_count_addon">' + s_2 + '</span>';
            html += '<select class="form-control person-type-food">';
            html += '<option data-type-food="-FBT"' + (treatment == "-FBT" ? "selected" : "") + '>3-разовое питание с лечением </option>';
            html += '<option data-type-food="-HBT"' + (treatment == "-HBT" ? "selected" : "") + '>-разовое питание с лечением</option>';
            html += '<option data-type-food="-FB"' + (treatment == "-FB" ? "selected" : "") + '>3-разовое питание без лечением </option>';
            html += '<option data-type-food="-HB"' + (treatment == "-HB" ? "selected" : "") + '>-разовое питание без лечением</option>';
            html += '</select>';
            html += '<span class="input-group-addon personPicker_input_addon">';
            html += '<img src="/frontend/images/icons/close.png" class="personPicker_close" onclick="personPicker(this,\'close\',\'adult\')">';
            html += '</span>';
            html += '</div>';
            if (s > 2) {
                personPickerFields.find(".personPicker_" + type).parents(".personPicker_area").find(".personPicker_adult_add_button").hide();
            }
            break;
        case 'child':
            html += '<div class="input-group person-row-params">';
            html += '<span class="input-group-addon personPicker_input_addon personPicker_input_count_addon">' + s_2 + '</span>';
            html += '<select class="form-control person-type-food">';
            html += '<option data-type-food="range-FBT"' + (treatment == "range-FBT" ? "selected" : "") + '>3-разовое питание с лечением </option>';
            html += '<option data-type-food="range-FB"' + (treatment == "range-FB" ? "selected" : "") + '>3-разовое питание без лечением</option>';
            html += '<option data-type-food="range-HBT"' + (treatment == "range-HBT" ? "selected" : "") + '>-разовое питание с лечением</option>';
            html += '<option data-type-food="range-HB"' + (treatment == "range-HB" ? "selected" : "") + '>-разовое питание без лечением</option>';
            html += '</select>';
            html += '<div class="input-group-btn" style="min-width:100px;">';
            html += '<select class="form-control person-age">';
            html += '<option ' + (age == "" ? "selected" : "") + '>Возраст</option>';
            html += '<option ' + (age == "0" ? "selected" : "") + '>0</option>';
            html += '<option ' + (age == "1" ? "selected" : "") + '>1</option>';
            html += '<option ' + (age == "2" ? "selected" : "") + '>2</option>';
            html += '<option ' + (age == "3" ? "selected" : "") + '>3</option>';
            html += '<option ' + (age == "4" ? "selected" : "") + '>4</option>';
            html += '<option ' + (age == "5" ? "selected" : "") + '>5</option>';
            html += '<option ' + (age == "6" ? "selected" : "") + '>6</option>';
            html += '<option ' + (age == "7" ? "selected" : "") + '>7</option>';
            html += '<option ' + (age == "8" ? "selected" : "") + '>8</option>';
            html += '<option ' + (age == "9" ? "selected" : "") + '>9</option>';
            html += '<option ' + (age == "10" ? "selected" : "") + '>10</option>';
            html += '<option ' + (age == "11" ? "selected" : "") + '>11</option>';
            html += '<option ' + (age == "12" ? "selected" : "") + '>12</option>';
            html += '<option ' + (age == "13" ? "selected" : "") + '>13</option>';
            html += '<option ' + (age == "14" ? "selected" : "") + '>14</option>';
            html += '<option ' + (age == "15" ? "selected" : "") + '>15</option>';
            html += '<option ' + (age == "16" ? "selected" : "") + '>16</option>';
            html += '<option ' + (age == "17" ? "selected" : "") + '>17</option>';
            html += '</select>';
            html += '</div>';
            html += '<span class="input-group-addon personPicker_input_addon">';
            html += '<img src="/frontend/images/icons/close.png" class="personPicker_close" onclick="personPicker(this,\'close\',\'child\')">';
            html += '</span>';
            html += '</div>';
            if (s > 2) {
                personPickerFields.find(".personPicker_" + type).parents(".personPicker_area").find(".personPicker_adult_add_button").hide();
            }
            break;
    }
    if (s <= 3) {
        if (type == "adult") {
            var types = personPickerFields.find(".personPicker_" + type + " .person-row-params .person-type-food").attr("data-action");
            if (types != 1) {
                personPickerFields.find(".personPicker_" + type + " .person-row-params .person-type-food").attr("data-action", "1").find("option[data-type-food = '" + treatment + "']").prop("selected", true);
            } else {
                personPickerFields.find(".personPicker_" + type).append(html);
            }
        } else {
            personPickerFields.find(".personPicker_" + type).append(html);
        }
    }
}