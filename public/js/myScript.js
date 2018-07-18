$(document).ready(function () {
    $('.gennerError').delay(4000).slideUp(500);
});


$(document).ready(function () {
    // color
    $("div.color-clone").on("click", function () {
        cloneColorSelect();
    });

    $(document).on("click", "div.color-x", function () {
        var that = $(this);
        removeColorSelect(that);
    });

    // size
    $("div.size-clone").on("click", function () {
        cloneSizeSelect();
    });

    $(document).on("click", "div.size-x", function () {
        var that = $(this);
        removeSizeSelect(that);
    });

    //material
    $("div.material-clone").on("click", function () {
        cloneMaterialSelect();
    });

    $(document).on("click", "div.material-x", function () {
        var that = $(this);
        removeMaterialSelect(that);
    });

    //collection
    $("div.collection-clone").on("click", function () {
        cloneCollectionSelect();
    });

    $(document).on("click", "div.collection-x", function () {
        var that = $(this);
        removeCollectionSelect(that);
    });


    //imagedetail
    $("div.imageDetail-clone").on("click", function () {
        cloneImageDetailSelect();
    });

    $(document).on("click", "div.imageDetailDel", function () {
        var that = $(this);
        removeImageSelect(that);
    });


});


// collection
function cloneImageDetailSelect() {
    var $lastTable = $(".image-detail-element").last();
    var index = $lastTable.index();
    if (index > 4) {
        return;
    }
    var newHTML = $lastTable[0].outerHTML;
    newHTML = newHTML.replace(/\[\d\]/gi, "[" + index + "]");
    newHTML = $(newHTML);
    newHTML.find('#blah').removeAttr('src');
    newHTML.find('#blah').css({'width': '', 'height': ''});
    $lastTable.after(newHTML);
}

function removeImageSelect(that) {
    var $lastColorSelect = $(".image-detail-element").last();
    var index = $lastColorSelect.index();
    if (index >= 1) {
        that.parent().remove();
    }
}


// collection
function cloneCollectionSelect() {
    var $lastTable = $(".collection-element").last();
    var index = $lastTable.index();
    if (index > 4) {
        return;
    }
    var newHTML = $lastTable[0].outerHTML;
    newHTML = newHTML.replace(/\[\d\]/gi, "[" + index + "]");
    newHTML = $(newHTML)
    $lastTable.after(newHTML);
}

function removeCollectionSelect(that) {
    var $lastColorSelect = $(".collection-element").last();
    var index = $lastColorSelect.index();
    if (index >= 1) {
        that.parent().remove();
    }
}


// material
function cloneMaterialSelect() {
    var $lastTable = $(".material-element").last();
    var index = $lastTable.index();
    if (index > 4) {
        return;
    }
    var newHTML = $lastTable[0].outerHTML;
    newHTML = newHTML.replace(/\[\d\]/gi, "[" + index + "]");
    newHTML = $(newHTML)
    $lastTable.after(newHTML);
}

function removeMaterialSelect(that) {
    var $lastColorSelect = $(".material-element").last();
    var index = $lastColorSelect.index();
    if (index >= 1) {
        that.parent().remove();
    }
}


// size
function cloneSizeSelect() {
    var $lastTable = $(".size-element").last();
    var index = $lastTable.index();
    if (index > 4) {
        return;
    }
    var newHTML = $lastTable[0].outerHTML;
    newHTML = newHTML.replace(/\[\d\]/gi, "[" + index + "]");
    newHTML = $(newHTML)
    $lastTable.after(newHTML);
}

function removeSizeSelect(that) {
    var $lastColorSelect = $(".size-element").last();
    var index = $lastColorSelect.index();
    if (index >= 1) {
        that.parent().remove();
    }
}

//color
function cloneColorSelect() {
    var $lastTable = $(".color-element").last();
    var index = $lastTable.index();
    if (index > 15) {
        alert("Giới hạn màu sắc là 15");
        return;
    }
    var newHTML = $lastTable[0].outerHTML;
    newHTML = newHTML.replace(/\[\d\]/gi, "[" + index + "]");
    newHTML = $(newHTML);
    newHTML.find('#blah').removeAttr('src');
    newHTML.find('#blah').css({'width': '', 'height': ''});
    $lastTable.after(newHTML);
}

function removeColorSelect(that) {
    var $lastColorSelect = $(".color-element").last();
    var index = $lastColorSelect.index();
    if (index >= 1) {
        that.parent().remove();
    }
}


//load image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // $('#blah')
            $(input).parent().find('#blah')
                .attr('src', e.target.result)
                .width(200)
                .height(260);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

//load image
function readImageColorURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // $('#blah')
            $(input).parent().find('#blah')
                .attr('src', e.target.result)
                .width(175)
                .height(215);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


//load image
function readURLimageMater(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // $('#blah')
            $(input).parent().find('#imageMaterShow')
                .attr('src', e.target.result)
                .width(446)
                .height(591)
            ;
        };

        reader.readAsDataURL(input.files[0]);
    }
}


function readURLimageCategory(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // $('#blah')
            $(input).parent().find('#imageCategoryShow')
                .attr('src', e.target.result)
                .width(200)
                .height(200)
            ;
        };

        reader.readAsDataURL(input.files[0]);
    }
}


//load image
function readURLimageBanner(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // $('#blah')
            $(input).parent().find('#imageBanner')
                .attr('src', e.target.result)
            ;
        };

        reader.readAsDataURL(input.files[0]);
    }
}
mo file kieu gi?

$(document).ready(function () {
    $("a#del_img_demo").on('click', function () {
        var url = "/admin/delimg/";
        var idHinh = $(this).parent().find("img").attr("idHinh");
        var img = $(this).parent().find("img").attr("src");
        var rid = $(this).parent().find("img").attr("id");
        $.ajax({
            url: url + idHinh,
            type: 'GET',
            cache: false,
            data: {"idHinh": idHinh, "urlHinh": img},
            success: function (data) {
                if (data == "Oke") {
                    $("#" + rid).remove();
                } else {
                    alert("Error !! please contact admin");
                }
            }
        });
    });
});

$(document).ready(function () {
    $("a#del_color_demo").on('click', function () {
        var url = "/admin/delcolor/";
        var idHinh = $(this).parent().find("img").attr("idHinh");
        var img = $(this).parent().find("img").attr("src");
        var rid = $(this).parent().find("img").attr("id");
        $.ajax({
            url: url + idHinh,
            type: 'GET',
            cache: false,
            data: {"idHinh": idHinh, "urlHinh": img},
            success: function (data) {
                if (data == "Oke") {
                    $("#colorImageDetail" + rid).remove();
                } else {
                    alert("Error !! please contact admin");
                }
            }
        });
    });
});