<?php
function create_file(){
    $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
    $numChars = strlen($chars);
    $file = fopen("test.txt", "w+");
    //кол-во слов
    for($j = 0; $j < 3000; $j++){
        $string = '';
        //длинна слова
        for ($i = 0; $i < rand(1, 4000); $i++) {
          $string .= substr($chars, rand(1, $numChars) - 1, 1);
          }
        
        //подготовка массивов
        if($j%2 == 0)
            $key[] = $string;
        elseif($j%2 == 1)
            $values[] = $string;
    }
    sort($key);
    $string = '';
    for($i = 0; $i < count($key)-1 ;$i++){
        if(strrpos($string, $key[$i]) === true)
            continue;
        $string .= $key[$i]."\t".$values[$i]."\x0A";
                }
    
    
    
    fwrite($file, $string);
    fclose($file);
}

create_file();
