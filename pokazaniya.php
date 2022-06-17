
<html>
    <title>
        Новозор.комунальные.сети
      </title>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=4.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style_shetchic.css">

    </head>
        <body>
            <div class="topnav">
                <div class = "ssilki">
                <a class="active" href="index.html">Главная</a>
                <a href="naselen.html">Населению</a>
                <a href="onas.html">О нас</a>
                <a href="yslugi.html">Наши услуги</a>
              </div>
                          <div class="sotseti">
                              <a class="sotseti1" href="mailto:pasha.chumakov.2016@mail.ru"><img src="images/mail.png" width="20" height="20" style="padding-top:6px; padding-bottom: 7px;"></a>
                          </div>


              </div>
              <div class="form">
                <form action="pokazaniya.php" method="post">

                    <p class="textmath">За какой месяц: </p>

                    <input type="text" class="form-control_math" name="math" value="<?php echo @$_POST['math'];?>"><br><br><br>

                    <p class="text_control_data_snatiya">Дата снятия показаний:</p> 

                    <input type="date" class="form_control_data_snatiya" name="date_snatie" value="<?php echo @$_POST['date_snatie'];?>" placeholder="Введите дату снятия"><br><br><br>
                    <input type="text" class="form-control" name="name" value="<?php echo @$_POST['name'];?>" placeholder="Введите ваше имя"><br><br><br>
                    <input type="text" class="form-control" name="last_name" value="<?php echo @$_POST['last_name'];?>" placeholder="Введите вашу фамилию"><br><br><br>
                    <input type="text" class="form-control" name="patronymic" value="<?php echo @$_POST['patronymic'];?>" placeholder="Введите ваше отчество"><br><br><br>
                    <input type="text" class="form-control" name="adres" value="<?php echo @$_POST['adres'];?>" placeholder="Введите ваш адрес"><br><br>
                    <p class="text">Санузел</p>
                    <input type="number" class="form-control" name="san_voda_pr" value="<?php echo @$_POST['san_voda_pr'];?>" placeholder="Введите предыдущие показания счетчиков "><br><br>
                    <input type="number" class="form-control" name="san_dvoda_tek" value="<?php echo @$_POST['san_dvoda_tek'];?>" placeholder="Введите текущие показания счетчиков"><br><br>
                    <p class="text">Кухня               (если у вас совмещен санузел с кухней необходимо написать в данные колонки "00000")</p>
                    <input type="number" class="form-control" name="kuh_voda_pr" value="<?php echo @$_POST['kuh_voda_pr'];?>" placeholder="Введите предыдущие показания счетчиков"><br><br>
                    <input type="number" class="form-control" name="kuh_voda_tek" value="<?php echo @$_POST['kuh_voda_tek'];?>" placeholder="Введите текущие показания счетчиков"><br>
                    <button class="sumbitotpravka" type="submit" name="authorization">Отправить показания</button>

    <?php

$mysql = new mysqli('localhost','root','root','pokaz');

    $math = filter_var (trim($_POST['math']),
    FILTER_SANITIZE_STRING);

    $date_snatie = filter_var (trim($_POST['date_snatie']),
    FILTER_SANITIZE_STRING);

    $name = filter_var (trim($_POST['name']),
    FILTER_SANITIZE_STRING);

    $last_name = filter_var (trim($_POST['last_name']),
    FILTER_SANITIZE_STRING);

    $patronymic = filter_var (trim($_POST['patronymic']),
    FILTER_SANITIZE_STRING);

    $adres = filter_var (trim($_POST['adres']),
    FILTER_SANITIZE_STRING);

    $san_voda_pr = filter_var (trim($_POST['san_voda_pr']),
    FILTER_SANITIZE_STRING);
    
    $san_dvoda_tek = filter_var (trim($_POST['san_dvoda_tek']),
    FILTER_SANITIZE_STRING);

    $kuh_voda_pr = filter_var (trim($_POST['kuh_voda_pr']),
    FILTER_SANITIZE_STRING);

    $kuh_voda_tek = filter_var (trim($_POST['kuh_voda_tek']),
    FILTER_SANITIZE_STRING);

if(trim($math)!="Январь"&trim($math)!="Февраль"&trim($math)!="Март"&trim($math)!="Апрель"&trim($math)!="Май"&trim($math)!="Июнь"&
trim($math)!="Июль"&trim($math)!="Август"&trim($math)!="Сентябрь"&trim($math)!="Октябрь"&trim($math)!="Ноябрь"&trim($math)!="Декабрь")
{echo '<center><p style="color:red">Месяц который вы указали не действителен</p>';
exit();
}

else if(mb_strlen($date_snatie)>10){
    echo '<center><p style="color:red">Слишком длинная дата</p></center>';
    exit();
    }


    else if(mb_strlen($date_snatie)>10||trim($date_snatie)==''){
        echo '<center><p style="color:red">Необходимо заполнить дату</p></center>';
        exit();
    }

else if(mb_strlen($name)>20){
    echo '<center><p style="color:red">Слишком длинное имя</p></center></center>';
    exit();
    }

    else if (trim($name)==''){
        echo '<center><p style="color:red">Необходимо заполнить имя</p></center>';
        exit();
    } 
        
        else if(mb_strlen($last_name)>30){
            echo '<center><p style="color:red">Слишком длинная фамилия</p></center>';
        exit();
        }
        else if (trim($last_name)==''){
            echo '<center><p style="color:red">Необходимо заполнить фамилию</p></center>';
            exit();
        }

        else if(mb_strlen($patronymic)>30){
            echo '<center><p style="color:red">Слишком длинное отчество</p></center>';
            exit();
            }

            
        else if(trim($patronymic)==''){
            echo '<center><p style="color:red">Необходимо заполнить отчество</p></center>';
            exit();
            }
            else if(mb_strlen($adres)>50){
                echo '<center><p style="color:red">Слишком длинный адрес</p></center>';
                exit();
                }

                else if(trim($adres)==''){
                    echo '<center><p style="color:red">Необходимо заполнить адрес</p></center>';
                    exit();
                    }

    else if(mb_strlen($san_voda_pr)>5||mb_strlen($san_voda_pr)<5){
        echo '<center><p style="color:red">Показания счетчика должны состоять из 5 цифр</p></center>';
        exit();
        }
        else if(mb_strlen($san_dvoda_tek)>5||mb_strlen($san_dvoda_tek)<5){
            echo '<center><p style="color:red">Показания счетчика должны состоять из 5 цифр</p></center>';
            exit();
            }
            else if(mb_strlen($kuh_voda_pr)>5||mb_strlen($kuh_voda_pr)<5){
                echo '<center><p style="color:red">Показания счетчика должны состоять из 5 цифр</p></center>';
                exit();
                }
                else if(mb_strlen($kuh_voda_tek)>5||mb_strlen($kuh_voda_tek)<5){
                    echo '<center><p style="color:red">Показания счетчика должны состоять из 5 цифр</p></center>';
                    exit();
                    }
                    else{
                        echo '<center><p style="color:green">Показания были отправлены!</p></center>';
                    }


$mysql -> query("INSERT INTO `pokazaniya` (`math`, `date_snatie`, `name`, `last_name`, `patronymic`, `adres`, `san_voda_pr`, `san_dvoda_tek`, `kuh_voda_pr`, `kuh_voda_tek`)
VALUES('$math', '$date_snatie', '$name', '$last_name', '$patronymic', '$adres', '$san_voda_pr', '$san_dvoda_tek', '$kuh_voda_pr', '$kuh_voda_tek')");
$mysql ->close();
opcache_reset();
 ?>                
                    </form>
                </div>
                <div class="infosite">
                </div>           
            </body>
             
</html>













