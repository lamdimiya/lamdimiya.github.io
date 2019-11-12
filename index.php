<?php session_start(); ?>
<?php 
  include("db.php");
  if (isset($_POST['submitLog'])){
    $getName = $_POST['name'];
    $getPass = $_POST['pass'];
    $result = mysqli_query($connect, "SELECT * FROM `users` WHERE `name` = '$getName' && `pass` = '$getPass' LIMIT 1");
      if(mysqli_num_rows($result) > 0){
        if($result_fetch = mysqli_fetch_assoc($result)){
          $admin = $result_fetch['admin'];  
        }
          $_SESSION['name'] = $getName;
          $_SESSION['pass'] = $getPass;
          $_SESSION['admin'] = $admin;
      }
  }

  if (isset($_POST['submitReg'])){
    $getName = $_POST['name'];
    $getPass = $_POST['pass'];
    $getEmail = $_POST['email'];
    if (empty($getName) || empty($getPass) || empty($getEmail)){
      return;
    }
    if($queryUser = mysqli_query($connect, "SELECT * FROM `users` WHERE `name` = '$getName'")){
        if(mysqli_num_rows($queryUser)>0){
            header('location:index.php?isset');
            exit(); 
        }
    }
   mysqli_query($connect, "INSERT INTO `users` (`name`,`pass`,`email`) VALUES('$getName','$getPass', '$getEmail')");
    $_SESSION['name'] = $getName;
    $_SESSION['pass'] = $getPass;
    $_SESSION['email'] = $getEmail;
    $_SESSION['admin'] = 0;

  }
?>
<?php 
  if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0){
    header('location:index.php');
  }
?>

<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=sssssssss&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Jura&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="slider.css">
	<script src="signup.js"></script>
	<script src="slider.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<header>
	<nav>
		<div class="imglogo">
			<a href="vk.com">
			<img src="img/yorna.png" class="logo">
			<img src="img/yorna2.png" class="logo2">
			</a>
		</div>
		<ul>
			<li><a href="">о кинотеатре</a></li>
			<li><a href="">репертуар</a></li>
			<li><a href="">фильмотека</a></li>
			<li><a href="">события</a></li>
			<li><a href="">залы</a></li>
			<li><a href="">контакты</a></li>
		</ul>
		</nav>
    <?php 
      if(isset($_SESSION['name'])){
        echo "<span>".$_SESSION['name']."</span>";
        echo '<div> <a href="logout.php">LOGOUT</a></div>';
      }
    ?>

		<!-- Форма регистрации--> 
<a onclick="show('block')" class="regButton"><div class="signup"><img src="img/signup.png" class=signupimg></div></a>
  <div id="gray"></div>
    <div id="window">
      <div class="login-page">
        <div class="form">
          <img class="close" src="img/close.png" onclick="show('none')">
          <?php if(isset($_GET['isset'])){
            echo '<h4 style="color:#b90000; position:relative;top:-20px;"> User already registered </h4>';
          }?>
          <form class="registration-form" action="" method="POST">
            <input type="text" name="name" placeholder="username">
            <input type="password" name="pass" placeholder="password">
            <input type="text" name="email" placeholder="email id">
            <input type="submit" name="submitReg" class="button" value="Зарегестрироваться">
            <p class="message">Already Registered? <a href="#">Login</a></p>
          </form>

          <form class="login-form" action="" method="POST">
            <input type="text" name="userN" placeholder="username">
            <input type="password" name="userP" placeholder="password">
            <input type="submit" name="submitLog" class="button" value="Войти">
            <p class="message">
              Not Registered? <a href="#">Register</a>
            </p>
          </form>
        </div>
      </div>
    </div>


<!--Конец-->

	
</header>


<!-- SLIDER-->
<center>
<div id="slider" class="slider">
    <ol class="slider__indicators">
      <li class="slider__indicator slider__indicator_active" data-slide-to="0"></li>
      <li class="slider__indicator" data-slide-to="1"></li>
      <li class="slider__indicator" data-slide-to="2"></li>
      <li class="slider__indicator" data-slide-to="3"></li>
    </ol>

    <div class="slider__items">
      <div class="slider__item slider__item_active">
        <video class="video" preload loop controls> <source type="video/mp4" src="video/vid.mp4"></video>	
      </div>
      <div class="slider__item">
        <video class="video" preload loop controls> <source type="video/mp4" src="video/vid2.mp4"></video>	
      </div>
      <div class="slider__item">
        <video class="video" preload loop controls> <source type="video/mp4" src="video/vid3.mp4"></video>	
      </div>
      <div class="slider__item">
        <video class="video" preload loop controls> <source type="video/mp4" src="video/vid4.mp4"></video>	
      </div>
    </div>
    <a class="slider__control slider__control_prev" href="#" role="button"></a>
    <a class="slider__control slider__control_next" href="#" role="button"></a>
  </div></center>
  <!-- END -->


<footer class="footer">
	<div class="container-f">

		<div class="row">
			<div class="col-left">

				<div class="phone">
					<span class="telephone">+(38) 050-212-11-23</span>
				</div>

				<div class="mail">
					<a class="link" href="mailto:sales@yorna.com">
						<span class="underline" itemprop="email">sales@yorna.com</span>
					</a>
				</div>

			</div>
		
			<div class="col-center">
				<div class="address">
					<span class="underline">Улица казанова дом 2.</span>
				</div>
			</div>
		</div>
			
				<div class="copy">
					<span> © Кинотеатр «Yorna».Все права защищены.</span>
				</div>
				<div class="design">
					<span> Сделано мною лично</span>
				</div>	
			
	</div>
</footer>
<div class="container-end container">
<div class="vspace-40"></div>
<div>
<p>Ценителей качества во всех его проявлениях приглашает погрузиться в атмосферу роскоши и уюта, необычных декораций и нетрадиционных решений лучший кинотеатр столицы - «Yorna». Расположенный практически в самом сердце столицы России, он занимает часть торговой галереи гостиницы «Yorna» - воссозданного легендарного здания в шаговой доступности от Красной площади.</p>

<p>У кинотеатра нет аналогов ни по формату, ни по техническому оснащению, а также спектру услуг. К услугам посетителей 17 кинозалов разной вместимости и ресторан с открытой кухней «Прекрасное общество», заказ из которого можно получить даже во время киносеанса.</p>

<p>Кинотеатр «Yorna» уже стал одним из лучших центров для проведения светских и деловых мероприятий. Здесь проходят мировые и российские премьеры фильмов, проводятся конференции и пресс-завтраки, корпоративы и т. д.
Лучшие кинозалы – в «Yorna»</p>

<p>Таким качеством звука и изображения, которое предлагает кинотеатр, не может похвастаться ни одно заведение в России. Да и большинство кинозалов в мире не обладает аналогичными возможностями. Ультрасовременная звуковая система DOLBY ATMOS установлена в 10 залах из 17-ти, имеющихся в кинотеатре. Высококачественные экраны позволяют увидеть равномерное изображение даже из первого ряда.</p>

<p>Кинотеатр может предложить комфортабельные кинозалы для компаний из 7-9 человек. Благодаря этому просматривать кинокартины можно тесной компанией «без посторонних», одновременно наслаждаясь всеми преимуществами полноценного кинотеатра. Для постоянных клиентов кинотеатр «Yorna» подготовил ряд дополнительных услуг и интересных предложений. </p>
</div>
</div>
<script type="text/javascript"> 'use strict';
    var slider = (function (config) {

      const ClassName = {
        INDICATOR_ACTIVE: 'slider__indicator_active',
        ITEM: 'slider__item',
        ITEM_LEFT: 'slider__item_left',
        ITEM_RIGHT: 'slider__item_right',
        ITEM_PREV: 'slider__item_prev',
        ITEM_NEXT: 'slider__item_next',
        ITEM_ACTIVE: 'slider__item_active'
      }

      var
        _isSliding = false, // индикация процесса смены слайда
        _interval = 0, // числовой идентификатор таймера
        _transitionDuration = 700, // длительность перехода
        _slider = {}, // DOM элемент слайдера
        _items = {}, // .slider-item (массив слайдов) 
        _sliderIndicators = {}, // [data-slide-to] (индикаторы)
        _config = {
          selector: '', // селектор слайдера
          isCycling: true, // автоматическая смена слайдов
          direction: 'next', // направление смены слайдов
          interval: 5000, // интервал между автоматической сменой слайдов
          pause: true // устанавливать ли паузу при поднесении курсора к слайдеру
        };

      var
        // функция для получения порядкового индекса элемента
        _getItemIndex = function (_currentItem) {
          var result;
          _items.forEach(function (item, index) {
            if (item === _currentItem) {
              result = index;
            }
          });
          return result;
        },
        // функция для подсветки активного индикатора
        _setActiveIndicator = function (_activeIndex, _targetIndex) {
          if (_sliderIndicators.length !== _items.length) {
            return;
          }
          _sliderIndicators[_activeIndex].classList.remove(ClassName.INDICATOR_ACTIVE);
          _sliderIndicators[_targetIndex].classList.add(ClassName.INDICATOR_ACTIVE);
        },

        // функция для смены слайда
        _slide = function (direction, activeItemIndex, targetItemIndex) {
          var
            directionalClassName = ClassName.ITEM_RIGHT,
            orderClassName = ClassName.ITEM_PREV,
            activeItem = _items[activeItemIndex], // текущий элемент
            targetItem = _items[targetItemIndex]; // следующий элемент

          var _slideEndTransition = function () {
            activeItem.classList.remove(ClassName.ITEM_ACTIVE);
            activeItem.classList.remove(directionalClassName);
            targetItem.classList.remove(orderClassName);
            targetItem.classList.remove(directionalClassName);
            targetItem.classList.add(ClassName.ITEM_ACTIVE);
            window.setTimeout(function () {
              if (_config.isCycling) {
                clearInterval(_interval);
                _cycle();
              }
              _isSliding = false;
              activeItem.removeEventListener('transitionend', _slideEndTransition);
            }, _transitionDuration);
          };

          if (_isSliding) {
            return; // завершаем выполнение функции если идёт процесс смены слайда
          }
          _isSliding = true; // устанавливаем переменной значение true (идёт процесс смены слайда)

          if (direction === "next") { // устанавливаем значение классов в зависимости от направления
            directionalClassName = ClassName.ITEM_LEFT;
            orderClassName = ClassName.ITEM_NEXT;
          }

          targetItem.classList.add(orderClassName); // устанавливаем положение элемента перед трансформацией
          _setActiveIndicator(activeItemIndex, targetItemIndex); // устанавливаем активный индикатор

          window.setTimeout(function () { // запускаем трансформацию
            targetItem.classList.add(directionalClassName);
            activeItem.classList.add(directionalClassName);
            activeItem.addEventListener('transitionend', _slideEndTransition);
          }, 0);

        },
        // функция для перехода к предыдущему или следующему слайду
        _slideTo = function (direction) {
          var
            activeItem = _slider.querySelector('.' + ClassName.ITEM_ACTIVE), // текущий элемент
            activeItemIndex = _getItemIndex(activeItem), // индекс текущего элемента 
            lastItemIndex = _items.length - 1, // индекс последнего элемента
            targetItemIndex = activeItemIndex === 0 ? lastItemIndex : activeItemIndex - 1;
          if (direction === "next") { // определяем индекс следующего слайда в зависимости от направления
            targetItemIndex = activeItemIndex == lastItemIndex ? 0 : activeItemIndex + 1;
          }
          _slide(direction, activeItemIndex, targetItemIndex);
        },
        // функция для запуска автоматической смены слайдов в указанном направлении
        _cycle = function () {
          if (_config.isCycling) {
            _interval = window.setInterval(function () {
              _slideTo(_config.direction);
            }, _config.interval);
          }
        },
        // обработка события click
        _actionClick = function (e) {
          var
            activeItem = _slider.querySelector('.' + ClassName.ITEM_ACTIVE), // текущий элемент
            activeItemIndex = _getItemIndex(activeItem), // индекс текущего элемента
            targetItemIndex = e.target.getAttribute('data-slide-to');

          if (!(e.target.hasAttribute('data-slide-to') || e.target.classList.contains('slider__control'))) {
            return; // завершаем если клик пришёлся на не соответствующие элементы
          }
          if (e.target.hasAttribute('data-slide-to')) {// осуществляем переход на указанный сдайд 
            if (activeItemIndex === targetItemIndex) {
              return;
            }
            _slide((targetItemIndex > activeItemIndex) ? 'next' : 'prev', activeItemIndex, targetItemIndex);
          } else {
            e.preventDefault();
            _slideTo(e.target.classList.contains('slider__control_next') ? 'next' : 'prev   ');
          }
        },
        // установка обработчиков событий
        _setupListeners = function () {
          // добавление к слайдеру обработчика события click
          _slider.addEventListener('click', _actionClick);
          // остановка автоматической смены слайдов (при нахождении курсора над слайдером)
          if (_config.pause && _config.isCycling) {
            _slider.addEventListener('mouseenter', function (e) {
              clearInterval(_interval);
            });
            _slider.addEventListener('mouseleave', function (e) {
              clearInterval(_interval);
              _cycle();
            });
          }
        };

      // init (инициализация слайдера)
      for (var key in config) {
        if (key in _config) {
          _config[key] = config[key];
        }
      }
      _slider = (typeof _config.selector === 'string' ? document.querySelector(_config.selector) : _config.selector);
      _items = _slider.querySelectorAll('.' + ClassName.ITEM);
      _sliderIndicators = _slider.querySelectorAll('[data-slide-to]');
      // запуск функции cycle
      _cycle();
      _setupListeners();

      return {
        next: function () { // метод next 
          _slideTo('next');
        },
        prev: function () { // метод prev 
          _slideTo('prev');
        },
        stop: function () { // метод stop
          clearInterval(_interval);
        },
        cycle: function () { // метод cycle 
          clearInterval(_interval);
          _cycle();
        }
      }
    }({
      selector: '.slider',
      isCycling: true,
      direction: 'next',
      interval: 5000,
      pause: true
    }));</script>

<script type="text/javascript">
  $('.message a').click(function() {
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
  });
</script>
<script type="text/javascript">
  function show(state) {
    document.getElementById('window').style.display = state;
    document.getElementById('gray').style.display = state;
  }
</script>
</body>
</html>