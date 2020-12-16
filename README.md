# PHP
Программа подсчета слов в произвольном тексте с учетом сепараторов
Для разделения по словам использовалась функция preg_split. 

Версия 1.1
Задание:
1) за основу берем предыдущее задание
2) создать две таблицы:
3)
a) таблица uploaded_text с колонками : id, content, date, words_count
b) таблица word с колонками: id, text_id, word, count
создать страницы:
a)
главная страница - вывести список текстов из таблицы uploaded_text, в списке должен
быть идентификатор, обрезанный текст, ссылка на переход к детальной странице
результата анализа текста. Предусмотреть ссылку на страницу загрузки.
b)
детальная страница текста - вывести все данные таблицы word, вместе с самим текстом,
датой загрузки и общим количеством слов.
c)
4)
страница с формой для вставки текста из предыдущего задания
приложить sql-file c необходимыми для работы таблицами (без данных)

Pеализация:
Созданны таблицы в базе MySQL Analized_Text
CREATE TABLE `Analized_Text`.`Uploaded_Text` ( `ID` INT NOT NULL AUTO_INCREMENT , `Content` TEXT NOT NULL , `Date` DATE NOT NULL , `Words_Count` INT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;
CREATE TABLE `Analized_Text`.`Word` ( `ID` INT NOT NULL AUTO_INCREMENT , `Text_ID` INT NOT NULL , `Word` VARCHAR NOT NULL , `Count` INT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;

Используемые модули

footer.php 
header.php - Заголовок страницы
input_form.php - Форма для ввода текста
incert_data.php - Модуль заполнения таблиц Uploaded_Text, Word
main.php - Главная страница и вывод данных из таблицы Uploaded_Text
words_view.php - Модуль вывода данных из таблицы Words
