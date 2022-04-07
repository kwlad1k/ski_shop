<?php
session_start();


$x = new mysqli("localhost", "root", "", "ski_shop");

//получаем данные о бренде
$about = $x->query("SELECT * FROM `about_brend`");
$about_m = $about->fetch_assoc();

//получаем данные о магазинах
$shops = $x->query("SELECT * FROM `shops`");


//получаем данные из каталога
$goods = $x->query("SELECT * FROM `goods`");

// получаем данные по отзввам
$feedback = $x->query("SELECT * FROM `feedback` ");
$feedback_m = $about->fetch_assoc();




?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Горнолыжное снаряжение</title>
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>

    <header>
         <h1 class="stroke">Зимняя сказка</h1> 
       <h2 class="light">  Снарежение для активного снежного отдыха </h2>
    </header>

    <main>

        <section id="about">
            <div>
                <h2>О бренде</h2>
                <?= $about_m['about']; ?>
            </div>

            <div>
                <h2>История бренда</h2>
                <?= $about_m['history']; ?>
            </div>
        </section>

        <section id="catalog">
            <h2>Каталог товаров</h2>

            <div id="catalog_fx">
                <div id="catalog_fx">
                    <?php
                    while ($goods_m = $goods->fetch_assoc()) {
                        $goods_m['description'] = substr($goods_m['description'],0, 250);
                        echo "
	<div class='red'>
    <div class='card'>
    <div class='card_pic'><img src='assets/img/catalog/" . $goods_m['pic'] . "' height='300'></div>
	</div>
       <div>
    <div class='card_title'>" . $goods_m['name'] . "</div>
    <div class='card_description'>" . $goods_m['description'] . "...</div>
    <div class='card_price'>" . $goods_m['price'] . "</div>";

                        $sql="SELECT `status_name` FROM `status` WHERE `id`='".$goods_m['id_status']."'";
                        $status = $x->query($sql);
                        $status_m = $status->fetch_assoc();

    echo "<div class='card_price'>Статус: " . $status_m['status_name'] . "</div>";

                        if($_SESSION['status']==1){
                            echo "<div><a href='admin.php?type=del&id=". $goods_m['id'] ."'> удалить </a></div>";
                            echo "<div><a href='admin.php?type=edit&id=". $goods_m['id'] ."'> редактировать </a></div>";
                        }

        echo "</div>
    </div>
    ";
                    }
                    ?>
                </div>

        </section>


        <section id="feedback">
		
		<h2>Комментарии</h2><br>
		
		<?php
         
			if(isset($_POST['submit']))
{	
 if(empty($_POST['text']) && empty($_POST['comment']))	
 {echo 'пусто!!!';}
    if(!empty($_POST['text']))	
	
  {

		 $sql="INSERT INTO `feedback` ( `Name`, `feedback`) VALUES ('".$_POST['text']."', '".$_POST['comment']."');";
    $add = $x->query($sql);
    
}}
            ?>
		

		
		 <div id="center">
<form method="POST" action="index.php" enctype="multipart/form-data">  
<h3>Новый комментарии </h3>
 <p class="is-h">Автор:<br> 
<input  name="text" class="is-input" id="author"></p>           
         
<p class="is-h">Текст сообщения:<br>                                    
<textarea name="comment" rows="5" cols="50" id="message"></textarea></p>
<input  type="submit" name="submit" value="Отправить" class="is-button">                                                                          
</form>

		
		<?php 
		
		
		
		echo "<br>";
 $nsql = "SELECT * FROM feedback";
   
    $red = $x -> query($nsql);
	 if ($red -> num_rows > 0) 
	{
        while ($resfeedback = $red -> fetch_assoc()) 
		{
					echo $resfeedback['Name'];
			echo ': ';
	echo $resfeedback['feedback'];
	echo '<br>';}}	
		
		?>
		<br>
		
		</section>

        <section>
		 <h2>Авторизация</h2>
            <form action="admin.php" method="post">
                Логин: <input type="text" name="login">
                Пароль: <input type="password" name="pass">
                <input type="submit" value  = "Вход">
            </form>
        </section>
<?php
 if($_SESSION['status']==1){
	  echo "<div><a href='admin.php'> Вернуться к странице авторизации </a></div>";
 }
?>
        <section id="shops">
            <h2>Наши магазины</h2>
            <?php
            while ($shops_m = $shops->fetch_assoc()) {
                echo "<div>" . $shops_m['address'] . " " . $shops_m['tel'] . "</div>";
            }
            ?>
        </section>

    </main>

    <footer>
        &copy; контакты
    </footer>

    </body>
    </html>

<?php
$shops->free();
$about->free();
$x->close();
?>