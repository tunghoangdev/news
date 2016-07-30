<?php
/**
 * Created by PhpStorm.
 * User: Pro
 * Date: 7/12/2016
 * Time: 8:48 PM
 */
function stripUnicode($str){
    if(!$str) return false;
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach($unicode as $nonUnicode=>$uni) {
        $arr = explode('|',$uni);
        $str = str_replace($arr,$nonUnicode,$str);
    }
    return $str;
}
function changTitle($str){
    $str = trim($str);
    if ($str=="") return "";
    $str = str_replace('"','',$str);
    $str = str_replace("'",'',$str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
    // MB_CASE_UPPER / MB_CASE_TITLE (Chu cai dau in hoa) / MB_CASE_LOWER
    $str = str_replace(' ','-',$str);
    return $str;
}
function cat_parent($data, $parent = 0, $str = '', $select = 0){
    foreach ($data as $key=>$item){
        $id = $item['id'];
        $name = $item['name'];
        if ($item['parent_id'] == $parent){
            if ($select != 0 && $id == $select){
                echo "<option selected='selected' value='$id'>$str $name</option>";
            }else{
                echo "<option value='$id'>$str $name</option>";
            }
            unset($data[$key]);
            cat_parent($data, $id, $str . '|--', $select);
        }
    }
}
