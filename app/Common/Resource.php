<?php
function menuMulti ($data,$parent_id = 0,$str="---|",$select=0) {
    foreach ($data as $val) {
        $id = $val["id"];
        $name = $val["name"];
        if ($val["parent_id"] == $parent_id) {
            if ($select != 0 && $id == $select) {
                echo '<option value="'.$id.'" selected>'.$str." ".$name.'</option>';
            } else {
                echo '<option value="'.$id.'">'.$str." ".$name.'</option>';
            }
            menuMulti ($data,$id,$str." ---|",$select);
        }
    }
}

function listCate ($data,$parent = 0,$str="") {
    foreach ($data as $val) {
        $id = $val["id"];
        $name = $val["name"];
        if ($val["parent_id"] == $parent) {
            echo '
			<tr class="list_data">';
            if ($str == "") {
                echo'<td class="list_td alignleft"><b>'.$str.' '.$name.'</b></td>';
            } else {
                echo'<td class="list_td alignleft">'.$str.' '.$name.'</td>';
            }
            echo'<td class="list_td aligncenter">
		            <a href="category/'.$id.'/edit" class="btn btn-block btn-primary btn-sm"> Edit </a>
		            <a href="category/'.$id.'/delete" class="btn btn-block btn-primary btn-sm" >Delete</a>
		            <br>
		        </td>
		    </tr>';
            listCate ($data,$id,$str." ---|");
        }
    }
}

/**
 * Render submenu
 * 
 * @param object $data.
 * @param int $id
 * @return string list
 * @author Spainno3
 */
function subMenu($data, $parent = 0) {
    echo '<ul class="sub_menu">';
    foreach ($data as $item) {
        if ($item->parent_id == $parent) {
            echo '<li class="noActive '.renderClassMenuActive($item->slug).'"><a href="'.renderRoute($item).'">'.$item->name.'</a>';
            subMenu($data, $item->id);
            echo '</li>';
        }
    }
    echo '</ul>';
}

/**
 * Render subMenuMobile
 * 
 * @param object $data.
 * @param int $id
 * @return string list
 * @author Spainno3
 */
function subMenuMobile($data, $parent = 0) {
    echo '<ul class="cd-accordion-menu">';
    foreach ($data as $item) {
        if ($item->parent_id == $parent) {
            echo '<li class="has-children '.renderClassMenuActive($item->slug).'">'
                .'<a href="'.renderRoute($item).'">'
                .'<label>'.$item->name.'</label></a>'
                .'<i class="arrow-main-menu-li fa fa-angle-right" aria-hidden="true"></i><input type="checkbox" name ="group-'.$item->id.'" id="group-'.$item->id.'">';
            subMenuMobile($data, $item->id);
            echo '</li>';
        }
    }
    echo '</ul>';
}

function renderClassMenuActive($slug) {
    return request()->is("category/".$slug.".html") ? "sale-noti" : "";
}

function renderRoute($item) {
    return route('endUser.category.detail',[$item->slug]);
}

/* Render submenu end */

/**
 * Encodes a string.
 * 
 * @param string $string The string to encrypt.
 * @param string $key[optional] The key to encrypt with.
 * @return string
 * @author Spainno3
 */
function encodeString($string, $keyEncode="") {
    //todo
    return $string;
}

/**
 * Decode a string.
 * 
 * @param string $string The string to encrypt.
 * @param string $key[optional] The key to encrypt with.
 * @return string
 * @author Spainno3
 */
function decodeString($string, $keyEncode="") {
    //todo
    return $string;
}

/**
 * Cut string description.
 * 
 * @param string $string The string to cut.
 * @param int $length.
 * @return string
 * @author Spainno3
 */
function strEntitie($str, $length = TEXT_DESCRIPTION) {
    if(strlen($str) > $length ) {
        return substr(_stripTags($str), 0, $length) . ' ...';
    }
    return _stripTags($str);
}

/**
 * allow some tags  
 * @param string $allowedTags ,ex: <br><a>
 * @author: Spainno3
 */
function _stripTags($var, $allowedTags = '') {
    return strip_tags($var, $allowedTags);
}

/**
 * renderClass 
 * @param date $startD.
 * @param int $diff.
 * @author: Spainno3
 */
function renderClass($startD, $diff) {
    $now = new DateTime(date('Y-m-d'));
    $startDate = new DateTime(date('Y-m-d', strtotime($startD)));
    $diffDate = $now->diff($startDate);
    if($diffDate->days <= $diff) 
        return 'block2-labelnew';
    return '';
}