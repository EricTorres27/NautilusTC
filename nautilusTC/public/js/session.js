
// Variables y constantes
const form= document.getElementById('sessionForm');
const validation= document.getElementById('validationList');
const btnSubmitForm= document.getElementById('btnSubmitForm');
const btnValidarSesion= document.getElementById('sesion_validar');
const selectidNumber= document.getElementById('idNumber');
const selectFormatSession= document.getElementById('format');
const selectFormatSessionoption_1= document.getElementById('selectRegisterSesion_1');
const selectFormatSessionoption_2= document.getElementById('selectRegisterSesion_2');
const selectRegisterSession= document.getElementById('selectRegisterSession');
const selectRegisterSessionoption_1= document.getElementById('selectRegisterSession_1');
const selectRegisterSessiontoption_2= document.getElementById('selectRegisterSession_2');
const wordCount= document.getElementById('word_count');
const wordCountPartner= document.getElementById('word_count_partner');
const cronoHoras = document.getElementById('cronoHoras');
const cronoMinutos = document.getElementById('cronoMinutos');
const cronoSegundos = document.getElementById('cronoSegundos');
const idNumbersList = document.getElementById('idNumbersList');
let horas = `00`,minutos = `00`, segundos = `00`,chronometerCall;
//Voice recognition
const btnStartRecors= document.getElementById('btnStartRecors');
const btnstopRecors= document.getElementById('btnStopRecors');
var valueA=0;
var inspeech=false;
var stopRecognition = false;
var recognition= new webkitSpeechRecognition();
recognition.lang = 'es-MX';
recognition.continuous = true;
recognition.interimResults = false;

// Reconocimiento de voz cuando se inicia a grabar
recognition.onresult = function(event) {
    inspeech=true;
    for (var i = event.resultIndex; i < event.results.length; ++i) {
        const results = event.results;
        const frase = results[results.length - 1][0].transcript;
        
        if(wordCount.value==""){
            wordCount.value = 0;
        }
        var c = frase.split(/[\s]+/).length;
        var c2= parseInt(wordCount.value);
        wordCount.value = parseInt(c)+parseInt(c2);  
    }
    inspeech=false;

}
/*
setInterval(resetVoiceRecog, 10000);

function resetVoiceRecog() {
    if(inspeech==false && stopRecognition==false){ 
        recognition.stop();
      }
}
*/

// Triggered on parsing error
recognition.onerror = function(event) {
    // Report error with text code and error image
    console.log("Error Code: " + event.error);
}
// Triggered on parsing end
recognition.onend = function(event) {
    if(stopRecognition==false){
        recognition.start();
        inspeech=true;
    }
}

btnStartRecors.addEventListener('click', () => {
    recognition.start();
    chronometerCall = setInterval(chronometer, 1000);
    changeAtributes(btnStartRecors,"disabled","disabled","put");
    stopRecognition = false;
    inspeech=true;
});
btnstopRecors.addEventListener('click', () => {
    recognition.stop();
    clearInterval(chronometerCall)
    changeAtributes(btnStartRecors,"disabled","disabled","remove");
    stopRecognition = true;
    inspeech=false
});

form.addEventListener('submit', (e) => {
    let messages = [];
    if(selectidNumber.value == "" || selectidNumber.value == null){
        messages.push('<li>El campo de matricula de tu compañero es obligatorio</li>');
    }
    if (checkList(selectidNumber.value) == false) {
        messages.push('<li>El campo de matricula no se encuentra en la lista</li>');
    }
    if(wordCount.value == "" || wordCount.value == null || wordCount.value == 0){
        messages.push('<li>El campo de palabras no puede ser 0 o estar vacío</li></li>');
    }
    if(wordCountPartner.hasAttribute('required')){
        if(wordCountPartner.value == "" || wordCountPartner.value == null || wordCountPartner.value == 0){
            messages.push('<li>El campo de palabras de tu compañero no puede ser 0 o estar vacío</li>');
        }
    }
    if( cronoHoras.value == 0 && cronoMinutos.value == 0 && cronoSegundos.value == 0){
        messages.push('<li>El campo de tiempo no puede ser 0 o estar vacío</li>');
    }
    if(messages.length > 0){
        e.preventDefault();
        validation.style.display = "block";
        validation.innerHTML = "<ul>"+messages.join()+"</ul>";
    }else{
        validation.style.display = "none";
        document.getElementById('btnSubmitFormLabel').style.display= "block";
        changeAtributes(btnSubmitForm,"disabled","disabled","put");
        addClass(document.getElementById('btnSubmitFormLabel'),"spinner-border");
    }

});

function reiniciarGrabación()
{
    wordCount.value = 0;
    clearInterval(chronometerCall)
    changeAtributes(btnStartRecors,"disabled","disabled","remove");
    cronoHoras.value = 0;
    cronoMinutos.value = 0;
    cronoSegundos.value = 0;
    horas = `00`;
    minutos = `00`;
    segundos = `00`;
}

function chronometer() {
    segundos ++;
    if (segundos < 10){
        segundos = `0` + segundos
    } 
    if (segundos > 59) {
        segundos = `00`
        minutos ++
        if (minutos < 10){
            minutos = `0` + minutos
        }
    }
    if (minutos > 59) {
    minutos = `00`
    horas ++
        if (horas < 10){
            horas = `0` + horas
        }
    }
    cronoHoras.value = horas;
    cronoMinutos.value = minutos;
    cronoSegundos.value = segundos;
}


function choose_format(selectItem){
    var selectedText = selectItem.options[selectItem.selectedIndex].innerHTML;
    if(selectedText=="Prescencial"){
        changeAtributes(selectRegisterSession,'disabled','disabled',"put");
        selectRegisterSessionoption_1.selected=true;
        changeAtributes(selectidNumber,'disabled','disabled',"remove");
        changeAtributes(selectidNumber,'required','required',"put");
        changeAtributes(wordCountPartner,'disabled','disabled',"put");
        changeAtributes(wordCountPartner,'required','required',"remove");
        wordCountPartner.value=0;
        
    }
    else if(selectedText=="Remoto"){
        changeAtributes(selectRegisterSession,'disabled','disabled',"remove");
        selectRegisterSessionoption_1.selected=false;
        changeAtributes(selectidNumber,'disabled','disabled',"remove");
        changeAtributes(selectidNumber,'required','required',"put");
        changeAtributes(wordCountPartner,'disabled','disabled',"remove");
        changeAtributes(wordCountPartner,'required','required',"put");
    }
    changeAtributes(btnSubmitForm,'disabled','disabled',"remove");
}
function choose_register(selectItem){
    var selectedText = selectItem.options[selectItem.selectedIndex].innerHTML;
    if(selectedText=="Sí"){
        changeAtributes(selectidNumber,'disabled','disabled',"remove");
        changeAtributes(selectidNumber,'required','required',"put");
        changeAtributes(wordCountPartner,'disabled','disabled',"remove");
        changeAtributes(wordCountPartner,'required','required',"put");
        changeAtributes(btnSubmitForm,'disabled','disabled',"remove");
    }
    else if(selectedText=="No"){
        changeAtributes(selectidNumber,'disabled','disabled',"put");
        changeAtributes(wordCountPartner,'disabled','disabled',"put");
        wordCountPartner.value=0;
        changeAtributes(btnSubmitForm,'disabled','disabled',"put");
    }
}
function changeAtributes(item, atribute_name, atribute_value, operation){
    if (operation=="put") {
        item.setAttribute(atribute_name,atribute_value);
    } 
    else if (operation=="remove") {
        if(item.hasAttribute(atribute_name)){
            item.removeAttribute(atribute_name);
        }
    }
}
function addClass(item,class_name){
    item.classList.add(class_name);
}

function checkList(idNumber){
    let x = idNumbersList.options;
    for (let i = 0; i < x.length; i++) {
        if (x[i].value == idNumber) {
            return true;
        }
    }
    return false;
}

