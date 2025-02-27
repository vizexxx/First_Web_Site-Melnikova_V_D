var count = 0;
document.getElementById("myButton").onclick=function()
{
    count++;
    if (count % 2 == 0){
        document.getElementById("image").innerHTML="";
    } else{
        var img = document.createElement("img");
        img.src = "https://i.pinimg.com/736x/e8/a6/a3/e8a6a3a3f86b9c9917a5216371c3f49a.jpg";
        img.height = 300; 
        document.getElementById("image").appendChild(img); //добавление дочернего элемента
    }
}