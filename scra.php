<?php

function display_key($key){
   
        printf("Value = '%s' ",$key);
}
function scramble_data($orginal_data ,$key){
        $orginal_key = "abcdefghijklmnopqrstuvwxyz1234567890";
        $data = '';

        $length = strlen($orginal_data);
        for($i=0; $i<$length;$i++){
                $current_char = $orginal_data[$i];
                $position = strpos($orginal_key,$current_char);
                if($position !== false){
                        $data .= $key[$position];
                }else{
                        $data .= $current_char;
                }
        }

        return $data;
}

function decode_data($orginal_data ,$key){
        $orginal_key = "abcdefghijklmnopqrstuvwxyz1234567890";
        $data = '';

        $length = strlen($orginal_data);
        for($i=0; $i<$length;$i++){
                $current_char = $orginal_data[$i];
                $position = strpos($key,$current_char);
                if($position !== false){
                        $data .= $orginal_key[$position];
                }else{
                        $data .= $current_char;
                }
        }

        return $data;
}


?>