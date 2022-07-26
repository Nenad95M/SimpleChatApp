import {validateLogin, validateRegister} from "./validation.js";

//koristim curring da napravim funkciju koja sluzi za upis tekstualnog sadrzaja u id
const updateDOMText=id=>text=>document.getElementById(`${id}`).textContent=text;
const year=new Date().getFullYear();
//upisujem godinu u dom
updateDOMText('year')(year);



if (document.getElementById("loginForm")) {
    validateLogin();
}
if (document.getElementById("registrationForm")) {
    validateRegister();
}
