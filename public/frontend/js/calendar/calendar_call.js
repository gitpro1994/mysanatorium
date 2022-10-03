$(function() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;

    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    var today = dd + '.' + mm + '.' + yyyy;
    $('.sanatorium_days').dateRangePicker({
        startOfWeek: 'monday',
        separator: ' - ',
        format: 'DD.MM.YYYY',
        autoClose: true,
        minDays: 8,
        startDate: today,
        setValue: function (s) {

            $(this).html(s + "<br><small class='new_small' style='font-weight:normal;'>" + $(".selected-days").text() + "</small>");
            $('.sanat-days-hidden').val(s);
        },
    })
})
