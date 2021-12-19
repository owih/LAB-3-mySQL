<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "root", "", "courses");

if ($link == false){
    $no = "Ошибка: Невозможно подключиться к MySQL "; 
    mysqli_connect_error();
}
else {
    $yes = "Соединение установлено успешно";
}

$courses = 'SELECT id, name, duration, price, image, teacher_id FROM `courses`';
$teacher = 'SELECT id, first_name, last_name, describtion, birthday, rank_id FROM `teacher`';
$student = 'SELECT id, first_name, last_name, birthday, isPaid FROM `student`';
$student_course = 'SELECT id, student_id, course_id FROM `student_course`';
$teacher_rank = 'SELECT id, name FROM `teacher_rank`';
$type_of_reporting = 'SELECT id, name, course_id FROM `type_of_reporting`';

$name = $_POST['name'];
$priceValue = $_POST['price'];

switch ($_POST['table']) {
    case "courses":
        $sql = $courses;
        $say = "courses";
        if ($name && $priceValue)
        {
            $data = "SELECT * FROM `courses` WHERE `price` LIKE ('%".$priceValue."%') AND `name` LIKE ('%".$name."%')";
            echo $data;
        } else if ($name)
        {
            $data = "SELECT * FROM `courses` WHERE `name` LIKE ('%".$name."%')";
            echo $name;
            echo $data;
        } else if ($priceValue) 
        {
            $data = "SELECT * FROM `courses` WHERE `price` LIKE ('%".$priceValue."%')";
            echo $name;
            echo $data;
        }
        break;
    case "teacher":
        $sql = $teacher;
        $say = "teacher";
        $data = "SELECT * FROM `teacher` WHERE `first_name` LIKE ('%".$name."%') or `last_name` LIKE ('%".$name."%')";
        break;
    case "student":
        $sql = $student;
        $say = "student";
        $data = "SELECT * FROM `student` WHERE `first_name` LIKE ('%".$name."%') or `last_name` LIKE ('%".$name."%')";
        break;
    case "student_course":
        $sql = $student_course;
        $say = "student_course";
        break;
    case "teacher_rank":
        $sql = $teacher_rank;
        $say = "teacher_rank";
        break;
    default:
    $say = "Выберите таблицу из списка";
}

if ($sql) 
{
    $result = mysqli_query($link, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if ($data)
    {
        $result2 = mysqli_query($link, $data);
        $rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>База данных!</title>
  </head>
  <body>
    <div class="wrapper" id="wrapper">
        <header class="header">
            <div class="container-header">
                <button type="submit" class="fa fa-search">
                </button>
                <div class="menu__search">
                </div>
                <div class="header__logo">
                    <a href="#">coursera</a>
                </div>
                <div class="menu__icon">
                    <span></span>
                </div>
                <div class="header__row">
                    <div class="header__left-list burger">
                        <div class="header__down-menu">
                            <span>
                                Изучить
                            </span>
                        </div>
                        <div class="header__search">
                            <form>
                            <input type="text" placeholder="Чему вы хотите научиться?">
                            <button type="submit" class="fas fa-search">
                            </button>
                        </form>
                        </div>
                    </div>
                    <div class="header__right-menu burger">
                        <ul class="right-list">
                            <li>
                                <a href="#">Для организаций</a>
                            </li>
                            <li><a href="#">Для студентов</a></li>
                            <li><a href="#">
                                <span>
                                    Войти
                                </span>
                            </a></li>
                            <li>
                                <a href="#" class="link__button">Присоединиться бесплатно</a>
                            </li>
                        </ul>
                    </div>
                    <div class="navigation__panel_active">
                        <div class="about-project">
                            <a data-goto=".about" href="#" class="menu__link">
                                О проекте
                            </a>
                        </div>
                        <div class="teachers">
                            <a data-goto=".teacher" class="menu__link" href="#">
                                Преподаватели
                            </a>
                        </div>
                        <div class="questions">
                            <a href="#" class="menu__link" data-goto="sec2">
                                Программа курса
                            </a>
                        </div>
                        <div class="questions" class="menu__link" data-goto="sec2">
                            <a href="#">
                                Рецензии
                            </a>
                        </div>
                        <div class="questions" class="menu__link" data-goto="sec2">
                            <a href="#">
                                Параметры регистрации
                            </a>
                        </div>
                        <div class="questions"> 
                            <a href="#" data-goto="sec2" class="menu__link">
                                Часто задаваемые вопросы
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="my-5">
            <main class="main py-5">
                <div class="container">
                    <h3 class="pb-2">Форма выбора</h3>
                    <form action="#" method="post">
                        <div class="row align-items-center justify-content-center border px-3 py-4">
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                              <label for="select" class="form-label">Таблица</label>
                              <select class="form-select" id="select" name="table" aria-label="Default select example">
                                <option value="null" selected>Открыть список</option>
                                <option value="courses">Courses</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                                <option value="student_course">Student_course</option>
                                <option value="teacher_rank">Teacher_rank</option>
                              </select>
                              </div>
                            <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                                <label for="name" class="form-label">Поиск по имени</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя">
                              </div>
                              <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                                  <label for="price" class="form-label">Цена курса</label>
                                  <input type="number" class="form-control" id="price" name="price" aria-describedby="emailHelp" placeholder="Если выбрана таблица 'price'">
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                        <button type="submit" class="btn btn-primary w-100"><u>Получить результат</u></button>
                                    </div>
                                    <div class="col-12 col-lg-3 mb-3 mb-lg-0">
                                        <a href="bd.php" class="text-light revert-link">Обновить</a>
                                    </div>
                                    <div class="col-12 col-lg-3 mb-3 mb-lg-0">
                                    <button type="button" class="btn btn-secondary w-100" data-toggle="tooltip" data-placement="right" title="При выборе определенноый таблицы, открывается возможность выбора определенного поля для поиска по нужным критериям. В таблице Courses можно производить поиск по имени стоимости курса В таблице Student и Teacher по имени">
                                Справка (наведите)
                                </button>
                                    </div>
                              <style type="text/css">
                                .revert-link {
                                    text-align: center;
                                    padding: 7px 20px;
                                    background: red;
                                    border-radius: 0.25rem;
                                    width: 100%;
                                    display: block;
                                }
                              </style>
                              </div>
                        </div>
                      </form>
                      <h3 class="mt-5 mb-3">Результат</h3>
                      <div class="pb-3">
                          <? if ($_POST['table'] !== "null" && $_POST['table'])
                          {
                           echo "Выбрана таблица: " . $say;
                          }
                          else if ($_POST['table'] == "null" && !$name || !$_POST['table'])
                          {
                            echo "Выберите таблицу";
                          }
                          else
                          {
                            echo "Выберите таблицу";
                          }
                          ?>
                      </div>
                        <?php if (($say == "courses") && is_array($rows) || is_object($rows))
                        {
                            ?>
                            <table class="table">
                            <thead>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">duration</th>
                            <th scope="col">price</th>
                            <th scope="col">image</th>
                            <th scope="col">teacher</th>
                            </thead>
                            <tbody>
                            <?
                            foreach ($rows as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td>' . $row['duration'] . ' months' . '</td>';
                                echo '<td>' . $row['price'] . ' руб</td>';
                                echo '<td>' . '<img src=' . $row['image'] . ' width="28">' . '</td>';
                                echo '<td>' . $row['teacher_id'] . '</td>';
                                echo '<tr>';                
                            }
                            ?>
                            </tbody>
                            </table>
                            <?
                        }
                            ?>


                            <?php if (($say == "courses") && is_array($rows2) && $name && $priceValue|| is_object($rows2))
                        {
                            ?>
                        <div class="py-2">
                        <?php 
                            if ($_POST['table'] !== "null" && $_POST['table'] && $name && $priceValue) 
                            {
                                echo '<h3>Результат поиска по имени и цене курса</h3>';
                                echo 'Произведен поиск по таблице: ' . $say . ', с запросом: "' . $name . '" + "' . $priceValue . '"';
                            } 
                        ?>
                        </div>             
                            <table class="table">
                            <thead>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">duration</th>
                            <th scope="col">price</th>
                            <th scope="col">image</th>
                            <th scope="col">teacher</th>
                            </thead>
                            <tbody>
                            <?
                            foreach ($rows2 as $row2) {
                                echo '<tr>';
                                echo '<td>' . $row2['id'] . '</td>';
                                echo '<td>' . $row2['name'] . '</td>';
                                echo '<td>' . $row2['duration'] . ' months' . '</td>';
                                echo '<td>' . $row2['price'] . ' руб</td>';
                                echo '<td>' . '<img src=' . $row2['image'] . ' width="28">' . '</td>';
                                echo '<td>' . $row2['teacher_id'] . '</td>';
                                echo '<tr>';                
                            }
                            ?>
                            </tbody>
                            </table>
                            <?
                        } else if (($say == "courses") && is_array($rows2) && $priceValue || is_object($rows2))
                        {
                            ?>
                            <div class="py-2">
                        <?php 
                            if ($_POST['table'] !== "null" && $_POST['table'] && $priceValue) 
                            {
                                echo '<h3>Результат поиска по цене курса</h3>';
                                echo 'Произведен поиск по таблице: ' . $say . ', с запросом: "' . $priceValue . '"';
                            } 
                        ?>
                        </div>             
                            <table class="table">
                            <thead>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">duration</th>
                            <th scope="col">price</th>
                            <th scope="col">image</th>
                            <th scope="col">teacher</th>
                            </thead>
                            <tbody>
                            <?
                            foreach ($rows2 as $row2) {
                                echo '<tr>';
                                echo '<td>' . $row2['id'] . '</td>';
                                echo '<td>' . $row2['name'] . '</td>';
                                echo '<td>' . $row2['duration'] . ' months' . '</td>';
                                echo '<td>' . $row2['price'] . ' руб</td>';
                                echo '<td>' . '<img src=' . $row2['image'] . ' width="28">' . '</td>';
                                echo '<td>' . $row2['teacher_id'] . '</td>';
                                echo '<tr>';                
                            }
                            ?>
                            </tbody>
                            </table>
                            <?
                            } else if (($say == "courses") && is_array($rows2) && $name || is_object($rows2))
                            {
                                ?>
                                <div class="py-2">
                            <?php 
                                if ($_POST['table'] !== "null" && $_POST['table'] && $name ) 
                                {
                                    echo '<h3>Результат поиска по имени курса</h3>';
                                    echo 'Произведен поиск по таблице: ' . $say . ', с запросом: "' . $name . '"';
                                } 
                            ?>
                            </div>             
                                <table class="table">
                                <thead>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">duration</th>
                                <th scope="col">price</th>
                                <th scope="col">image</th>
                                <th scope="col">teacher</th>
                                </thead>
                                <tbody>
                                <?
                                foreach ($rows2 as $row2) {
                                    echo '<tr>';
                                    echo '<td>' . $row2['id'] . '</td>';
                                    echo '<td>' . $row2['name'] . '</td>';
                                    echo '<td>' . $row2['duration'] . ' months' . '</td>';
                                    echo '<td>' . $row2['price'] . ' руб</td>';
                                    echo '<td>' . '<img src=' . $row2['image'] . ' width="28">' . '</td>';
                                    echo '<td>' . $row2['teacher_id'] . '</td>';
                                    echo '<tr>';                
                                }
                                ?>
                                </tbody>
                                </table>
                                <?
                                }
                            ?>
                        
                            <?php if (($say == "teacher") && is_array($rows) || is_object($rows))
                        {
                            ?>
                            <table class="table">
                            <thead>
                            <th scope="col">#</th>
                            <th scope="col">first_name</th>
                            <th scope="col">last_name</th>
                            <th scope="col">describtion</th>
                            <th scope="col">birthday</th>
                            <th scope="col">rank_id</th>
                            </thead>
                            <tbody>
                            <?
                            foreach ($rows as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['first_name'] . '</td>';
                                echo '<td>' . $row['last_name']  . '</td>';
                                echo '<td>' . $row['describtion'] . '</td>';
                                echo '<td>' . $row['birthday'] . '</td>';
                                echo '<td>' . $row['rank_id'] . '</td>';
                                echo '<tr>';                
                            }
                            ?>
                            </tbody>
                            </table>
                            <?
                        }
                            ?>

                            <?php if (($say == "teacher") && is_array($rows2) && $name || is_object($rows2))
                        {
                            ?>
                        <div class="py-2">
                            <?php 
                                if ($_POST['table'] !== "null" && $_POST['table'] && $name) 
                                {
                                    echo '<h3>Результат поиска по имени</h3>';
                                    echo 'Произведен поиск по таблице: ' . $say . ', с запросом: "' . $name . '"';
                                } 
                            ?>
                        </div>    
                            <table class="table">
                            <thead>
                            <th scope="col">#</th>
                            <th scope="col">first_name</th>
                            <th scope="col">last_name</th>
                            <th scope="col">describtion</th>
                            <th scope="col">birthday</th>
                            <th scope="col">rank_id</th>
                            </thead>
                            <tbody>
                            <?
                            foreach ($rows2 as $row2) {
                                echo '<tr>';
                                echo '<td>' . $row2['id'] . '</td>';
                                echo '<td>' . $row2['first_name'] . '</td>';
                                echo '<td>' . $row2['last_name']  . '</td>';
                                echo '<td>' . $row2['describtion'] . '</td>';
                                echo '<td>' . $row2['birthday'] . '</td>';
                                echo '<td>' . $row2['rank_id'] . '</td>';
                                echo '<tr>';                
                            }
                            ?>
                            </tbody>
                            </table>
                            <?
                        }
                            ?>


                            <?php if (($say == "student") && is_array($rows) || is_object($rows))
                        {
                            ?>
                            <table class="table">
                            <thead>
                            <th scope="col">#</th>
                            <th scope="col">first_name</th>
                            <th scope="col">last_name</th>
                            <th scope="col">birthday</th>
                            <th scope="col">isPaid</th>
                            </thead>
                            <tbody>
                            <?
                            foreach ($rows as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['first_name'] . '</td>';
                                echo '<td>' . $row['last_name'] . '</td>';
                                echo '<td>' . $row['birthday'] . '</td>';
                                echo '<td>' . $row['isPaid'] . '</td>';
                                echo '<tr>';                
                            }
                            ?>
                            </tbody>
                            </table>
                            <?
                        }
                            ?>

                            <?php if (($say == "student") && is_array($rows2) && $name || is_object($rows2))
                        {
                            ?>
                        <div class="py-2">
                            <?php 
                                if ($_POST['table'] !== "null" && $_POST['table'] && $name) 
                                {
                                    echo '<h3>Результат поиска по имени</h3>';
                                    echo 'Произведен поиск по таблице: ' . $say . ', с запросом: "' . $name . '"';
                                } 
                            ?>
                        </div>   
                            <table class="table">
                            <thead>
                            <th scope="col">first_name</th>
                            <th scope="col">last_name</th>
                            <th scope="col">birthday</th>
                            <th scope="col">isPaid</th>
                            </thead>
                            <tbody>
                            <?
                            foreach ($rows2 as $row2) {
                                echo '<tr>';
                                echo '<td>' . $row2['id'] . '</td>';
                                echo '<td>' . $row2['first_name'] . '</td>';
                                echo '<td>' . $row2['last_name'] . '</td>';
                                echo '<td>' . $row2['birthday'] . '</td>';
                                echo '<td>' . $row2['isPaid'] . '</td>';
                                echo '<tr>';                
                            }
                            ?>
                            </tbody>
                            </table>
                            <?
                        }
                            ?>
                            <?php if (($say == "student_course") && is_array($rows) || is_object($rows))
                        {
                            ?>
                            <table class="table">
                            <thead>
                            <th scope="col">#</th>
                            <th scope="col">student_id</th>
                            <th scope="col">course_id</th>
                            </thead>
                            <tbody>
                            <?
                            foreach ($rows as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['student_id'] . '</td>';
                                echo '<td>' . $row['course_id']  . '</td>';
                                echo '<tr>';                
                            }
                            ?>
                            </tbody>
                            </table>
                            <?
                        }
                            ?>

                            <?php if (($say == "teacher_rank") && is_array($rows) || is_object($rows))
                        {
                            ?>
                            <table class="table">
                            <thead>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            </thead>
                            <tbody>
                            <?
                            foreach ($rows as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<tr>';                
                            }
                            ?>
                            </tbody>
                            </table>
                            <?
                        }
                            ?>

                            <?php if (($say == "type_of_reporting") && is_array($rows) || is_object($rows))
                        {
                            ?>
                            <table class="table">
                            <thead>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">course_id</th>
                            </thead>
                            <tbody>
                            <?
                            foreach ($rows as $row) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td>' . $row['course_id']  . '</td>';
                                echo '<tr>';                
                            }
                            ?>
                            </tbody>
                            </table>
                            <?
                        }
                            ?>
                      <div class="mt-4">
                      <?php print($yes); ?>
                      <a href="index.html" class="bg-dark text-light revert-link mt-3">На сайт курса</a>
                      </div>
                </div>
            </main>
        </div>
        <div class="footer">
            <div class="container">
                <div class="footer__info">
                    <div class="footer__item">
                        <div class="footer__career">
                            <div class="tittle__career tittle__main">
                                Начните карьеру или продвиньтесь по карьерной лестнице
                            </div>
                            <div>
                                <a href="#">
                                    Аналитик данных Google
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Управление проектами от Google
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    UX-дизайн от Google
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    ИТ-поддержка Google
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Наука о данных IBM
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Аналитик данных от IBM
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Анализ данных с помощью Excel и R от IBM
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Аналитик по кибербезопасности от IBM
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Маркетинг в социальных сетях от Facebook
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Разработчик комплексных облачных приложений IBM
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Представитель по развитию продаж от Salesforce
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Сбытовые операции Salesforce
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Soporte de Tecnologías de la Información de Google
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Certificado profesional de Suporte em TI do Google
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    ИТ-автоматизация с помощью Python от Google
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Tensorflow от DeepLearning.AI
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Популярные сертификаты по кибербезопасности
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Популярные сертификаты по SQL
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Популярные сертификаты по ИТ
                                </a>
                            </div>                                <div>
                                <a href="#">
                                    Посмотреть все сертификаты
                                </a>
                            </div>
                        </div>
                        <div class="footer__popular-themes">
                            <div class="tittle__popular-themes tittle__main">
                                Смотреть популярные темы
                            </div>
                            <div>
                                <a href="#">
                                    бесплатные курсы
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Изучите иностранный язык
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Python
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Java
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    веб-дизайн
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    SQL
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Cursos Gratis
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Microsoft Excel
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Управление проектами
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Безопасность в киберпространстве
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Людские ресурсы
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Бесплатные курсы в области науки о данных
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    говорить на английском
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Написание контента
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Веб-разработка: полный спектр технологий
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Искусственный интеллект
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Программирование на языке C
                                </a>
                            </div>                                 <div>
                                <a href="#">
                                    Навыки общения
                                </a>
                            </div>     <div>
                                <a href="#">
                                    Блокчейн
                                </a>
                            </div>     <div>
                                <a href="#">
                                    Просмотреть все курсы
                                </a>
                            </div>   
                        </div>
                        <div class="footer__team">
                            <div class="team__tittle tittle__main">
                                Развивайте свою команду
                            </div>
                            <div>
                                <a href="#">
                                    Навыки для команд по науке о данных
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Принятие решений на основе данных
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Навыки в области программной инженерии
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Навыки межличностного общения для проектных групп
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Управленческие навыки
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Навыки в области маркетинга
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Навыки для отделов продаж
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Навыки менеджера по продукту
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Навыки в области финансов
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Проекты по разработке для Android
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Проекты по TensorFlow и Keras
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Python для всех
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Глубокое обучение
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Навыки Excel для бизнеса
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Основы бизнеса
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Машинное обучение
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Основы AWS
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Основы инженерии данных
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Навыки для аналитика данных
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Навыки для UX-дизайнеров
                                </a>
                            </div>
                        </div>
                        <div class="footer__diploma">
                            <div class="diploma__tittle tittle__main">
                                Получите диплом или сертификат онлайн
                            </div>
                            <div>
                                <a href="#">
                                    Сертификаты MasterTrack®
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Профессиональные сертификаты
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Сертификаты университетов
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    MBA и другие дипломы в области бизнеса
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Степени в области науки о данных
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Степени в области компьютерных наук 
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Дипломные программы по анализу данных
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Степени в области общественного здравоохранения
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Степени в области социальных наук
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Дипломные программы в области управления
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Дипломы ведущих европейских университетов
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Дипломы магистра
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Степени бакалавра
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Дипломы с карьерными путями, ориентированными на результат
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Бакалаврские курсы
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Что такое диплом бакалавра?
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Сколько времени нужно для получения диплома магистра?
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Стоит ли получать диплом MBA онлайн?
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    7 способов оплатить магистратуру
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Просмотреть все степени
                                </a>
                            </div>
                        </div>
                        <div class="footer__coursera">
                            <div class="coursera__tittle tittle__main">
                                Coursera
                            </div>
                            <div>
                                <a href="#">
                                    О проекте
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Что мы предлагаем
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Руководство
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Карьера
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Каталог
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Coursera Plus
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Профессиональные сертификаты
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Сертификаты MasterTrack®
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Степени
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Для организаций
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Для правительственных организаций
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Для стационара
                                </a>
                            </div>
                        </div>
                        <div class="footer__social">
                            <div class="social__tittle tittle__main">
                                Сообщество
                            </div>
                            <div>
                                <a href="#">
                                    Учащиеся
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Партнеры
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Разработчики
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Бета-тестировщики
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Переводчики
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Блог
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Технический блог
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Центр преподавания
                                </a>
                            </div>
                        </div>
                        <div class="footer__more">
                            <div class="more__tittle tittle__main">
                                Еще
                            </div>
                            <div>
                                <a href="#">
                                    Пресса
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Инвесторы
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Условия
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Конфиденциальность
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Помощь
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Доступность
    
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Контакты
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Статьи
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Справочник
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    Филиалы
                                </a>
                            </div>
                        </div>
                        <div class="footer__apps">
                            <div>
                                <a href="#"">
                                    <img src="image/icons/appstore.svg" alt="">
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <img src="image/icons/googleplay.png" alt="">
                                </a>
                            </div>
                            <div>
                                <img src="image/icons/certified.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__copy">
                    <div class="footer__copy-row">
                        <div class="footer__copy-right">
                            © Coursera Inc., 2021 Все права защищены.
                        </div>
                        <div class="footer_copy-links">
                            <ul>
                            <li>
                                <a href="#">
                                    <img src="image/icons/footer-1-facebook.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="image/icons/footer-2-instagram.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="image/icons/footer-3-twitter.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="image/icons/footer-4-youtobe.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="image/icons/footer-5-instagram.png" alt="">
                                </a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/bd.js"></script>
  </body>
</html>