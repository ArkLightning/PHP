<?php

$host = 'localhost';
$database = 'Analized_Text';
$user = 'root';
$password = '1';

#Подсоединение к серверу
$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
$words = preg_split("/[!\.\s,;-]+/", $_POST['inp_text'], -1, PREG_SPLIT_NO_EMPTY);
#echo 'Всего слов: ', count($words);
#echo "\n", "<br />";

#Формирование запроса заполнения Uploaded_Text
$query = "INSERT INTO Uploaded_Text (Content, Date, Words_Count) 
    VALUES ("."'".$_POST['inp_text']."'".", "."'".date('Y-m-d H:i:s')."'".", ".count($words).")";
#echo "\n", "<br />";
#echo $query;
#echo "\n", "<br />";

if (mysqli_query($link, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($link);
}

#Получение Max(ID) как переменной для Text_ID в Words
$query ="SELECT max(ID) as maxid FROM Uploaded_Text";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result) {
    echo "Выполнение запроса прошло успешно";
}
#echo "\n", "<br />";

$obj = mysqli_fetch_object($result);
#echo "maxid = ", $obj->maxid;

/* очищаем результирующий набор */
mysqli_free_result($result);
#cho "\n", "<br />";

#Формирование массива $out
$out = [];
foreach($words as $value) {
    isset($out[$value])?$out[$value]++:$out[$value]=1;
}

arsort($out);

#Заполнение таблицы Word
foreach($out as $index => $value) {
#    echo $index, '.', $value, "\n", "<br />";
    $query = "INSERT INTO Word(Text_ID, Word, Count)
	VALUES (".$obj->maxid.", "."'".$index."'".", ".$value.")";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
}

mysqli_close($link);
?>
    
#<a href="main.php"><button>main page</button></a>
<script>location.replace('main.php');</script>

