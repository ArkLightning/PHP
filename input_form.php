<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Ввод текста</title>
</head>
<body>
  <h2>Ввод текста</h2>
  <!-- Передача текста в форме методом post -->
  <form action="./insert_data.php" method="post">
  <textarea rows="10" cols="45" name="inp_text"></textarea>
  <!--Устанавливает кнопку для отправки данных формы в обработчик формы.-->
  <input type="submit" value="Ввод">
  </fieldset>
  </form>
</body>
</html>