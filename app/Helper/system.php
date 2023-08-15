<?php

function uploadFile($nameFolder,$file) {
    $fileName = time().'_'.$file->getClientOriginalName();
    return $file->storeAs($nameFolder,$fileName,'public');
}
function format_text_to_characters($characters) {
    $count = strlen($characters);
    $string = '';
    for ($i=0; $i < $count ; $i++) { 
        $string = $string.'*';
    }
    return $string;
}
function changeColor($array=[],$role) {
    // var_dump($array);
    foreach ($array as $key => $value) {
        if ($value->id==$role) {
            return $array[$key];
        }
    }
}
?>