$(document).ready(function(){
    

    $('.inpSearch').keyup(
        function(){
            //let input = $(this);
            let text = $(this).val();
            if(text != ''){
                $.ajax({
                    url:     "php/search.php", 
                    type:     "POST",
                    dataType: "json", 
                    data:{
                        referal: text
                    },  
                    success: function(response) {
                        if(response.error){
                            $('.listUsers').children().remove();
                            let str=`<div class="nothing">Ничего не найдено</div>`;
                            $(".listUsers").append(str);
                        } else {
                            $('.listUsers').children().remove();
                            response.forEach(title => {
                                let str=`<a href="../pic.php?id=${title.id}"><div class="divSPic"><img class="spic" src="${title.path}"><div class="title">${title.title}</div></div></a>`;
                                $(".listUsers").append(str);
                            });
                        }
                    }
                });
            }  else {
                $('.listUsers').children().remove();
            }
        }
    );










    //Живой поиск
    // $('.inpSearch').bind("change keyup input click", function() {
    //     if(this.value.length >= 2){
    //         $.ajax({
    //             type: 'post',
    //             url: "../php/search.php", //Путь к обработчику
    //             dаta: {'referal':this.value},
    //             response: 'text',
    //             success: function(data){
    //                 $(".search_result").html(data).fadeIn(); //Выводим полученые данные в списке
    //            }
    //        })
    //     }
    // })
        
    // $(".search_result").hover(function(){
    //     $(".inpSearch").blur(); //Убираем фокус с input
    // })
        
    // //При выборе результата поиска, прячем список и заносим выбранный результат в input
    // $(".search_result").on("click", "li", function(){
    //     s_user = $(this).text();
    //     //$(".who").val(s_user).attr('disabled', 'disabled'); //деактивируем input, если нужно
    //     $(".search_result").fadeOut();
    // })
})