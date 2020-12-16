<?php
    require("header.php");

    echo "<h1>Таблица Words</h1>";
    # Получение значения Text_ID по гиперссылке из main_php (поле ID)
    if(isset($_GET['ID'])) {
	#Подключение к серверу
        $host = 'localhost';
	$database = 'Analized_Text';
        $user = 'root';
        $password = '1';
	$link = mysqli_connect($host, $user, $password, $database)
	    or die("Ошибка " . mysqli_error($link));
	# Формирование запроса вывода строк из Word и помещение их в таблицу
	$query="SELECT * FROM Word where Text_ID = "."'".$_GET['ID']."'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	echo "<table border=1>";
	echo "<tr>";
	echo "<td>ID</td><td>Text_ID</td><td>Word</td><td>Count</td>";
	echo "</tr>";
	while($row = mysqli_fetch_array($result)) {
	    echo "<tr>";
	    echo "<td>$row[ID]</td><td>$row[Text_ID]</td><td>$row[Word]</td><td>$row[Count]</td>";
	    echo "</tr>";
	}
        echo "</table>";
        echo "\n", "<br />";
    }
    else {
	echo "error ID";
    }

    echo "<a href='main.php'><button>Главная страница</button></a>";

    require("footer.php");
?>