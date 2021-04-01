$(".like-btn__button").click(function (){
    hr = window.location.href;
    $.ajax({
        url: "core/scripts/addToCollection.php",
        type: "POST",
        data: {hr},
        success: function (data){
        }
    });
});