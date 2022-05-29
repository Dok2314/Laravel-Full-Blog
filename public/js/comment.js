$(document).ready(function(){
    $(".reply-popup").click(function(){
        $(this).parents('.comment-box').find(".reply-box").toggle();
    });
});
