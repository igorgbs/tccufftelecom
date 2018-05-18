<?php
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value[1] + $value[2];
}
// $arr is now array(2, 4, 6, 8)
unset($value); // break the reference with the last element

print_r ($arr);
?>