<?php
ini_set('session.save_path', "");
// Подключение файла сессии
session_start();
// Запись в сессионную переменную
// $_SESSION['name'] = 'Vasia';
echo session_id();
// Чтение из сессионной переменной
// echo $_SESSION['name'];
?> <!--Сессия -->

<!--HTML -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- BOOTSTRAP CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP CDN -->
</head>
<body>

<!-- ФОРМА ДЛЯ РАБОТЫ С БД -->
<form action="connectDB.php" method="get" accept-charset="utf-8" class="bd-example container al align='center">

	<div class="form-group form-control-sm row col-6">
		<select  class="form-control form-control-sm" name="type" id="select">
		  <option selected value="insert">Добавлять позиции</option>
		  <option value="delete">Удалять позиции</option>
		  <option value="get_all">Выводить список позиций</option>
			<option value="get_where">Выполнять текстовый поиск позиции</option>
		</select><br/>
	</div><!-- ВЫБОР ОПЦИЙ ДЛЯ РАБОТЫ С АБСТРАКТНЫМИ ПОЗИЦИЯМИ-->

	<!-- ТЕЛО ФОРМЫ-->
	<div id="name" class="form-group form-control-sm row col-6">
		<input class="form-control form-control-sm" type="text" name="name" placeholder="Имя товара"/><br/>
	</div>

	<div id="article" class="form-group form-control-sm row col-6">
		<input class="form-control form-control-sm" type="text" name="article" placeholder="Артикл товара"/><br/>
	</div>

	<div id="description" class="form-group form-control-sm row col-6">
		<input class="form-control form-control-sm" type="text" name="description" placeholder="Описание товара"/><br/>
	</div>


	<div id="price" class="form-group form-control-sm row col-6">
		<input class="form-control form-control-sm" type="text" name="price" placeholder="Цена товара"/><br/>
	</div>

	<div id="submit" class="form-group form-control-sm row col-6">
		<input class="btn btn-primary form-control-sm" type="submit" name="submit" value="Отправь меня!" />
	</div><!-- ТЕЛО ФОРМЫ-->

</form>


<script>
let select = document.getElementById('select');

select.addEventListener('change', function() {
  if (select.value == 'delete') {
    document.getElementById('article').style.display = "None";
	  document.getElementById('description').style.display = "None";
	  document.getElementById('price').style.display = "None";
	  document.getElementById('submit').style.display = "block";
	}
  else if (select.value == 'insert') {
  	document.getElementById('name').style.display = "block";
    document.getElementById('article').style.display = "block";
	  document.getElementById('description').style.display = "block";
	  document.getElementById('price').style.display = "block";
	  document.getElementById('submit').style.display = "block";
	}
  else if (select.value == 'get_all') {
    document.getElementById('name').style.display = "None";
    document.getElementById('article').style.display = "None";
	  document.getElementById('description').style.display = "None";
	  document.getElementById('price').style.display = "None";
	}
  else if (select.value == 'get_where') {
    document.getElementById('name').style.display = "block";
    document.getElementById('article').style.display = "None";
	  document.getElementById('description').style.display = "None";
	  document.getElementById('price').style.display = "None";
	  document.getElementById('submit').style.display = "block";
	}

});

</script> <!--СКРИПТ СМЕНЫ ПОЛЕЙ ФОРМЫ В ЗАВИСИМОСТИ ОТ ВЫБРАННЫХ ОПЦИЙ -->

</body>
</html>
