function binarySearch($file_name, $search_key){
  $file = new SplFileObject($file_name);  
  $file->seek($file->getSize());  
  $lines_quantity = $file->key();
  //позици первой и последней строки
  $start = 0;
  $end = $lines_quantity-1;
  $flag = 0;
  while($start <= $end){    
    //определяем середину 
    $middle =  round(($start + $end) / 2);
    //проверка последней записи
    if($end - $start == 1 && $end == $lines_quantity-1){
        $middle = $end+1;
        $flag++;
    }
    //переводим указатель
    $file->seek($middle-1);
    //читаем строку
    $line = $file->current();
    //находи в строке ключ
    $key = substr($line, 0, strpos($line, "\t"));
    //сравниваем искомый ключ с данным
    $val = strcmp($key, $search_key);
    //если равно то останавливаемся и возвращаем значение
    if($val == 0){
        return substr($line, strpos($line, "\t")+1, strlen($line));
        }
    elseif($val < 0)
        $start = $middle;
    else
        $end = $middle;
    //если разница между началом и концом 1 значит ничего не найдено
    if($end-$start == 1 && $flag == 1){            
        return "undef";
    }
  }
  return "undef";
}

echo binarySearch("$file_name", "$search_key");
