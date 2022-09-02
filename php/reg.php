<?php
    header("Content-type: application/json");
      session_start();
    require_once 'includes/connect-db.php';

    $resp="";
    $login = $_POST['login'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $salt = mt_rand(1, 999);
    $password = $_POST['password'];
    $check_password = $_POST['check_password'];
    $avatar = $_POST['avatar'];

    $error_fields = [];
    if ($login === '') {
        $error_fields[] = "login";
    }
    if ($password === '') {
        $error_fields[] = "password";
    }
    if ($email === '') {
        $error_fields[] = "email";
    }
    if ($check_password === '') {
        $error_fields[] = "check_password";
    }
    if (!empty($error_fields)) {
        $resp ="Заполните пустые поля";


    } else{
        $query = "SELECT * FROM `user` WHERE `login`='$login'";
    $check_login = mysqli_query($connect, $query);
    $pat = "/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/";
    //$pattern = "/\^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}\$/";
    
    
    if (mysqli_num_rows($check_login) > 0) {
        $resp = "Такой логин уже существует";
        }else{
            if(preg_match($pat, $email)){
                if(strlen($password)< 3){
                $resp ="Пароль должен содержать не менее 3 символов";
            }else{
                 if ($password === $check_password) {

    
                    $password = md5(md5($password) . $salt);
                     mysqli_query($connect, "INSERT INTO `user` (`id`, `login`, `age`, `email`, `gender`, `password`, `salt`, `photo`) VALUES (NULL, '$login', '$age', '$email', '$gender', '$password', '$salt', 'account.png')");
    
                    $resp ="Регистрация прошла успешно!";
                }else {
                    $resp =  "Пароли не совпадают";   
       
                }
    
            }  
            } else{
                $resp =  "Неправильный email"; 
            }
           
        }
    }
    
   
    echo json_encode(['message'=> $resp] );








    // for($i=0; $i<mysqli_num_rows($result); $i++){

    //     if($login != mysqli_fetch_array($result)[0]){
    //         if($password === $check_password){
    
    //             $password = md5(md5($password) . $salt);
       
        

        
    
        
    //             $path = '../img/users/'.time().$_FILES['avatar']['name'];
        
    //             if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $path)){
    //                 $_SESSION['message'] = 'Ошибка при загрузке изображения';
    //                 header('Location: ../register.php');
    //             }else{
    //                 mysqli_query($connect, "INSERT INTO `user` (`id`, `login`, `age`, `email`, `gender`, `password`, `salt`, `photo`) VALUES (NULL, '$login', '$age', '$email', '$gender', '$password', '$salt', '$path')");
    //                 $_SESSION['message'] = 'Регистрация прошла успешно';
    //                 echo "<script>alert('Регистрация прошла успешно')</script>";
    //                 header('Location: ../login.php');
    //             }

    //         }else{
    //             $_SESSION['message'] = 'Пароли не совпадают';
    //             header('Location: ../register.php');
    //         }  
    //     }
    //     else{
    //         $_SESSION['message'] = 'Пользователь с таким логином уже существует!';
    //             header('Location: ../register.php');
    //     }

    // }

    
?>
    































































    
