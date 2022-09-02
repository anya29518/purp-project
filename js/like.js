$(document).ready(function(){


    $(".like").bind("click", function(event) {
        icon=this.querySelector('i');

        
        //////
        //let type = 0;
        //////

        // if(icon.classList.contains('fa-heart')){
        //     icon.setAttribute('class', 'fa fa-heart-o');
        //     type = 0;
        // }else{
        //     icon.setAttribute('class', 'fa fa-heart');
        //     type = 1;
        // }
        pic_id = this.dataset.id;
        //alert(pic_id);
        
        $.ajax({
            
            url: "../php/like.php",
            type: "POST",
            dataType: "json",
            data: {id: pic_id},
            
            success: function(data) {
                 //alert("wwwwww");
                if (data.status) {
                    //alert("ya");

                    $("#like").html(Number(data.likes));
                    if(data.isLiked){
                        icon.setAttribute('class', 'fa fa-heart');
                    }else{
                        icon.setAttribute('class', 'fa fa-heart-o');
                    }

                }
                else {
                    console.log("Error");
                    
                }
            }
        });
    });


})