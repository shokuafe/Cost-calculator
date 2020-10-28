<!doctype html>
<html lang="en">

<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="form-restyling.css">
</head>
<body>

  <?php
  require_once 'connection.php'; // подключаем скрипт считывания данных подключения

  if(isset($_POST['firstname']) && isset($_POST['date-out'])){

  // инициализация подключения к серверу
  $link = mysqli_connect($host, $user, $password, $database) //сопоставление и подстановка данных для подключения к базе данных
      or die("Ошибка " . mysqli_error($link)); //в случае введения неверных данных выдать ошибку
      // присваиваем введённые данные переменным для экранирования в SQL
      $firstname = htmlentities(mysqli_real_escape_string($link, $_POST['firstname'])); //присваивание
      $date_out = htmlentities(mysqli_real_escape_string($link, $_POST['date-out'])); //присваивание
      $date_arr = htmlentities(mysqli_real_escape_string($link, $_POST['date-arr'])); //присваивание
      $city_from_out = htmlentities(mysqli_real_escape_string($link, $_POST['city-from-out'])); //присваивание
      $city_to_in = htmlentities(mysqli_real_escape_string($link, $_POST['city-to-in'])); //присваивание
      $how_many = htmlentities(mysqli_real_escape_string($link, $_POST['how-many'])); //присваивание
      $how_many_childs = htmlentities(mysqli_real_escape_string($link, $_POST['how-many-childs'])); //присваивание
      $visit_city = htmlentities(mysqli_real_escape_string($link, $_POST['visit-city'])); //присваивание
      $options = htmlentities(mysqli_real_escape_string($link, $_POST['options'])); //присваивание
      $hotels = htmlentities(mysqli_real_escape_string($link, $_POST['hotels'])); //присваивание
      $food = htmlentities(mysqli_real_escape_string($link, $_POST['food'])); //присваивание
      $class_of_plane = htmlentities(mysqli_real_escape_string($link, $_POST['class-of-plane'])); //присваивание
      $comment = htmlentities(mysqli_real_escape_string($link, $_POST['comment'])); //присваивание
      // инициализация запроса к базе данных с отправкой присвоенных данных
      $query ="INSERT INTO turdb VALUES(NULL, '$firstname','$date_out','$date_arr','$city_from_out','$city_to_in','$how_many','$how_many_childs','$visit_city','$options','$hotels','$food','$class_of_plane','$comment')";
      // исполнение запроса к БД
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
      if($result) //проверка условия результата
      {
          echo "<span style='color:blue;'>Данные добавлены</span>"; //вывести сообщение о корректном введении всех данных
      }
      // завершение сессии подключения
      mysqli_close($link);
  }
?>

  <div class="box">
    <h2>Рассчёт стоимости</h2>
    <div class="box-inside">
      <div class="name">
      <form method="POST">
        <p>Введите имя клиента:<br>
          <input type="text" name="firstname" /></p>
          </div>
          <div class="date-out">
        <p>Дата вылета</p>
        <input type="date" name="date-out" value="">
        </div>
        <div class="date-arr">
        <p>Дата прилёта</p>
        <input type="date" name="date-arr" value="">
        </div>
        <div class="city-out">
          <p>От куда летим?</p>
          <select name="city-from-out" size="5" multiple="multiple">
            <option value="Moscow">Москва (Шереметьево)</option>
            <option value="Moscow1">Москва (Внуково)</option>
            <option value="Moscow2">Москва (Остафьево)</option>
          </select></p>
        </div>
        <div class="country">
          <p>В какую страну летим?</p>
          <select name="city-to-in" size="5" multiple="multiple">
            <option value="Kipr">Кипр</option>
          </select></p>
        </div>
        <div class="how-many">
          <label for="how-many"><p>Сколько взрослых?</p></label>
          <input type="number" name="how-many" value="" min="1"max="20">
        </p>
        </div>
        <div class="how-many-childs">
          <label for="how-many"><p>Сколько детей?</p></label>
          <input type="number" name="how-many-childs" value="" min="0" max="10">
        </p>
        </div>
        <div class="visit-city">
          <p>Город для посещения</p>
          <select name="visit-city" size="5">
            <option value="Aya-Napa">Айя-Напа</option>
            <option value="Limassol">Лимассол</option>
            <option value="Larnaka">Ларнака</option>
            <option value="Pafos">Пафос</option>
          </select></p>
        </div>
        <div class="options">
          <p>Опции</p>
          <select name="options" size="9" multiple="multiple">
            <option value="Water fun">Водные горки</option>
            <option value="Travel">Поход</option>
            <option value="Excursion">Экскурсия</option>
            <option value="Photo session">Фотосессия</option>
            <option value="Party">Вечеринка</option>
            <option value="Close air beach">Крытый пляж</option>
            <option value="SPA">СПА</option>
            <option value="Sanatory">Санаторий</option>
            <option value="Banya">Баня</option>
          </select></p>
        </div>
        <div class="hotels">
          <p>Отели</p>
          <select name="hotels" size="5" multiple="multiple">
            <option value="St. George Gardens Hotel Apartments">St. George Gardens Hotel Apartments</option>
            <option value="St. George Hotel ">St. George Hotel </option>
            <option value="Elysium">Elysium</option>
            <option value="Kefalos Beach Tourist Village">Kefalos Beach Tourist Village</option>
            <option value="Kefalos Damon Hotel Apartments">Kefalos Damon Hotel Apartments</option>
          </select></p>
        </div>
        <div class="food">
          <p>Питание</p>
          <input type="radio" name="food" value="all-in" />Всё включено <br>
          <input type="radio" name="food" value="only-breakfast" />Только завтрак </p>
        </div>
        <div class="class-of-plane">
          <p>Класс перелёта</p>
          <input type="radio" name="class-of-plane" value="class-bussiness" />Бизнес <br>
          <input type="radio" name="class-of-plane" value="class-eco" />Эконом </p>
        </div>
        <!-- <div class="total-price">
          <p>Итоговая стоимость:</p>
        </div> -->
        <div class="comment">
        <p>Краткий комментарий: <br>
          <textarea name="comment" maxlength="200"></textarea></p>
          </div>
          <div class="summ">
        <input type="submit" value="Расчитать">
        </div>
      </form>
    </div>
  </div>
</body>

</html>
