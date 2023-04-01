var myText = document.getElementById("my-text");
var result = document.getElementById("count-result");
var limit = 800;
result.textContent = 0 + "/" + limit;

myText.addEventListener("input", function(){
    var textLength = myText.value.length;
    result.textContent = textLength + "/" + limit;

    if(textLength >= limit) {
        myText.style.borderColor = "#ff2851";
        result.style.color = "#ff2851";
    } 
    else {
        myText.style.borderColor = "#C27933";
        result.style.color = "#C27933";
    }
});
