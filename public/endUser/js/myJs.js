$(document).ready(function () {
    $("#colorSelect").change(function () {
        var imageName = $(this).find('option:selected').attr("id");
        $('.wrap-pic-w').first().find('img').attr('src', 'http://localhost:8000/upload/imageColor/' + imageName)
    });
});
