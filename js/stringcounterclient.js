var myText = document.getElementById("my-teext");
var result = document.getElementById("counter-result");
var limit = 200;
result.textContent = 0 + "/" + limit;

myText.addEventListener("input", function(){
    var textLength = myText.value.length;
    result.textContent = textLength + "/" + limit;

    if(textLength >= limit) {
        myText.style.borderColor = "#ff6961";
        result.style.color = "#ff6961";
    } 
    else {
        myText.style.borderColor = "#ffffff";
        result.style.color = "#ffffff";
    }
});
