$(document).ready(function(){


    $(document).mouseup(
        function (e) {
        let container = $(".popUpMenu");
        if (container.has(e.target).length === 1){
            if($(".focus").has(e.target).length === 1){
                if($(e.target).parent().next().css("visibility") == "hidden"){
                    $(".hidden").css("visibility", "hidden");
                    $(e.target).parent().next().css("visibility", "visible");
                } else {
                    $('.listUsers').children().remove();
                    $(e.target).parent().next().children(".inpSearch").val("");
                    $(e.target).parent().next().css("visibility", "hidden");
                }
            }
        } else {
            $('.listUsers').children().remove();
            container.children(".hidden").children(".inpSearch").val("");
            container.children(".hidden").css("visibility", "hidden");

        }
    });


});
