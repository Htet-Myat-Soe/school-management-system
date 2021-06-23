$(function(){
    $(".hamburger").click(function(){
    $(".wrapper").toggleClass("colp");
    });

    $('.toast__close').click(function(e){
        e.preventDefault();
        var parent = $(this).parent('.toast');
        parent.fadeOut("slow", function() { $(this).remove(); } );
      });

    $("#limit").change(function(){
      $('form').submit();
    });
});