<?php
/*
 * переменная $text - исходный текст
 */
function removeBOM($text="") {
    if(substr($text, 0, 3) == pack('CCC', 0xef, 0xbb, 0xbf)) {
        $text= substr($text, 3);
    }
    return $text;
}

/*
* file.php - файл, в котором нужно удалить BOM
*/

$text=file_get_contents('bron/index.php');
$text_without_bom = removeBOM($text);
?>