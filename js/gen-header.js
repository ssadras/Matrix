function hideactive(){
    document.getElementById("def-active").classList.remove("active");
}
function  showactive(){
    document.getElementById("def-active").classList.add("active");
}

function hideactive2(){
    document.getElementById("def-active2").classList.remove("active2");
}
function showactive2(){
    document.getElementById("def-active2").classList.add("active2");
}

$(".clickmenu i").click(function (){
    $(".menu").fadeIn("slow");
    document.getElementById("body").style.height = "800px";
    document.getElementById("body").style.overflowY = "hidden";
});

$(".menu i").click(function () {
    document.getElementById("body").style.height = "100%";
    $(".menu").fadeOut("slow");
});