<!DOCTYPE html>  
<html>
<head>
<link href="style.css" rel="stylesheet">
<title> Что бы приготовить....</title>
</head>
  <body>
      <form action="index.php" method="post" name="1_form">


<?php include "header.php"?>
<div class="container1">
<table><tr>
<td> Поиск: </td>
<td> <input type="text" name="predmet" required=" " /> </td>
</tr>

<tr>
<td colspan="2"> <input type="submit" name="l_send" value="Ввод" /> </td>
</tr>

</table>
</form>
</div>
<div class="container">
<?php


// Переменные базы данных
    $server = "localhost"; /* Имя хоста (уточняется у провайдера), если работаем на локальном сервере, то указываем localhost */
    $database = "recipes"; /* Имя базы данных */
    $username = "root"; /* Имя пользователя базы данных */
    $password = ""; /* Пароль пользователя, если пароля нет, то оставляем пустым */
// Подключение к серверу MySQL
    $connect = mysqli_connect($server, $username, $password) or die(mysqli_error($connect));
    mysqli_select_db($connect, $database) or die("Cannot select Datebase");
	mysqli_set_charset($connect, 'utf8');
	$query = "SELECT * FROM recept_30";
	
	if(isset($_POST["predmet"])){ $predmet = $_POST["predmet"]; }
	if(isset($_POST["l_send"])){ $l_send = $_POST["l_send"]; }
	if(isset($l_send)){
		$query = "SELECT * FROM recept_30 WHERE name = '".$predmet."' ";
		$result = mysqli_query($connect, $query) or die("Error : ".mysqli_error($connect));
		while ($row = $result->fetch_assoc()) {
			// Оператором echo выводим на экран поля таблицы name и ingridients
			echo '<h2>Название рецепта: '.$row['name']. '</h2>';
			echo '<p>Ингредиенты: '.$row['ingridients']. '</p>';
			echo '<p>Шаги: '.$row['steps']. '</p>';
		}
	}
	
	$result = mysqli_query($connect, $query) or die("Error : ".mysqli_error($connect)); 
	
	
	while ($row = $result->fetch_assoc()) {
       // Оператором echo выводим на экран поля таблицы name и ingridients
       echo '<h2>Название рецепта: '.$row['name']. '</h2>';
       echo '<p>Ингредиенты: '.$row['ingridients']. '</p>';
	   echo '<p>Этапы: '.$row['steps']. '</p>';
   }
   
	
		   
   
   ?>

<?php



  // require_once ("dbconnect.php");
		//if(isset($_POST["l_name"])){ $l_Predmet = $POST["l_name"];}
		if(isset($_POST["l_ingridients"])){ $l_send = $POST["l_ingridients"];}
		if(isset($_send)){
			$result = mysqli_query($connect, "SELECT * FROM 'name' WHERE '`ingridients' like '%$l_name%'") or die ("Error : ".mysqli_error() );
		if(mysqli_num_rows($result)<1)
		{echo"Нет данных";}
	     else{
			$_SESSION['ingridients'] = $l_PredmetPredmet;
			echo"Результаты запроса";
		 }
//Установка кодировки соединения
    //mysqli_query($connect,"SET NAMES UTF8");
	//	$query = "SELECT Razdel, Tema, Info FROM predmeti";
		//$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
	if($result)
{
	$numrows = mysqli_num_rows($result);
				echo "<table class='features-table'>";
				echo "<thead>";
				echo "<tr><th>name</th><th>ingridients</th>";
				echo "</thead>";
				echo "<tfoot>";				
	for ($i=0; $i<$numrows; ++$i)
{	
	$row = mysqli_fetch_array($result);
				echo "<tr>";
				echo "<td>";
				echo "{$row["name"]}";
				echo "</td>";
				
				echo "<td>";
				echo "{$row["ingridients"]}";
				echo "</td>";
}
				echo "</tfoot>";
				echo "</table>";
// очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($connect);
		}else{
			echo"Нет данных для обработки";
		} 
		

?>


</div>
<div class="footer">
   &copy; Певкур А.А 431 группа.
  </div>
</body>
</html>