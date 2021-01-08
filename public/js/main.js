
$(".reg-show").click(function(){
    $(".reg-show").css("display", "none");
    $(".overlay").css({
        "left":"533px",
        "border-radius": "0 20px 20px 0"
    });
    $(".overlay-register").removeClass("d-none");
    $(".overlay-login").addClass("d-none");
    $(".log-show").css({
        "display":"block",
        "left":"-23px"
    });

    $(".login").css({
        "left":"-355px",
        "border-radius": "20px 0 0 20px"
    });
    $(".register").css({
        "left":"0px",
        "z-index":"unset",
        "border-radius": "20px 0 0 20px"
     });
});

$(".log-show").click(function(){

    $(".log-show").css("display", "none");

    $(".overlay").css({
        "left":"0px",
        "border-radius": "20px 0 0 20px"
    });
    $(".overlay-register").addClass("d-none");
    $(".overlay-login").removeClass("d-none");

    $(".reg-show").css({
        "display":"block",
    });

    $(".login").css({
        "left":"0px",
        "border-radius": "0 20px 20px 0"
    });
    $(".register").css({
        "left":"355px",
        "z-index":"-1",
        "border-radius": "0 20px 20px 0"
     });
});

/********************** */
$(".input-path").change(function() {
    fileVal = $(this).val();
    $('.input-label').text(fileVal);
  });