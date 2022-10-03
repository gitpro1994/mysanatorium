// var adv = $("#obzor .guest_like_area_new");
// var obzor = $("#obzor .obz");
// if (adv.height() < obzor.height()) {
//     obzor.css({'height': adv.height() - 40 + 'px', 'overflow': 'hidden'});
//     $("#obzor .o_more a").show();
// }

function show_zadarma_call() {
    $("#zcwMiniButton").trigger("click");
}


function sanatorium_obzor(object) {
    if ($(object).hasClass("sh_all")) {
        $(object).parents("#obzor").find(".obz").css({ 'height': '100%' })
        $(object).removeClass('sh_all').addClass('sh_close').text('Показать меньше');
    } else {
        $(object).parents("#obzor").find(".obz").css({ 'height': adv.height() - 40 + 'px' })
        $(object).removeClass('sh_close').addClass('sh_all').text('Показать больше');
    }

}

function show_action(object, type) {
    switch (type) {
        case 'transfer-back':
            if ($("." + type + "-body").css("display") != "none") {
                $("." + type).addClass("isClose").removeClass("isOpen");
                $("." + type + "-action").find("." + type + "-body").addClass("hide");
            } else {
                $("." + type).removeClass("isClose").addClass("isOpen");
                $("." + type + "-action").find("." + type + "-body").removeClass("hide");
            }
            break;
    }
}
function show_hidden_toogle(this_object, parents, tag, type) {
    var title = $(this_object).attr("data-title"), text = $(this_object).html();
    "show" == type ? ($("." + parents).find(tag).show(), $(this_object).removeClass("sh_all").addClass("sh_close"), $(this_object).attr("onclick", "show_hidden_toogle(this,'" + parents + "','" + tag + "','close')").html($(this_object).attr('data-title')).attr('data-title', text)) : "close" == type && ($("." + parents).find(tag).hide(), $(this_object).removeClass("sh_close").addClass("sh_all"), $(this_object).attr("onclick", "show_hidden_toogle(this,'" + parents + "','" + tag + "','show')").html($(this_object).attr('data-title')).attr('data-title', title))
}
function get_popup(object, name, action) {
    switch (action) {
        case 'open':
            $(".pop-up." + name).show();
            break;
        case 'close':
            $(".pop-up." + name).hide();
            break;
    }
}
function show_advantage(object) {
    $(".advantage-content").find("i.fa").attr("style", "");
    $(".advantage-content").find(".advantage-content-box").hide();
    $(".advantage-content i").removeClass("fa-angle-up").addClass("fa-angle-down");
    if ($(object).hasClass("fa-angle-down")) {
        $(object).css({ 'z-index': 55 });
        $(object).parents(".advantage-content").find(".advantage-content-box").show();
        $(object).removeClass("fa-angle-down").addClass("fa-angle-up");
    } else {
        $(object).css({ 'z-index': 0 });
        $(object).parents(".advantage-content").find(".advantage-content-box").hide();
        $(object).removeClass("fa-angle-up").addClass("fa-angle-down");
    }
}

function searchPanel(object, type) {
    var searchPanel = $(".searchPanel_" + type);
    var searchPanel_display = searchPanel.css("display");
    if (searchPanel_display == "block") {
        searchPanel.hide();
        if ($(".searchPanel_" + type).hasClass("searchList_ListItem")) {
            $(object).html("Показать цену");
            $(".blanked_2").hide();
            searchPanel.parents(".searchPanelPopOver_" + type).removeClass("z-index-popover");
        }
    } else {
        $("[class*='searchPanel_']").hide();
        searchPanel.show();
        if ($(".searchPanel_" + type).hasClass("searchList_ListItem")) {
            $(object).html("Вернуться");
            $(".blanked_2").show();
            searchPanel.parents(".searchPanelPopOver_" + type).addClass("z-index-popover");
            $('html, body').animate({ scrollTop: $(".searchPanelPopOver_" + type).offset().top - 130 }, 400);
        }
    }
}
function open_question(object) {
    var ques_body = $(object).parents(".ques-ans").find(".ques-ans-body");
    if (ques_body.css("display") != "block") {
        $(object).removeClass("red_arrow_down").addClass("red_arrow_up");
        ques_body.slideDown();
    } else {
        $(object).removeClass("red_arrow_up").addClass("red_arrow_down");
        ques_body.slideUp();
    }
}
function get_navigation(object, action) {
    var top = $("#" + action).offset().top - 120;
    $("html,body").animate({ scrollTop: top + "px" });
}
function onScroll(event) {
    var scrollPosition = $(document).scrollTop() - 165;
    $(".sanat_navigation").find("a").each(function () {
        var currentLink = $(this);
        var refElement = $(currentLink.attr("data-href"));
        if (refElement.position().top <= scrollPosition && refElement.position().top + refElement.height() > scrollPosition) {
            $(".sanat_navigation").find("a").removeClass("activeNav");
            currentLink.addClass("activeNav");
        }
    });
}
function get_other_phones(object) {
    var display = $(".other_phones_area").css("display");
    if (display == "block") {
        $(object).find("span.glyphicon").removeClass("glyphicon-menu-up").addClass("glyphicon-menu-down");
        $(".other_phones_area").hide();
    } else {
        $(object).find("span.glyphicon").removeClass("glyphicon-menu-down").addClass("glyphicon-menu-up");
        $(".other_phones_area").show();
    }
}
function leceniya_change_arrow(type) {
    var all_images = $(".other_images");
    var active_image = all_images.find("img.active").index();
    var last_index = all_images.find("img").last().index();
    all_images.find("img").removeClass("active");
    if (type == "next") {
        active_image++;
        if (active_image > last_index) {
            leceniya_active(0);
            all_images.find("img:eq(0)").addClass("active");
        } else {
            leceniya_active(active_image);
            all_images.find("img:eq(" + active_image + ")").addClass("active");
        }
    } else if (type == "prev") {
        active_image--;
        if (active_image < 0) {
            leceniya_active(last_index);
            all_images.find("img:eq(" + last_index + ")").addClass("active");
        } else {
            leceniya_active(active_image);
            all_images.find("img:eq(" + active_image + ")").addClass("active");
        }
    }
    var active_image_num = all_images.find("img.active").index() + 1;
    $(".count").find(".selected_count").text(active_image_num);
}
function leceniya_active(ind) {
    var all_images = $(".other_images");
    var a = all_images.find("img:eq(" + ind + ")").attr("data-id");
    $("[class*='lec-']").hide();
    $(".leceniya").find("." + a).show();
}
$(document).ready(function () {
    var o = $(".help--block"), a = o.height();
    a += 100, a = "-" + a + "px", o.css({ marginTop: a })
});
function gup(e, a) {
    a || (a = location.href), e = e.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var t = "[\\?&]" + e + "=([^&#]*)", i = new RegExp(t), o = i.exec(a);
    return null == o ? null : o[1]
}
function leceniya_change(e) {
    var a = $(e).attr("data-id");
    $("[class*='lec-']").hide(), $("[data-id*='lec-']").removeClass("active"), $(".leceniya").find("." + a).each(function () {
        $(this).show()
    }), $("[data-id='" + a + "']").addClass("active"), $(".leceniya").find(".other_images img").each(function () {
        var e = $(this).hasClass("active");
        if (1 == e) {
            var a = $(this).index() + 1;
            $(".count").find(".selected_count").text(a)
        }
    })
}
function showHide(element_id) {
    if (document.getElementById(element_id)) {
        var obj = document.getElementById(element_id);
        if (obj.style.display != "block") {
            obj.style.display = "block";
        } else
            obj.style.display = "none";
    }
}
function open_addinational_navbar(a, n, d) {
    $(".link-popup").removeClass("actives"), "open" == n ? ($(a).find("a").addClass("actives"), $(".advanced_navbar").hide(), $(".advanced_navbar." + d).show()) : "close" == n && $(".advanced_navbar." + d).hide()
}
$(".main-color-link-new").bind("touchstart touchend", function (e) {
    $(".main-color-link-new").removeClass("hover_effect"), $(this).toggleClass("hover_effect")
});
function show_comment(object) {
    var list = $(object).parents(".sanatorium-item").find(".list_comment");
    if (list.css("display") == "block") {
        list.hide();
        $(object).find("span.glyphicon").removeClass("glyphicon-menu-up").addClass("glyphicon-menu-down");
        $(object).find("span:eq(0)").text("Показать последние отзывы");
    } else {
        list.show();
        $(object).find("span.glyphicon").removeClass("glyphicon-menu-down").addClass("glyphicon-menu-up");
        $(object).find("span:eq(0)").text("Свернуть последние отзывы");
    }
}
function close_comment(object) {
    $(object).parents(".list_comment").hide();
    $(object).parents(".sanatorium-item").find(".arrow_reviews span.glyphicon").removeClass("glyphicon-menu-up").addClass("glyphicon-menu-down");
    $(object).parents(".sanatorium-item").find(".arrow_reviews span:eq(0)").text("Показать последние отзывы");
}
$(document).on('change', '.sort', function () {
    window.location = $(this).val();
});

if (document.querySelectorAll(".whiteLayerMobile").length > 0) {

    document.querySelector(".whiteLayerMobile").addEventListener("click", function () {
        $(".iframeBox").addClass("active-m-iframe");
        $(".opacityBoxMobile").addClass("active-m-opacityBlock");
    });
    document.querySelector(".closeIframeMobile").addEventListener("click", function () {
        $(".iframeBox").removeClass("active-m-iframe");
        $(".opacityBoxMobile").removeClass("active-m-opacityBlock");
        $(".replaceSrcStop").attr("src", $(".replaceSrcStop").attr("src"));
    });
    document.querySelector(".specialLImobile").addEventListener("click", function () {
        $(".callBlock").addClass("callBlock-active");
        $("body").addClass("hiddenFlowMobile");
        // $(".chatra--visible").hide();
    });
    document.querySelector(".closeModulMobile span").addEventListener("click", function () {
        $(".callBlock").removeClass("callBlock-active");
        $("body").removeClass("hiddenFlowMobile");
        // $(".chatra--visible").show();
    });
}
else { }
$(".openChatRa").click(function (y) {
    y.preventDefault();
    Chatra('openChat', true);
});




$(document).ready(function () {
    if ($(".getWrapLink").length > 0) {

        $(".getWrapLink").each(function (i) {
            $(this).wrap("<a></a>");
            $(this).parent().addClass("getHrefALinkBlog");
            $(".getHrefALinkBlog").attr("target", "_blank");
            let dataBlogLink = $(".getHrefALinkBlog").find(".getWrapLink").attr("data-link");
            document.querySelectorAll(".getWrapLink").forEach(function (y) {
                let getAttrPartLink = y.getAttribute("data-link");
                let fullLinkElement = "https://" + getAttrPartLink;
                $(y).parent().attr("href", fullLinkElement);
            });
        });
        $(".row .getWrapLink").addClass("activeElement");
    }

    if (window.outherWidth > 991 && $(".boxBlog").length > 0) {
        $(".boxBlog").parent().parent().addClass("active-rows");
        $(".active-rows > .col-md-4").each(function (i) {
            if (i % 3 == 0) {
                $(this).nextAll().addBack().slice(0, 3).wrapAll("<section></section>");
            }
            else { }
        });
    }
    else { }

    if ($(".parentCyanBox").length > 0) {

        document.querySelectorAll(".parentCyanBox").forEach(function (y) {
            $(y).find(".infoBtnSanat").wrap("<a></a>");
            $(y).find("a").addClass("refBtnSanat");
            $(y).find("a").attr("target", "a_blank");
            let elementLink = "https://" + $(y).find("span").html();
            $(y).find("a").attr("href", elementLink);
        });
    }


    if ($(".orangeButton").length > 0) {
        $(".orangeButton").click(function () {
            $(".replaceSrcStop").attr("src", "//www.youtube.com/embed/ZPuoT1SzpbI?autoplay=1&rel=0");
        });
    }

});
