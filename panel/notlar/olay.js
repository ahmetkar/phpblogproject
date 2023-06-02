$(function(){



$("a#duzenle").click(function(){


var hedef = $("input[type=checkbox]:checked").attr("id");

$("a#duzenle").attr({
"href": "notduzenle.php?id="+hedef+"" 
});



});


$("button#remove").click(function(){

var idal = $("input[type=checkbox]:checked").attr("id");


$.post("notsil.php",{"aid":idal},function(){


alert("Bu notu sildiniz...");

});

});



});
