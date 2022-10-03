function show_more(object, type, action) {
    if (action == "show") {
        $("." + type).find("li").show();
        $(object).attr("onclick", "show_more(this,'" + type + "','close')").text("Показать меньше").removeClass("sh_all").addClass("sh_close");
    } else if (action == "close") {
        $("." + type).find("li:not(:lt(5))").hide();
        $(object).attr("onclick", "show_more(this,'" + type + "','show')").text("Показать все").removeClass("sh_close").addClass("sh_all");
    }
}

function scroll_menu(object, type) {
    $("html, body").stop().animate({
        scrollTop: $('#' + type).offset().top - 100
    }, 1000);
}

function show_izmenit(object, type) {
    if (type == "show") {
        $(".izmenit_level").hide();
        $(".izmenit_level_block").show();
        $(".izmenit_level_block_2").hide();
    } else if (type == "hide") {
        $(".izmenit_level").show();
        $(".izmenit_level_block").hide();
        $(".izmenit_level_block_2").hide();
        $(".pokazat_show").css("opacity", "1");
    }
}

function show_menu(arg, type, action) {
    $("#navbar-third a").removeClass("active");
    var has_class = $(arg).hasClass("active");
    if (has_class == false) {
        $(".main_menu_es").removeClass("active");
        $(arg).addClass("active");
        if (type == "correctly") {
            $(".main_cat").hide();
            $(".main_cat#menu-" + action).show();
        }
    } else {
        $(arg).removeClass("active");
        $(".main_cat").hide();
    }
}

function show_page(arg, id) {
    $(".main_cat").find("li").removeClass("active");
    $(arg).addClass("active");
    var sanat_name = $(arg).text();
    $("[class*='sanat_content_']").hide();
    $(".sanat_content_" + id).show();
    $(".sanat_content_" + id + " .sanat_name").find("span").text(sanat_name);
}

function show_pokazat(object, type) {
    $(object).css("opacity", "0");
    $(".izmenit_level_block_2").show();
}

function show_mode(object, type) {
    if (type == "show") {
        $(".shower_mode").hide();
        $(".hidden_mode").show();
    } else if (type == "hide") {
        $(".hidden_mode").hide();
        $(".shower_mode").show();
    }
}

function show_level_tab(object) {
    var data_id = $(object).index();
    $(".level_tab").find("a").removeClass("active");
    $(object).addClass("active");
    $(".beat_version_append_area").find(".level_tab_selection").hide();
    $(".beat_version_append_area").find(".level_tab_selection:eq(" + data_id + ")").show();
}

function show_question(arg) {
    var has_class = $(arg).hasClass("active");
    if (has_class == false) {
        $(arg).addClass("active");
        $(arg).parent(".question_area").find(".question_answer").stop().slideDown();
    } else if (has_class == true) {
        $(arg).removeClass("active");
        $(arg).parent(".question_area").find(".question_answer").stop().slideUp();
    }
}

function back_transfer(arg) {
    if ($(arg).is(':checked')) $(".back_transfer").show();
    else
        $(".back_transfer").hide();
}
$('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    tClose: 'Закрыть (Esc)',
    tLoading: 'Выполняется загрузка...',
    image: {
        verticalFit: true,
        titleSrc: function(item) {}
    },
    gallery: {
        enabled: true,
        arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
        tPrev: 'Предыдущий',
        tNext: 'Следующий',
        tCounter: '%curr% до %total%'
    },
    callbacks: {
        buildControls: function() {
            this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
        }
    }
});
$('.about_video').magnificPopup({
    disableOn: 0,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    tClose: 'Закрыть (Esc)',
    tLoading: 'Выполняется загрузка...',
    fixedContentPos: false
});

function additional_search(object, type) {
    switch (type) {
        case "adult":
            var count = $(object).find("option:selected").attr("data-id");
            var html = '<div class="col-md-12 new_added_ad person-row-params" style="padding-left: 0;">';
            html += '<div class="col-md-8 col-md-offset-2">';
            html += '<div class="form-group" style="margin: 2px 0px;">';
            html += '<div class="input-group">';
            html += '<div class="input-group-addon"></div>';
            html += '<select class="form-control person-type-food" style="border:1px solid #dedede;">';
            html += '<option selected="selected" data-type-food="FBT">3-разовое питание с личением</option>';
            html += '<option data-type-food="HBT">2-x разовое питание с личением</option>';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $(object).parents(".level_tab_selection_extra").find(".additional_search_adult_add_area").empty();
            for (var i = 1; i < count; i++) {
                var adult_counter = i + 1;
                $(object).parents(".level_tab_selection_extra").find(".additional_search_adult_add_area").append(html);
                $(object).parents(".level_tab_selection_extra").find(".additional_search_adult_add_area .new_added_ad:nth-child(" + i + ") .input-group-addon").html(adult_counter + " взрослый");
            }
            break;
        case "child":
            var count = $(object).find("option:selected").attr("data-id");
            if (count == "0") {
                $(object).parents(".level_tab_selection_extra").find(".additional_search_child_add_area").empty();
                $(object).parents(".level_tab_selection_extra").find(".alternate_child").hide();
            } else if (count == "1") {
                $(object).parents(".level_tab_selection_extra").find(".additional_search_child_add_area").empty();
                $(object).parents(".level_tab_selection_extra").find(".alternate_child").show();
            } else {
                var html = '<div class="col-md-12 new_added_ad person-row-params" style="padding-left: 0;">';
                html += '<div class="col-md-8 col-md-offset-2">';
                html += '<div class="form-group" style="margin: 2px 0px;">';
                html += '<div class="input-group">';
                html += '<div class="input-group-addon"></div>';
                html += '<select class="form-control person-type-food" style="border:1px solid #dedede;">';
                html += '<option selected="selected" data-type-food="FBT">3-разовое питание с личением</option>';
                html += '<option data-type-food="FB">3-разовое питание без лечения</option>';
                html += '<option data-type-food="HBT">2-x разовое питание с личением</option>';
                html += '<option data-type-food="HB">2-разовое питание без лечения</option>';
                html += '</select>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-2">';
                html += '<div class="form-group" style="margin: 2px 0px;">';
                html += '<select class="form-control person-age" style="border:1px solid #dedede;">';
                html += '<option selected="selected">0</option>';
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
                html += '</div>';
                html += '</div>';
                $(object).parents(".level_tab_selection_extra").find(".alternate_child").show();
                $(object).parents(".level_tab_selection_extra").find(".additional_search_child_add_area").empty();
                for (var i = 1; i < count; i++) {
                    var child_counter = i + 1;
                    $(object).parents(".level_tab_selection_extra").find(".additional_search_child_add_area").append(html);
                    $(object).parents(".level_tab_selection_extra").find(".additional_search_child_add_area .new_added_ad:nth-child(" + i + ") .input-group-addon").html(child_counter + " детей");
                }
            }
            break;
        default:
            console.log("not Found this aciton");
    }
}

function add_new_room(object) {
    var popover_other_room = $(".popover");
    var room_one_area = $(".room_one_area");
    var other_room_area = $(".other_room_area");
    var room_one_area2 = $(".room_one_area2");
    var other_room_count = $(".popover .other_room_area").find(".room_one_area2").length;
    // console.log(other_room_count);
    var room_name = other_room_count + 2;
    if (other_room_count < 3) {
        var html = '<div class="room_one_area2" style="border-top:1px solid #bebebe;margin:10px 0px;">';
        html += '<div class="row level_tab_selection_extra person-row-params">';
        html += '<div class="col-md-6 text-left" style="margin: 5px 0px 0px 0px;">';
        html += '<label class="main-color-link">Номер ' + room_name + '</label>';
        html += '</div>';
        html += '<div class="col-md-6 text-right" style="margin: 5px 0px 0px 0px;">';
        html += '<a href="javascript:void(0);" onclick="remove_addinational_room(this);"><b>Удалить номер</b></a>';
        html += '</div>';
        html += '<div class="col-md-12" style="padding-left: 0;">';
        html += '<div class="col-md-2">';
        html += '<div class="form-group" style="margin: 2px 0px;">';
        html += '<span class="main-color-3">Взрослые</span>';
        html += '<select class="form-control adult_count" style="border:1px solid #dedede;" onchange="additional_search(this,\'adult\');">';
        html += '<option data-id="1" selected="selected">1</option>';
        html += '<option data-id="2">2</option>';
        html += '<option data-id="3">3</option>';
        html += '<option data-id="4">4</option>';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-8">';
        html += '<div class="form-group profile-f" style="margin: 2px 0px;">';
        html += '<span class="main-color-3">Тип поселения</span>';
        html += '<div class="input-group">';
        html += '<div class="input-group-addon">1 взрослый</div>';
        html += '<select class="form-control person-type-food" style="border:1px solid #dedede;">';
        html += '<option selected="selected" data-type-food="FBT">3-разовое питание с лечением</option>';
        html += '<option data-type-food="HBT">2-разовое питание с лечением</option>';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '<div class="additional_search_adult_add_area">';
        html += '</div>';
        html += '</div>';
        html += '<div class="row level_tab_selection_extra" style="margin-top: 15px;">';
        html += '<div class="col-md-12 person-row-params" style="padding-left: 0;">';
        html += '<div class="col-md-2">';
        html += '<div class="form-group" style="margin: 2px 0px;">';
        html += '<span class="main-color-3">Дети</span>';
        html += '<select class="form-control child_count" style="border:1px solid #dedede;" onchange="additional_search(this,\'child\');">';
        html += '<option data-id="0" selected="selected">0</option>';
        html += '<option data-id="1">1</option>';
        html += '<option data-id="2">2</option>';
        html += '<option data-id="3">3</option>';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-8 alternate_child">';
        html += '<div class="form-group profile-f" style="margin: 2px 0px;">';
        html += '<span class="main-color-3">Тип поселения</span>';
        html += '<div class="input-group">';
        html += '<div class="input-group-addon">1 детей</div>';
        html += '<select class="form-control person-type-food" style="border:1px solid #dedede;">';
        html += '<option selected="selected" data-type-food="FBT">3-разовое питание с лечением</option>';
        html += '<option data-type-food="FB">3-разовое питание без лечением</option>';
        html += '<option data-type-food="HBT">2-разовое питание с лечением</option>';
        html += '<option data-type-food="HB">2-разовое питание без лечением</option>';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-2 alternate_child">';
        html += '<span class="main-color-3">Возваст</span>';
        html += '<div class="form-group" style="margin: 2px 0px;">';
        html += '<select class="form-control person-age" style="border:1px solid #dedede;">';
        html += '<option selected="selected">0</option>';
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
        html += '</div>';
        html += '</div>';
        html += '<div class="additional_search_child_add_area">';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $(".popover").find(other_room_area).append(html);
        if (other_room_count == 2) {
            $(".room_add_button").hide();
        }
    } else {
        console.log("not added. Max room count four.");
    }
}

function remove_addinational_room(object) {
    var other_room_count = $(".popover .other_room_area").find(".room_one_area2").length;
    if (other_room_count < 4) {
        $(".room_add_button").show();
    }
    $(object).parents(".room_one_area2").remove();
}

function close_addinational_search(object, type) {
    $('.popover_new').popover('destroy');
    if (type == "addinational") {
        $(".selectpicker").each(function() {
            $(this).selectpicker("val", "");
            $(this).selectpicker("refresh");
        })
    }
    $(".popover").find(".other_room_area").empty();
    $(".room_add_button").show();
}

function additional_search_confirm(object) {
    var other_room_adult_count = 0;
    var other_room_child_count = 0;
    var other_room_counts = $(".popover .other_room_area").find(".room_one_area2").length;
    var one_room_adult_count = $(".popover .room_one_area").find(".adult_count option:selected").attr("data-id");
    var one_room_child_count = $(".popover .room_one_area").find(".child_count option:selected").attr("data-id");
    $(".popover .other_room_area").find(".room_one_area2").each(function() {
        var other_room_adult_count_stepByStep = $(this).find(".adult_count option:selected").attr("data-id");
        other_room_adult_count = other_room_adult_count + parseInt(other_room_adult_count_stepByStep);
    });
    $(".popover .other_room_area").find(".room_one_area2").each(function() {
        var other_room_child_count_stepByStep = $(this).find(".child_count option:selected").attr("data-id");
        other_room_child_count = other_room_child_count + parseInt(other_room_child_count_stepByStep);
    });
    var all_adult_count = parseInt(one_room_adult_count) + parseInt(other_room_adult_count);
    var all_child_count = parseInt(one_room_child_count) + parseInt(other_room_child_count);
    var all_room_count = 1 + parseInt(other_room_counts);
    $(".selectpicker2").html('<option data-type="0" data-content="<label class=\'new_label\'>Номеров 1 | Взрослых 2 | Детей 0</label><br><small class=\'new_small\'>3-разовое питание с лечением</small>"></option><option data-type="1" data-content="<label class=\'new_label\'>Номеров 1 | Взрослых 1 | Детей 0</label><br><small class=\'new_small\'>3-разовое питание с лечением</small>"></option><option data-type="2" data-content="<label class=\'new_label\'>Другие варианты</label>"></option><option selected="selected" data-type="3" style="display:none;" data-content="<label class=\'new_label\'>Номеров ' + all_room_count + ' | Взрослых ' + all_adult_count + ' | Детей ' + all_child_count + '</label><br><small class=\'new_small\'>Другие варианты</small>"></option>').selectpicker('refresh');
    createNameParams();
    $('.popover_new').popover('destroy');
    $(".room_add_button").show();
}

function createNameParams() {
    var blockNameParams = $('#popover-content .name-params'),
        blocksRooms = $('#popup-person .room_one_area, #popup-person .room_one_area2'),
        blockPesron = $('popup-person');
    rooms = [];
    blocksRooms.each(function() {
        var blocksPersonParams = $(this).find('.person-row-params'),
            room = [];
        blocksPersonParams.each(function() {
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
    // console.log(rooms);
    for (var keyRoom in rooms) {
        if (rooms[keyRoom]) {
            for (var params in rooms[keyRoom]) {
                var paramsObj = rooms[keyRoom][params];
                blockNameParams.append('<input type="hidden" name="lRooms[' + keyRoom + '][' + params + '][lAge]" value="' + paramsObj.age + '">');
                blockNameParams.append('<input type="hidden" name="lRooms[' + keyRoom + '][' + params + '][lTfd]" value="' + paramsObj.typeFood + '">');
            }
        }
    }
}

function createNameParams_2(object, type) {
    var blockNameParams = $('#popover-content .name-params');
    blockNameParams.empty();
    if (type == "1") {
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lAge]" value="Adult">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lTfd]" value="FBT">');
    } else if (type == "2") {
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lAge]" value="Adult">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][0][lTfd]" value="FBT">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][1][lAge]" value="Adult">');
        blockNameParams.append('<input type="hidden" name="lRooms[0][1][lTfd]" value="FBT">');
    }
}

function update_params_selectpicker() {
    var blockNameParams = $('#popover-content .name-params:eq(0)');
    var room_count = 0;
    var adult_count = 0;
    var child_count = 0;
    for (i = 0; i < 4; i++) {
        if (blockNameParams.find("input[name*='lRooms[" + i + "]']").val() == "Adult") {
            room_count++;
        }
    }
    blockNameParams.find("input[name*='lRooms']").each(function(m) {
        if ($(this).val() == "Adult") {
            adult_count++;
        } else {
            var value_child = $(this).val();
            value_child = parseInt(value_child)
            if (value_child < 19) {
                child_count++;
            }
        }
    })
    var text_selecpicker = "3-разовое питание с лечением";
    $(".selectpicker2").html('<option data-type="0" data-content="<label class=\'new_label\'>Номеров 1 | Взрослых 2 | Детей 0</label><br><small class=\'new_small\'>3-разовое питание с лечением</small>"></option><option data-type="1" data-content="<label class=\'new_label\'>Номеров 1 | Взрослых 1 | Детей 0</label><br><small class=\'new_small\'>3-разовое питание с лечением</small>"></option><option data-type="2" data-content="<label class=\'new_label\'>Другие варианты</label>"></option><option selected="selected" data-type="3" style="display:none;" data-content="<label class=\'new_label\'>Номеров ' + room_count + ' | Взрослых ' + adult_count + ' | Детей ' + child_count + '</label><br><small class=\'new_small\'>' + text_selecpicker + '</small>"></option>').selectpicker('refresh');
}

function change_search(object, name) {
    switch (name) {
        case "adult":
            var count = $(object).find("option:selected").attr("data-id");
            var html = '<div class="col-md-6 col-md-offset-2">';
            html += '<div class="form-group">';
            html += '<select class="form-control">';
            html += '<option selected="selected" data-type-food="FBT">3-разовое питание с личением</option>';
            html += '<option data-type-food="HBT">2-x разовое питание с личением</option>';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            $(object).parents(".level_tab_selection").find(".add_adult_search").empty();
            for (var i = 1; i < count; i++) {
                $(object).parents(".level_tab_selection").find(".add_adult_search").append(html);
            }
            break;
        case "adult2":
            var count = $(object).find("option:selected").attr("data-id");
            var html = '<div class="col-md-6 col-md-offset-2">';
            html += '<div class="form-group">';
            html += '<select class="form-control">';
            html += '<option selected="selected" data-type-food="FBT">3-разовое питание с личением</option>';
            html += '<option data-type-food="HBT">2-разовое питание с личением</option>';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-4 cure_area">';
            html += '<div class="form-group">';
            html += '<select class="form-control">';
            html += '<option selected="selected">Лечения 1</option>';
            html += '<option>Лечения 2</option>';
            html += '<option>Лечения 3</option>';
            html += '<option>Лечения 4</option>';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            $(object).parents(".level_tab_selection").find(".add_adult_search").empty();
            for (var i = 1; i < count; i++) {
                $(object).parents(".level_tab_selection").find(".add_adult_search").append(html);
            }
            break;
        case "child":
            var count = $(object).find("option:selected").attr("data-id");
            if (count == "0") {
                $(object).parents(".level_tab_selection").find(".add_child_search").empty();
                $(object).parents(".level_tab_selection").find(".alternate_child").hide();
            } else if (count == "1") {
                $(object).parents(".level_tab_selection").find(".add_child_search").empty();
                $(object).parents(".level_tab_selection").find(".alternate_child").show();
            } else {
                var html = '<div class="col-md-6 col-md-offset-2">';
                html += '<div class="form-group">';
                html += '<select class="form-control">';
                html += '<option selected="selected" data-type-food="FBT">3-разовое питание с личением</option>';
                html += '<option data-type-food="FB">3-разовое питание без лечения</option>';
                html += '<option data-type-food="HBT">2-разовое питание с личением</option>';
                html += '<option data-type-food="HB">2-разовое питание без лечения</option>';
                html += '</select>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-2">';
                html += '<div class="form-group">';
                html += '<select class="form-control person-age">';
                html += '<option selected="selected">0</option>';
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
                html += '</div>';
                $(object).parents(".level_tab_selection").find(".alternate_child").show();
                $(object).parents(".level_tab_selection").find(".add_child_search").empty();
                for (var i = 1; i < count; i++) {
                    $(object).parents(".level_tab_selection").find(".add_child_search").append(html);
                }
            }
            break;
        default:
            alert("Not found");
    }
}

function search_type(object) {
    var type = $(object).find("option:selected").attr("data-type");
    var beta_version = $(".beta_version");
    var level_tab_area = $(".level_tab");
    var izmenit_level = $(".izmenit_level_block_2");
    var search_type_hidden = $(".search_type_hidden");
    var child_area = $(".child_area");
    var level_tab_selection = $(".level_tab_selection");
    switch (type) {
        case "1-1":
            izmenit_level.hide();
            search_type_hidden.show();
            break;
        case "2-1":
            $(".beat_version_append_area").empty();
            var result_beta_version = beta_version.clone().appendTo(".beat_version_append_area");
            result_beta_version.removeClass("beta_version").show();
            result_beta_version.find(".izmenit_level_block_2").show();
            izmenit_level.hide();
            search_type_hidden.hide();
            result_beta_version.find(".child_area").hide();
            result_beta_version.find(".level_tab").empty().append('<a href="javascript:void(0);" class="active" onclick="show_level_tab(this);">Номер 1</a>');
            result_beta_version.find(".adult_count").prop("disabled", true);
            result_beta_version.find(".adult_count").find("option[data-id=2]").attr('selected', 'selected');
            change_search(result_beta_version.find(".adult_count"), 'adult');
            break;
        case "2-1-extra":
            $(".beat_version_append_area").empty();
            var result_beta_version = beta_version.clone().appendTo(".beat_version_append_area");
            result_beta_version.removeClass("beta_version").show();
            result_beta_version.find(".izmenit_level_block_2").show();
            izmenit_level.hide();
            search_type_hidden.hide();
            result_beta_version.find(".child_area").hide();
            result_beta_version.find(".level_tab").empty().append('<a href="javascript:void(0);" class="active" onclick="show_level_tab(this);">Номер 1</a>');
            result_beta_version.find(".adult_count").prop("disabled", true);
            result_beta_version.find(".adult_count").find("option[data-id=2]").attr('selected', 'selected');
            change_search(result_beta_version.find(".adult_count"), 'adult2');
            break;
        case "2-2":
            $(".beat_version_append_area").empty();
            var result_beta_version = beta_version.clone().appendTo(".beat_version_append_area");
            result_beta_version.removeClass("beta_version").show();
            result_beta_version.find(".izmenit_level_block_2").show();
            izmenit_level.hide();
            search_type_hidden.hide();
            result_beta_version.find(".child_area").hide();
            result_beta_version.find(".level_tab").empty();
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" class="active" onclick="show_level_tab(this);">Номер 1</a>');
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" onclick="show_level_tab(this);">Номер 2</a>');
            result_beta_version.find(".adult_count").prop("disabled", true);
            result_beta_version.find(".adult_count").find("option[data-id=1]").attr('selected', 'selected');
            change_search(result_beta_version.find(".adult_count"), 'adult');
            var level_tab_selection_append = level_tab_selection.clone().appendTo(".beat_version_append_area .izmenit_level_block_2");
            level_tab_selection_append.hide();
            level_tab_selection_append.find(".child_area").hide();
            level_tab_selection_append.find(".adult_count").prop("disabled", true);
            level_tab_selection_append.find(".adult_count").find("option[data-id=1]").attr('selected', 'selected');
            change_search(level_tab_selection_append.find(".adult_count"), 'adult');
            break;
        case "1":
            $(".beat_version_append_area").empty();
            var result_beta_version = beta_version.clone().appendTo(".beat_version_append_area");
            result_beta_version.removeClass("beta_version").show();
            result_beta_version.find(".izmenit_level_block_2").show();
            izmenit_level.hide();
            search_type_hidden.hide();
            result_beta_version.find(".level_tab").empty().append('<a href="javascript:void(0);" class="active" onclick="show_level_tab(this);">Номер 1</a>');
            break;
        case "2":
            $(".beat_version_append_area").empty();
            var result_beta_version = beta_version.clone().appendTo(".beat_version_append_area");
            result_beta_version.removeClass("beta_version").show();
            result_beta_version.find(".izmenit_level_block_2").show();
            izmenit_level.hide();
            search_type_hidden.hide();
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" class="active" onclick="show_level_tab(this);">Номер 1</a>');
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" onclick="show_level_tab(this);">Номер 2</a>');
            for (var i = 1; i < type; i++) {
                var level_tab_selection_append = level_tab_selection.clone().appendTo(".beat_version_append_area .izmenit_level_block_2");
                level_tab_selection_append.hide();
            }
            break;
        case "3":
            $(".beat_version_append_area").empty();
            var result_beta_version = beta_version.clone().appendTo(".beat_version_append_area");
            result_beta_version.removeClass("beta_version").show();
            result_beta_version.find(".izmenit_level_block_2").show();
            izmenit_level.hide();
            search_type_hidden.hide();
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" class="active" onclick="show_level_tab(this);">Номер 1</a>');
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" onclick="show_level_tab(this);">Номер 2</a>');
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" onclick="show_level_tab(this);">Номер 3</a>');
            for (var i = 1; i < type; i++) {
                var level_tab_selection_append = level_tab_selection.clone().appendTo(".beat_version_append_area .izmenit_level_block_2");
                level_tab_selection_append.hide();
            }
            break;
        case "4":
            $(".beat_version_append_area").empty();
            var result_beta_version = beta_version.clone().appendTo(".beat_version_append_area");
            result_beta_version.removeClass("beta_version").show();
            result_beta_version.find(".izmenit_level_block_2").show();
            izmenit_level.hide();
            search_type_hidden.hide();
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" class="active" onclick="show_level_tab(this);">Номер 1</a>');
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" onclick="show_level_tab(this);">Номер 2</a>');
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" onclick="show_level_tab(this);">Номер 3</a>');
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" onclick="show_level_tab(this);">Номер 4</a>');
            for (var i = 1; i < type; i++) {
                var level_tab_selection_append = level_tab_selection.clone().appendTo(".beat_version_append_area .izmenit_level_block_2");
                level_tab_selection_append.hide();
            }
            break;
        case "5":
            $(".beat_version_append_area").empty();
            var result_beta_version = beta_version.clone().appendTo(".beat_version_append_area");
            result_beta_version.removeClass("beta_version").show();
            result_beta_version.find(".izmenit_level_block_2").show();
            izmenit_level.hide();
            search_type_hidden.hide();
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" class="active" onclick="show_level_tab(this);">Номер 1</a>');
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" onclick="show_level_tab(this);">Номер 2</a>');
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" onclick="show_level_tab(this);">Номер 3</a>');
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" onclick="show_level_tab(this);">Номер 4</a>');
            result_beta_version.find(".level_tab").append('<a href="javascript:void(0);" onclick="show_level_tab(this);">Номер 5</a>');
            for (var i = 1; i < type; i++) {
                var level_tab_selection_append = level_tab_selection.clone().appendTo(".beat_version_append_area .izmenit_level_block_2");
                level_tab_selection_append.hide();
            }
            break;
        default:
            alert("not found");
    }
}

function gup(name, url) {
    if (!url) url = location.href;
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(url);
    return results == null ? null : results[1];
}
$('.simple-ajax-popup-align-top').magnificPopup({
    type: 'ajax',
    alignTop: true,
    overflowY: 'scroll',
    callbacks: {
        ajaxContentAdded: function() {
            var magnificPopup = $.magnificPopup.instance,
                cur = magnificPopup.st.el;
            var test = gup('id', cur.attr('href'));
            $(".leceniya").find("." + test).each(function() {
                $(this).show();
            });
            $("[data-id='" + test + "']").addClass("active");
            var count = 0;
            $(".leceniya").find(".other_images img").each(function() {
                var hasClass = $(this).hasClass("active");
                if (hasClass == true) {
                    var index = $(this).index() + 1;
                    $(".count").find(".selected_count").text(index);
                }
                count = count + 1;
                $(".count").find(".full_count").text(count);
            });
        }
    }
});

function leceniya_change(object) {
    var test = $(object).attr("data-id");
    $("[class*='lec-']").hide();
    $("[data-id*='lec-']").removeClass("active");
    $(".leceniya").find("." + test).each(function() {
        $(this).show();
    });
    $("[data-id='" + test + "']").addClass("active");
    $(".leceniya").find(".other_images img").each(function() {
        var hasClass = $(this).hasClass("active");
        if (hasClass == true) {
            var index = $(this).index() + 1;
            $(".count").find(".selected_count").text(index);
        }
    });
}

function change_child(object) {
    var child_count = $(object).find("option:selected").attr("data-type");
    var childs = $(".child_count");
    if (child_count != 0) {
        var html = '<select class="" style="width: 30%; display: inline;margin:0px 2px 2px 0px;">';
        html += '<option data-number="0" selected="selected">0</option>';
        for (var i = 1; i < 17; i++) {
            html += '<option data-number="' + i + '">' + i + '</option>';
        }
        html += '</select>';
        childs.removeClass("display_none");
        childs.find(".childs").empty();
        for (var i = 0; i < child_count; i++) {
            childs.find(".childs").append(html);
        }
    } else {
        childs.addClass("display_none");
    }
}

function addToRoomPersons(object, type, place) {
    switch (place) {
        case "first":
            $("[class*='add__']").slideDown();
            $("[class*='adding__']").slideUp();
            $(".add__" + type).slideUp();
            $(".adding__" + type + "_area").slideDown();
            break;
        case "last":
            var type_food = $(object).parents(".adding--room--type").find(".food_type_selected option:selected").text();
            var type_count = $("." + type + "_count_for_price").text();
            var new_type_count = parseInt(type_count) + 1;
            var type_name;
            if (type == "adult") {
                type_name = "Вызрослих";
            } else if (type == "child") {
                type_name = "Детей";
                if ($(".child__age").find("option:selected").val() == '') {
                    $(".child__age").addClass("error_input");
                    break;
                } else {
                    $(".child__age").removeClass("error_input");
                    $('.child__age').val("");
                }
            }
            var html = '<div class="room_persons col-md-9 display_none">';
            html += '<div class="row">';
            html += '<div class="col-md-12 text-center">';
            html += '<img src="images/icons/' + type + '.png" style="width: 30px;vertical-align: bottom;"> <span class="main-color bold" style="font-size: 22px;">' + type_name + '</span> <a href="javascript:void(0);" class="white-text bold float-right" style="margin-top:0px;background-color:#09BD9F;padding:5px;" onclick="removePersons(this, \'' + type + '\');">Удалить</a>';
            html += '</div>';
            html += '</div>';
            html += '<div class="row" style="margin-top: 15px;">';
            html += '<div class="col-md-4 text-center">';
            html += '<img src="images/icons/sanat_1.png" style="width: 20px;">';
            html += '<span class="room_span_text">7 ночей проживания</span>';
            html += '</div>';
            html += '<div class="col-md-4 text-center">';
            html += '<img src="images/icons/sanat_4.png" style="width: 20px;">';
            html += '<span class="room_span_text">22 лечебные процедуры</span>';
            html += '</div>';
            html += '<div class="col-md-4 text-center">';
            html += '<img src="images/icons/sanat_5.png" style="width: 20px;">';
            html += '<span class="room_span_text">питьевой курс</span>';
            html += '</div>';
            html += '</div>';
            html += '<div class="row">';
            html += '<div class="col-md-4 text-center">';
            html += '<img src="images/icons/sanat_3.png" style="width: 20px;">';
            html += '<span class="room_span_text">2 осмотра доктора</span>';
            html += '</div>';
            html += '<div class="col-md-4 text-center">';
            html += '<img src="images/icons/sanat_6.png" style="width: 20px;">';
            html += '<span class="room_span_text">лабораторные анализы</span>';
            html += '</div>';
            html += '<div class="col-md-4 text-center">';
            html += '<img src="images/icons/sanat_2.png" style="width: 20px;">';
            html += '<span class="room_span_text">' + type_food + '</span>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $(".room_persons_adding_area").append(html);
            $(".room_persons_adding_area").find(".room_persons:last").slideDown();
            $("." + type + "_count_for_price").html(new_type_count);
            addToRoomPersons(object, '', 'reset');
            break;
        case "reset":
            $("[class*='add__']").slideDown();
            $("[class*='adding__']").slideUp();
            break;
    }
}

function change_level(object, type) {
    var levels = $(".change_level_sanat");
    levels.find(".levels").removeClass("active");
    $(object).addClass("active");
    switch (type) {
        case "automatic":
            $("#roomType_manual").hide();
            $("#roomType_" + type).show();
            $("#basket_booking").css("visibility", "hidden");
            break;
        case "manual":
            $("#roomType_" + type).show();
            $("#roomType_automatic").hide();
            if (!$(".basket_booking_area").hasClass("empty_area")) {
                $("#basket_booking").css("visibility", "visible");
            }
            break;
        default:
    }
}

function removePersons(object, type) {
    $(object).parents(".room_persons").remove();
    var type_count = $("." + type + "_count_for_price").text();
    var new_type_count = parseInt(type_count) - 1;
    $("." + type + "_count_for_price").html(new_type_count);
}

function get_destination(object, type) {
    switch (type) {
        case "open":
            $(".destination_find_input").show();
            $(".destination_find_input").find(".destination_search_input").focus();
            $(".list_section").scrollTop(0);
            break;
        case "close":
            $(".destination-box").hide();
            break;
    }
    var top = $(object).parents("form").offset().top - 20;
    $("html,body").animate({
        scrollTop: top + "px"
    }, 200);
}

function get_destination_select(object, type, action) {
    if (type == "country") {
        var country_id = $(object).attr("id");
        country_id = country_id.replace(/^cntr_/, '');
        $("[class*='cities_']").hide();
        $(".cities_" + country_id).show();
        if (action != "notReset") {
            $("[class*='cities_']").find("[type!='hidden'][name='snt_slct[]']").prop("checked", false);
            $("[class*='cities_']").find("[type!='hidden'][name='cty_slct[]']").prop("checked", false);
        }
        $(".non_selected_destination").hide();
        $(".city_list").show();
        $(".destination-open").attr("onclick", "get_destination_select(this,'sanatoriums','open');");
        $(".destination-open").find("span").removeClass("glyphicon-menu-up").addClass("glyphicon-menu-down");
        $("[class*='cities_']").find(".sanatoriums_list").hide();
    } else if (type == "sanatoriums") {
        if (action == "open") {
            $(object).attr("onclick", "get_destination_select(this,'sanatoriums','close');");
            $(object).find("span").removeClass("glyphicon-menu-down").addClass("glyphicon-menu-up");
            $(object).parents("[class*='cities_']").find(".sanatoriums_list").show();
        } else if (action == "close") {
            $(object).attr("onclick", "get_destination_select(this,'sanatoriums','open');");
            $(object).find("span").removeClass("glyphicon-menu-up").addClass("glyphicon-menu-down");
            $(object).parents("[class*='cities_']").find(".sanatoriums_list").hide();
        }
    } else if (type == "selected_city") {
        $(object).parents("[class*='cities_']").find(".sanatoriums_list").each(function() {
            if ($(object).prop("checked") == true) {
                $(this).find("[type!='hidden'][name='snt_slct[]']").prop("checked", true);
            } else {
                $(this).find("[type!='hidden'][name='snt_slct[]']").prop("checked", false);
            }
        });
    } else if (type == "selected_sanatorium") {
        var selected_sanatorium_count = 0;
        $(object).parents(".sanatoriums_list").find("[name='snt_slct[]']").each(function(m) {
            if ($(this).prop("checked") == true) {
                selected_sanatorium_count = selected_sanatorium_count + 1;
            }
            if (selected_sanatorium_count == 0) {
                $(object).parents("[class*='cities_']").find("[type!='hidden'][name='cty_slct[]']").prop("checked", false);
            } else {
                $(object).parents("[class*='cities_']").find("[type!='hidden'][name='cty_slct[]']").prop("checked", true);
            }
        });
    } else if (type == "reset_all") {
        $(".country_list").find("[type!='hidden'][name='couList']").each(function() {
            $(this).prop("checked", false);
        });
        $("[class*='cities_']").find("input[type='checkbox']").each(function() {
            $(this).prop("checked", false);
        });
        $(".non_selected_destination").show();
        $(".city_list").hide();
        $(".destination-open").attr("onclick", "get_destination_select(this,'sanatoriums','open');");
        $(".destination-open").find("span").removeClass("glyphicon-menu-up").addClass("glyphicon-menu-down");
        $("[class*='cities_']").find(".sanatoriums_list").hide();
        $(".destination-not-writing").show();
        $(".destination-writing").hide();
        $(".destination-footer").show();
    } else if (type == "close") {
        $(".destination-box").hide();
        $(".destination_find_input").hide();
    }
}

function get_destination_find(object, action) {
    $(".destination-box").show();
    var that = object;
    var object = $(".destination_search_input_hidden");
    get_destination_select(object, 'reset_all', '');
    var country_length = 0;
    var city_lenght = 0;
    var sanatorium_length = 0;
    var text = $(that).val().toLowerCase();
    text = transliterate(text);
    var country_search_list = $(object).parents(".destination-box").find(".country_search_list");
    var city_search_list = $(object).parents(".destination-box").find(".city_search_list");
    var sanatorium_search_list = $(object).parents(".destination-box").find(".sanatorium_search_list");
    country_search_list.find(".found_destination ul").empty();
    city_search_list.find(".found_destination ul").empty();
    sanatorium_search_list.find(".found_destination ul").empty();
    $(object).parents(".destination-box").find(".country_list label").each(function() {
        var label_text = $(this).text().toLowerCase();
        label_text = transliterate(label_text);
        var label_text_normalize = $(this).text();
        var label_id = $(this).attr("for").replace("cntr_", "");
        if (label_text.search(text) != -1) {
            country_search_list.find(".found_destination ul").append("<li class='destination-li destination_label' onclick='set_update_destination(this,\"country\");'><label data-id=" + label_id + "><img src='/frontend/images/icons/country.png' style='vertical-align: sub;'> " + label_text_normalize + "</label></li>");
            country_search_list.find(".found_destination").show();
            country_length = country_length + 1;
        }
    });
    if (country_length != 0) {
        country_search_list.find(".not_found_destination").hide();
        country_search_list.find(".found_destination").show();
        $(object).parents(".destination-box").find(".destination_all_not_found").hide();
    } else {
        country_search_list.find(".not_found_destination").show();
        country_search_list.find(".found_destination").hide();
    }
    $(object).parents(".destination-box").find(".city_list ul li > label[data-name='city']").each(function() {
        var label_text = $(this).text().toLowerCase();
        label_text = transliterate(label_text);
        var label_text_normalize = $(this).text();
        var label_id = $(this).attr("for").replace("cty_", "");
        if (label_text.search(text) != -1) {
            city_search_list.find(".found_destination ul").append("<li class='destination-li destination_label' onclick='set_update_destination(this,\"city\");'><label data-id=" + label_id + "><img src='/frontend/images/icons/city.png' style='vertical-align: sub;'> " + label_text_normalize + "</label></li>");
            city_search_list.find(".found_destination").show();
            city_lenght = city_lenght + 1;
        }
    });
    if (city_lenght != 0) {
        city_search_list.find(".not_found_destination").hide();
        city_search_list.find(".found_destination").show();
        $(object).parents(".destination-box").find(".destination_all_not_found").hide();
    } else {
        city_search_list.find(".not_found_destination").show();
        city_search_list.find(".found_destination").hide();
    }
    $(object).parents(".destination-box").find(".city_list ul li > label[data-name='sanatorium']").each(function() {
        var label_text = $(this).text().toLowerCase();
        label_text = transliterate(label_text);
        var label_text_normalize = $(this).text();
        var label_id = $(this).attr("for").replace("snt_", "");
        var findContId = label_id.split(".");
        var countryName;
        var cityName;
        $(object).parents(".destination-box").find(".country_list label").each(function() {
            var default_valCountry = $(this).attr("for").replace("cntr_", "")
            if (findContId[0] == default_valCountry) {
                countryName = $(this).text();
            }
        });
        $(object).parents(".destination-box").find(".city_list ul li > label[data-name='city']").each(function() {
            var default_valCity = $(this).attr("for").replace("cty_", "").split(".")
            if (findContId[1] == default_valCity[1]) {
                cityName = $(this).text();
            }
        });
        if (label_text.search(text) != -1) {
            sanatorium_search_list.find(".found_destination ul").append("<li class='destination-li destination_label' onclick='set_update_destination(this,\"sanatorium\");'><label style='width: 100%;' data-id=" + label_id + "><img src='/frontend/images/icons/sanatorium.png' style='float: left; width: 17px;'> <div> <span class='textCopy'>" + label_text_normalize + "</span>, <span style='font-size:12px;'>" + cityName + ", " + countryName + "</span></div></label></li>");
            sanatorium_search_list.find(".found_destination").show();
            sanatorium_length = sanatorium_length + 1;
        }
    });
    if (sanatorium_length != 0) {
        sanatorium_search_list.find(".not_found_destination").hide();
        $(object).parents(".destination-box").find(".destination_all_not_found").hide();
        sanatorium_search_list.find(".found_destination").show();
    } else {
        sanatorium_search_list.find(".not_found_destination").show();
        sanatorium_search_list.find(".found_destination").hide();
    }
    if (country_length == 0 && city_lenght == 0 && sanatorium_length == 0) {
        sanatorium_search_list.find(".not_found_destination").hide();
        country_search_list.find(".not_found_destination").hide();
        city_search_list.find(".not_found_destination").hide();
        $(object).parents(".destination-box").find(".destination_all_not_found").show();
    }
    if (text == '') {
        $(object).parents(".destination-box").find(".destination-not-writing").show();
        $(object).parents(".destination-box").find(".destination-writing").hide();
        $(object).parents(".destination-box").find(".destination-footer").show();
    } else {
        $(object).parents(".destination-box").find(".destination-not-writing").hide();
        $(object).parents(".destination-box").find(".destination-writing").show();
        $(object).parents(".destination-box").find(".destination-footer").hide();
    }
}

function transliterate(word) {
    var a = {
        "Ё": "YO",
        "Й": "I",
        "Ц": "TS",
        "У": "U",
        "К": "K",
        "Е": "E",
        "Н": "N",
        "Г": "G",
        "Ш": "SH",
        "Щ": "SCH",
        "З": "Z",
        "Х": "H",
        "Ъ": "'",
        "ё": "yo",
        "й": "i",
        "ц": "ts",
        "у": "u",
        "к": "k",
        "е": "e",
        "н": "n",
        "г": "g",
        "ш": "sh",
        "щ": "sch",
        "з": "z",
        "х": "h",
        "ъ": "'",
        "Ф": "F",
        "Ы": "I",
        "В": "V",
        "А": "a",
        "П": "P",
        "Р": "R",
        "О": "O",
        "Л": "L",
        "Д": "D",
        "Ж": "ZH",
        "Э": "E",
        "ф": "f",
        "ы": "i",
        "в": "v",
        "а": "a",
        "п": "p",
        "р": "r",
        "о": "o",
        "л": "l",
        "д": "d",
        "ж": "zh",
        "э": "e",
        "Я": "Ya",
        "Ч": "CH",
        "С": "S",
        "М": "M",
        "И": "I",
        "Т": "T",
        "Ь": "'",
        "Б": "B",
        "Ю": "YU",
        "я": "ya",
        "ч": "ch",
        "с": "s",
        "м": "m",
        "и": "i",
        "т": "t",
        "ь": "'",
        "б": "b",
        "ю": "yu"
    };
    return word.split('').map(function(char) {
        return a[char] || char;
    }).join("");
}

function get_destination_accept(object) {
    var country_value = $("input[type='hidden'][name='couList']");
    var city_value = $("input[type='hidden'][name='cty_slct[]']");
    var sanatorium_value = $("input[type='hidden'][name='snt_slct[]']");
    country_value.val('');
    city_value.val('');
    sanatorium_value.val('');
    var destination = $(".destination-box");
    var button = $(".destination-button");
    var button_text_country = '';
    var button_text_city = '';
    var button_text_sanatorium = '';
    var country_length = 0;
    var city_lenght = 0;
    var sanatorium_length = 0;
    var country_array = Array();
    var city_array = Array();
    var sanatorium_array = Array();
    $(".destination-box:eq(0) .country_list").find("label").each(function() {
        if ($(this).parents("li").find("input[type!='hidden'][name='couList']").prop("checked") == true) {
            country_length++;
            if (country_length > 1) {
                button_text_country = "(" + country_length + " страна)";
            } else {
                button_text_country = $(this).text();
            }
            country_array.push($(this).parents("li").find("input[type!='hidden'][name='couList']").val());
        }
    });
    $(".destination-box:eq(0) .city_list ul").find("li > label[data-name='city']").each(function() {
        if ($(this).parents("li").find("input[type!='hidden'][name='cty_slct[]']").prop("checked") == true) {
            city_lenght++;
            if (city_lenght > 1) {
                button_text_city = "(" + city_lenght + " городов)";
            } else {
                button_text_city = $(this).text();
            }
            city_array.push($(this).parents("li").find("input[type!='hidden'][name='cty_slct[]']").val());
        }
    });
    $(".destination-box:eq(0) .city_list ul.sanatoriums_list li").each(function() {
        if ($(this).find("input[type!='hidden'][name='snt_slct[]']").prop("checked") == true) {
            var sanatorium_name = $(this).find("label[data-name='sanatorium']").text();
            sanatorium_length = sanatorium_length + 1;
            if (sanatorium_length > 1) {
                button_text_sanatorium = "(" + sanatorium_length + " санатории)";
            } else {
                button_text_sanatorium = sanatorium_name;
            }
            sanatorium_array.push($(this).find("input[type!='hidden'][name='snt_slct[]']").val());
        }
    });
    if (country_length > 0 && city_lenght == 0 && sanatorium_length == 0) {
        button.val(button_text_country);
        update_hidden_input('country', country_array + '&' + city_array + '&' + sanatorium_array);
    } else if (country_length > 0 && city_lenght == 1 && sanatorium_length > 0) {
        button.val(button_text_sanatorium + ", " + button_text_city + ", " + button_text_country);
        update_hidden_input('sanatorium', country_array + '&' + city_array + '&' + sanatorium_array);
    } else if (country_length > 0 && city_lenght >= 1 && sanatorium_length >= 0) {
        button.val(button_text_city + ", " + button_text_country);
        update_hidden_input('city', country_array + '&' + city_array + '&' + sanatorium_array);
    } else {
        button.val("Страна, город или санаторий");
    }
    destination.hide();
    $(".destination_find_input").hide();
}

function set_update_destination(object, type) {
    var destination = $(".destination-box");
    var button = $(".destination-button");
    if (type == "country") {
        var button_text_country = $(object).find("label").text();
        var data_id = $(object).find("label").attr("data-id");
        button.val(button_text_country);
        update_hidden_input('country', data_id + '&&', 'other_type');
    } else if (type == "city") {
        var button_text_city = $(object).find("label").text();
        var data_id = $(object).find("label").attr("data-id");
        data_id = data_id = data_id.split(".");
        var button_text_country = $(object).parents(".destination-box").find(".country_list").find("ul li label[for='cntr_" + data_id[0] + "']").text();
        button.val(button_text_city + ", " + button_text_country);
        update_hidden_input('sanatorium', data_id[0] + '&' + data_id[1] + '&', 'other_type');
    } else if (type == "sanatorium") {
        var data_id = $(object).find("label").attr("data-id");
        data_id = data_id = data_id.split(".");
        var button_text_country = $(object).parents(".destination-box").find(".country_list").find("ul li label[for='cntr_" + data_id[0] + "']").text();
        var button_text_city = $(object).parents(".destination-box").find(".city_list").find("ul li label[for='cty_" + data_id[0] + "." + data_id[1] + "']").text();
        var button_text_sanatorium = $(object).find("label .textCopy").text();
        button.val(button_text_sanatorium + ", " + button_text_city + ", " + button_text_country);
        update_hidden_input('sanatorium', data_id[0] + '&' + data_id[1] + '&' + data_id[2], 'other_type');
    }
    destination.hide();
    $(".destination_find_input").hide();
    $(".destination_search_input").val("");
    get_destination_select(object, 'reset_all', '');
}

function update_hidden_input(type, values, type2) {
    if (type2 == "other_type") {
        $(".other_type_input").append('<input type="hidden" name="couList"><input type="hidden" name="snt_slct[]"><input type="hidden" name="cty_slct[]">');
    }
    var country_value = $("input[type='hidden'][name='couList']");
    var city_value = $("input[type='hidden'][name='cty_slct[]']");
    var sanatorium_value = $("input[type='hidden'][name='snt_slct[]']");
    values = values = values.split("&");
    if (type2 == "other_type_2") {
        if (values[0] == '') {
            $(".other_type_input").append('<input type="hidden" name="couList"><input type="hidden" name="snt_slct[]"><input type="hidden" name="cty_slct[]">');
        }
    }
    switch (type) {
        case "country":
            country_value.val(values[0]);
            city_value.val('');
            sanatorium_value.val('');
            break;
        case "city":
            country_value.val(values[0]);
            city_value.val(values[1]);
            sanatorium_value.val('');
            break;
        case "sanatorium":
            country_value.val(values[0]);
            city_value.val(values[1]);
            sanatorium_value.val(values[2]);
            break;
    }
}

function calendar_clear() {
    $(".form-control.date-f.line").each(function() {
        $(this).data('dateRangePicker').clear();
        $(this).data('dateRangePicker').redraw();
        $(this).html("Прибытие ￫ Выезд");
    });
}
jQuery(document).ready(function() {});