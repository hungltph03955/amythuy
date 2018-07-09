<?php 
if(file_exists(public_path().PATH_IMAGE_CATEGORY. $imgCat)):
    $imgCat = PATH_IMAGE_CATEGORY. $imgCat;
else:
    $imgCat = PATH_NO_IMAGE_CATEGORY;
endif
?>
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
    style="background-image: url({{$imgCat}})">
    <h2 class="l-text2 t-center">{{$titleCat}}</h2>
    <p class="m-text13 t-center">{{$descriptionCat}}</p>
</section>