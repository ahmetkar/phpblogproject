$(function(){

$("div#onaylanan").hide();

$("div#onaylanmayan").show();

$("li#o0").click(function(){

$("div#onaylanan").hide();

$("div#onaylanmayan").show(300);


});

$("li#o1").click(function(){

$("div#onaylanan").show(300);

$("div#onaylanmayan").hide();


});


$("a#duzenle").click(function(){


var hedef = $("input[type=checkbox]:checked").attr("name");

$("a#duzenle").attr({
"href": "yorumduzenle.php?id="+hedef+"" 
});



});


$("button#remove").click(function(){

var idal = $("input[type=checkbox]:checked").attr("name");


$.post("yorumsil.php",{"aid":idal},function(){


alert("Yorumu başarıyla sildiniz..");

});

});



});
