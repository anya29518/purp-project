$(document).ready(function(){



$('.login-btn').click(function(e){
    e.preventDefault();
    
    let login = $('input[name="login"]').val(),
    password = $('input[name="password"]').val();

   
    $.ajax({
        url: 'php/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success: function(data){
            console.log(data);
            if(data.status == true){
                //alert("Вход выполнен успешно");
                document.location.href = '../profile.php';
            }else{
                //alert("Вход не выполнен");
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }
                $('.msg').removeClass('none').text(data.message);
                
                // document.location.href = '../signin.php';
                
                
            }
           
        }
    })

});



$('.register-btn').click(function (e) {
    e.preventDefault();

    // console.log(avatar);
    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        age = $('input[name="age"]').val(),
        password = $('input[name="password"]').val(),
       
        email = $('input[name="email"]').val(),
        gender = $('select[name=gender]').val();
        

        check_password = $('input[name="check_password"]').val();


    let url = $('#form').attr('action');

    $.ajax({
        url: 'php/reg.php',
        type: 'POST',
        // dataType: 'json',
        data: {
            login: login,
            password: password,
            check_password: check_password,
            age: age,
            gender: gender, 
            email: email
            // avatar: avatar
        },
        success: function(resp){
            console.log(resp);
            $('.msg').addClass('none');
            if(resp.message == "Регистрация прошла успешно!"){
                //alert("true");
                document.location.href = '../login.php';
            }else{
                //alert("false");
                // if (resp != "") {
                //     // data.fields.forEach(function (field) {
                //         $(`input[name="${field}"]`).addClass('error');
                //     // });
                // }
                $('.msg').removeClass('none').text(resp.message);
                
                // document.location.href = '../signin.php';
                
                
            }
           
        }
    })
})

});

