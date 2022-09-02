$(document).ready(function(){


  
    checked = [];
    console.log(checked);
    $('input[type=checkbox]').on('click', function () {
        
        

        if ($(this).is(':checked')) {
            checked.push($(this).val());
            
        }else{
            i = checked.indexOf($(this).val());
            checked.splice(i, 1);
        }
        console.log(checked);
        
        $.ajax({
            url: 'php/filter.php',
            type: 'POST',
            data: {
                caths: checked
            },
            success: function(data){

                console.log("ee".data);
                $('.pics').html(data);


                // if(data.status == true){
                //     alert("true");
                    // document.location.href = '../profile.php';
                // }else{
                //     alert("false");

                // $('.msg').removeClass('none').text(data.message);
                
                // document.location.href = '../signin.php';
            
           
            }
    })

});


})