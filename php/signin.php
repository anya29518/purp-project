<?php
    session_start();
    require_once 'includes/connect-db.php';
    $login = $_POST['login'];
    $password = $_POST['password'];
    $error_fields = [];
    if ($login === '') {
        $error_fields[] = 'login';
    }
    
    if ($password === '') {
        $error_fields[] = 'password';
    }
    if (!empty($error_fields)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Заполните все поля",
            "fields" => $error_fields
        ];
    
        echo json_encode($response);
    
        die();
    }
    $query ="SELECT * FROM user WHERE login='$login' ";
    $result = mysqli_query($connect, $query) or die("Ошибка " .
    mysqli_error($connect));
    $user = mysqli_fetch_assoc($result);
   


        if($user === null){
            $response = [
                "status" => false,
                "message" => 'Не верный логин или пароль'
            ];
            echo json_encode($response);
         
        }else{





        if ($user['password']==md5(md5($password).$user['salt'])){


            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login'],
                "email" => $user['email'],
                "age" => $user['age'],   
                "avatar" => $user['photo']
        
            ]; 



            $response = [
                "status" => true
            ];

            echo json_encode($response);



        }
        else {
            $response = [
                "status" => false,
                "message" => 'Неверный  пароль'
            ];
            echo json_encode($response);
        }
        mysqli_close($connect);

    }
    
?>