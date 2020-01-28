 var otherInformation = document.getElementById("otherInformation");

 if(document.getElementById("checkboxOther").checked){
    otherInformation.style.display = "block";
 }else{
    otherInformation.style.display = "none";
 }

document.getElementById("checkboxOther").addEventListener("change",function(){
    var checkbox = document.getElementById("checkboxOther").checked;
    if(checkbox){
        otherInformation.style.display = "block";
    }else{
        otherInformation.style.display = "none";
    }     
});