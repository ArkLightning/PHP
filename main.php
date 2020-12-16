<?php
    require("header.php");

    echo "<h1>Таблица Uploaded_Text</h1>";

    #Подключение к серверу
    $host = 'localhost';
    $database = 'Analized_Text';
    $user = 'root';
    $password = '1';

    $link = mysqli_connect($host, $user, $password, $database)
	or die("Ошибка " . mysqli_error($link));
    
    # Формирование запроса вывода строк из Uploaded_Text и помещение их в таблицу
    $query = "SELECT * FROM Uploaded_Text";
    $result = mysqli_query($link, $query) or die ("Ошибка ".mysqli_error($link));
    echo "<table border=1>";
    echo "<tr>";
    echo "<td>ID</td><td>Content</td><td>Date</td><td>Words_Count</td>";
    echo "</tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><a href='words_view.php?ID=$row[ID]'>$row[ID]</a></td>
	    </td><td>$row[Content]</td><td>$row[Date]</td><td>$row[Words_Count]</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "\n", "<br />";

    echo "<a href='input_form.php'><button>Ввод текста</button></a>";

    require("footer.php");
?>

