<?php
class connect_bd {

	public function connect() {

		require_once("config.php"); // Подключаем конфигурационный файл с данными для подключения к бд

		$baseLink = mysqli_connect($host, $user, $password, $database)
	    or die("Ошибка " . mysqli_error($baseLink)); // открываем соеденение c бд и выводим ошибки в случае ошибки

		if ($_GET['type'] == "insert") {
				$query = "INSERT INTO
									product(name, article, description, availability, price)
				 					VALUES ('". $_GET['name'] ."', '". $_GET['article'] ."', '". $_GET['description'] ."', '". $_GET['availability'] ."', '". $_GET['price'] ."')";
		} //Если выбрана опция Добавлять позиции.

		if ($_GET['type'] == "delete") {
				$query ="DELETE
								 FROM product
								 WHERE name = '". $_GET['name'] ."'";
		} //Если выбрана опция Удалять позиции

		if ($_GET['type'] == "get_all") {
				$query = "SELECT *
									FROM `product";
		} //Если выбрана опция Выводить список позиций

		if ($_GET['type'] == "get_where") {
				$query = "SELECT *
									FROM product
									WHERE name = '". $_GET['name'] ."'";
		} //Если выбрана опция Выполнять текстовый поиск позиции

		$result = mysqli_query($baseLink, $query) or die("Ошибка " . mysqli_error($query));  // делаем запрос в бд

		if($result) {
			echo "Выполнение запроса прошло успешно"; //Оповещаем в случае успеха
				if ($_GET['type'] == "get_all" or $_GET['type'] == "get_where") {
						$table = "<table class=\"table table-dark\"><tr><th>ID</th><th>Name</th><th>description</th><th>availability</th><th>price</th></tr>";
					    while ($row = $result->fetch_assoc()) {
					    	$table .= "<tr><td>".$row["id"]."</td><td>".$row["name"]." ".$row["article"]."</td><td>".$row["description"]."</td><td>".$row["availability"]."</td><td>".$row["price"]."</tr>";
					    }
				    echo $table .= "</table>";
		    }// Выводим таблицу
		}
	    mysqli_close($baseLink); //По завершению работы закрываем соеденение с БД
	}
}

if (isset($_GET)) {
		$con = NEW connect_bd;
		$con -> connect();
		echo "<h1 align='center' class='comments_div'><a href=\"{$_SERVER['HTTP_REFERER']}\">Вернуться назад</a></h1>"; //Переадресация на предыдущую страницу
} //Если был get запрос то создаем экземпляр класс для работы с бд