const notificationProblem=(textMessage)=>{
   const successMessage= document.getElementById('successMessage');
   const errorMessage=document.getElementById('errorMessage');
   errorMessage.innerText=textMessage;
   successMessage.classList.remove('none');
    setTimeout(() => { successMessage.classList.add('none') }, 2000);
}

export function validateLogin() {
    const loginForm = document.getElementById('loginForm');
    const inputs = Array.from(loginForm.querySelectorAll('input'));
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    let message = '';
    //unkcija iterira kroz sve inpute i proverava da neki od njih nije slucajno prazan, ako jeste 
    //upisuje obavestenje o tome u placeholder i dodaje css klasu u input
    function notEmpty() {
        let res = true;
        for (const input of inputs) {
            if (input.value.trim() === "") {
                input.classList.add('warningClass');
                res = false;
                message = "Please make sure all fields are filled";

            }
        }
        return res;
    }

    function validUsername() {
        let res = true;
        const re = /^[a-zA-Z]{2,20}$/;
        if (!re.test(username.value.trim())) {
            message = "Username must be minimum 2 and maximum 20 characters";
            res = false;
        }
        return res;
    }

    function validPassword() {
        //Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character:
        const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        let res = true;
        if (!re.test(password.value.trim())) {
            message = "Password must be minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character:";
            res = false;
        }
        return res;
    }

    loginForm.addEventListener('submit', (e) => {
        if (notEmpty() && validUsername() && validPassword()) {
            loginForm.submit();
        }
        notificationProblem(message);
        e.preventDefault();
    })

}


export function validateRegister() {
    const registrationForm = document.getElementById('registrationForm');
    const inputs = Array.from(registrationForm.querySelectorAll('input'));
    const firstname = document.getElementById('firstname');
    const lastname = document.getElementById('lastname');
    const email = document.getElementById('email');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const password2 = document.getElementById('password2');

    let message = '';
    //unkcija iterira kroz sve inpute i proverava da neki od njih nije slucajno prazan, ako jeste 
    //upisuje obavestenje o tome u placeholder i dodaje css klasu u input
    function notEmpty() {
        let res = true;
        for (const input of inputs) {
            if (input.value.trim() === "") {
                input.classList.add('warningClass');
                res = false;
                message = "Please make sure all fields are filled";
            }
        }
        return res;
    }
//validacija korsnickog imena
    function validNames() {
        let res = true;
        const re = /^[a-zA-Z]{2,10}$/;
        if (!re.test(username.value.trim())) {
            message = "Username must be minimum two and maximum ten characters";
            res = false;
        }
        if (!re.test(firstname.value.trim())) {
            message = "Firstname must be minimum two and maximum ten characters";
            res = false;
        }
        if (!re.test(lastname.value.trim())) {
            message = "Lastname must be minimum two and maximum ten characters";
            res = false;
        }
        return res;
    }

//validacija passworda
    function validPassword() {
        //Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character:
        const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        let res = true;
        if (password.value.trim()==password2.value.trim()){
            if (!re.test(password.value.trim())) {
                message = "Password must be minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character:";
                res = false;
            }
            
        }else{
            message = "Password don't match";
            res = false;
        }
     
        return res;
    }

    registrationForm.addEventListener('submit', (e) => {
        if (notEmpty() && validNames() && validPassword()&&validEmail()) {
            registrationForm.submit();
        }
        notificationProblem(message);
        e.preventDefault();
    })

}


