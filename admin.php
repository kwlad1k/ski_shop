<?php
$x = new mysqli("localhost", "root", "", "ski_shop");
session_start();
ob_start();
if($_SESSION['status']==1){
    if(isset($_GET['type'])&&($_GET['type']=='del'))
    {
       $sql="DELETE FROM `goods` WHERE `goods`.`id` = ".$_GET['id'];
        $x->query($sql);
        echo "Товар удален";
    }
}



if($_SESSION['status']==1){

    if(isset($_POST['name_edit']))
    {

		
        $sql="UPDATE `goods` SET `name` = '".$_POST['name_edit']."', `description` = '".$_POST['description']."', `price` = '".$_POST['price']."'
		WHERE `id` = '".$_GET['id']."'";
        $x->query($sql);
        echo 'Обновление успешно';
    }
    
    if(isset($_GET['type'])&&($_GET['type']=='edit'))
    {

        echo "Редактирование";

        $sql="select * FROM `goods` WHERE `goods`.`id` = ".$_GET['id'];
        $goods_edit = $x->query($sql);
        $goods_edit_m = $goods_edit->fetch_assoc();

       echo '<form method="post" enctype="multipart/form-data">
    <input type="text" name="name_edit" value="'.$goods_edit_m['name'].'">
    <input type="text" name="description"  value="'.$goods_edit_m['description'].'">
    <input type="text" name="price"  value="'.$goods_edit_m['price'].'">
    <input type="file" name="pic">
    <input type="submit">
</form>';
    }
}


if(isset($_GET['logout'])){
	 $_SESSION['status']=0; 
header('Location: index.php');
exit;
 
}

if(isset($_POST['login'])){
    $user_log = $_POST['login'];
    $auth = $x->query("select * from `users` where `login` = '$user_log' ");
    $auth_m = $auth->fetch_assoc();
    if(($_POST['login']===$auth_m['login'])&&($_POST['pass']===$auth_m['pass'])){
        $_SESSION['status']=1;
        echo 'Авторизация успешна!';
    }
    else {
        $_SESSION['status']=0;
        echo 'Авторизация не успешна!';
    }
}

if($_SESSION['status']==1){
if(isset($_POST['name'])){

    move_uploaded_file($_FILES['pic']['tmp_name'], "assets/img/catalog/".$_FILES['pic']['name']);

    $sql="INSERT INTO `goods` (`id`, `name`, `description`, `price`, `pic`)
	VALUES (NULL, '".$_POST['name']."', '".$_POST['description']."', '".$_POST['price']."', '".$_FILES['pic']['name']."');";
    $add = $x->query($sql);
    echo "Товар добавлен в каталог!";
}

echo '<br><br>Добавить новый товар:<form method="post" enctype="multipart/form-data">
    <input type="text" name="name">
    <input type="text" name="description">
    <input type="text" name="price">
    <input type="file" name="pic">
    <input type="submit">
</form>
<form>
<input type="submit" name="logout" value="Выход">
</form>
<form action="index.php" method="post">              
                <input type="submit" value  = "Изменение записей">';

}
else {echo "вы вышли или не залогинились";}
?>
