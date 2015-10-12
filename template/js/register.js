$('.glyphicon-star-empty').hover(  
    // Handles the mouseover  
    function() {  
        $(this).prevAll().andSelf().addClass('glyphicon-star');  
        $(this).nextAll().removeClass('glyphicon-star');  
    },  
    // Handles the mouseout  
    function() {  
        $(this).prevAll().andSelf().removeClass('glyphicon-star');  
        set_votes($(this).parent());  
    }  
);