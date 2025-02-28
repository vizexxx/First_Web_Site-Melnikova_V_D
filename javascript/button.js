var count = 0;
document.getElementById("myButton").onclick=function()
{
    count++;
    if (count % 2 == 0){
        document.getElementById("image").innerHTML="";
    } else{
        var img = document.createElement("img");
        img.src = "photos/fourth.jpg";
        img.height = 300; 
        document.getElementById("image").appendChild(img); //добавление дочернего элемента
    }
}