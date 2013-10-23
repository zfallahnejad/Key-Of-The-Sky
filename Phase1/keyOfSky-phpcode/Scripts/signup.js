var ns6=document.getElementById&&!document.all
function restrictinput(maxlength,e,placeholder){
if (window.event&&event.srcElement.value.length>=maxlength)
return false
else if (e.target&&e.target==eval(placeholder)&&e.target.value.length>=maxlength){
var pressedkey=/[a-zA-Z0-9\.\,\/]/ //detect alphanumeric keys
if (pressedkey.test(String.fromCharCode(e.which)))
e.stopPropagation()
}
}
function countlimit(maxlength,e,placeholder){
var theform=eval(placeholder)
var lengthleft=maxlength-theform.value.length
var placeholderobj=document.all? document.all[placeholder] : document.getElementById(placeholder)
if (window.event||e.target&&e.target==eval(placeholder)){
if (lengthleft<0)
theform.value=theform.value.substring(0,maxlength)
placeholderobj.innerHTML=lengthleft
}
}
function displaylimit(thename, theid, thelimit){
var theform=theid!=""? document.getElementById(theid) : thename
var limit_text='<b><span id="'+theform.toString()+'">'+thelimit+'</b> کاراکتر'
if (document.all||ns6)
document.write(limit_text)
if (document.all){
eval(theform).onkeypress=function(){ return restrictinput(thelimit,event,theform)}
eval(theform).onkeyup=function(){ countlimit(thelimit,event,theform)}
}
else if (ns6){
document.body.addEventListener('keypress', function(event) { restrictinput(thelimit,event,theform) }, true); 
document.body.addEventListener('keyup', function(event) { countlimit(thelimit,event,theform) }, true); 
}
}
</script>
<SCRIPT language="JavaScript">
function CheckFormParstools () { 

//Initialise variables
var errorMsg = "";

//Check for a name
if (document.Contactform.Name.value == ""){
errorMsg += "\n\n\t\t\t !نام شما وارد نشده است "; 
}

//Check for an e-mail address and that it is valid
if ((document.Contactform.Email.value == "") || (document.Contactform.Email.value.length > 0 && (document.Contactform.Email.value.indexOf("@",0) == - 1 || document.Contactform.Email.value.indexOf(".",0) == - 1))) { 
errorMsg += "\n\n\t !آدرس ایمیل شما بطور صحیح وارد نشده است ";
}

//Check for an enquiry
if (document.Contactform.Message.value == "") { 
errorMsg += "\n\n\t\t !پیام شما وارد نشده است ";
}

//If there is aproblem with the form then display an error
if (errorMsg != ""){
msg = "\t\t : لطفا فرم ارسال را بطور کامل پر نمایید\n";
msg += "___________________________________________________";

errorMsg += alert(msg + errorMsg + "\n___________________________________________________\n\n");
return false;
}

return true;
}
// -->