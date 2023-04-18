const validation= document.getElementById('validationList');
const nameText=document.getElementById('name');
const idNumber=document.getElementById('idNumber');
const email=document.getElementById('email');
const password=document.getElementById('password');
const passwordConfirm=document.getElementById('password_confirmation');
const consent_information=document.getElementById('consent_information');
const consent_preactices=document.getElementById('consent_practices');
const formRegister=document.getElementById('formRegister');
const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

if (formRegister) {
    formRegister.addEventListener('submit', (e) => {
        let messages = [];
        if(nameText.value == "" || nameText.value == null){
            messages.push('<li>El campo de nombre es obligatorio</li>');
        }else if (nameText.value.length < 5) {
            messages.push(`<li>El campo de nombre debe tener al menos ${5} caracteres</li>`);
        }else if (nameText.value.length > 20) {
            messages.push(`<li>El campo de nombre debe tener menos de ${20} caracteres</li>`);
        }
        else if (specialChars.test(nameText.value)) {
            messages.push("<li>El campo de nombre debe contener solo letras y números</li>");
        }
        if(idNumber.value == "" || idNumber.value == null){
            messages.push('<li>El campo de matricula es obligatorio</li>');
        }else if (idNumber.value.length < 9) {
            messages.push(`<li>El campo de matricula debe tener al menos ${9} caracteres</li>`);
        }else if (idNumber.value.length > 9) {
            messages.push(`<li>El campo de matricula debe tener menos de ${9} caracteres</li>`);
        } else if (specialChars.test(idNumber.value)) {
            messages.push("<li>El campo de matricula debe contener solo letras y números</li>");
        }
        if(password.value.match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/)==null){
            messages.push('<li>La contraseña debe tener al menos una mayúscula, una minúscula, un número y un caracter especial</li>');
        }
        if(password.value !== passwordConfirm.value){
            messages.push('<li>Las contraseñas no coinciden</li>');
        }
        if(messages.length > 0){
            e.preventDefault();
            validation.style.display = "block";
            validation.innerHTML = "<ul>"+messages.join()+"</ul>";
        }
    });
}


function validateText(text, max, min=0, specialChars){
    console.log(text);
    //regex to prevent special characters but allow spaces
    let regex = /^[a-zA-Z0-9\s]+$/;

    if (typeof text !== "string" || ! text instanceof String) {
        return '<li>El campo debe ser un string</li>';
    }
    if (text.length < min) {
        return `<li>El campo debe tener al menos ${min} caracteres</li>`;
    }
    if (text.length > max) {
        return `<li>El campo debe tener menos de ${max} caracteres</li>`;
    }
    if (
        !specialChars &&
        String(text).match(/[^a-zA-Z0-9\sáéíóúÁÉÍÓÚñÑüÜ ]+$/)
    ) {
        return "<li>El campo debe contener solo letras y números</li>";
    }
    return undefined;
}

function validateNumber(number, max, min=0){
    max = parseInt(max);
    min = parseInt(min);
    if (isNaN(parseInt(number))) {
        return '<li>Debe ser un número</li>';
    }
    if (number < min) {
        return `<li>Debe ser mayor o igual a ${min}</li>`;
    }
    if (number > max) {
        return `<li>Debe ser menor o igual a ${max}</li>`;
    }
    return undefined
}

function validateEmail(email) {
    const valid = String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    return valid ? undefined : '<li>El email no es válido</li>';
};

function validatePass(password){
    const valid = String(password).match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/);
    return valid ? undefined : "<li>La contraseña debe tener mínimo 8 caracteres\n Una mayúscula\n Una minúscula \nUn caracter especial (#?!@$%^&*-)</li>"
}

function validatePassword(password){
    let b = password.value
    return password === b ? undefined: "<li>La contraseña no coincide</li>"
}