$(document).ready(function () {
    $('.formSearch-All').hide();

    $('#searchAll').click(function () {
        $('.formSearch-All').toggle(300);
    });

    $('#iconRemoveRecornd').click(function () {
        $('.formSearch-All').hide(300);
        $('.formSearch-All input').val('');
    });
})