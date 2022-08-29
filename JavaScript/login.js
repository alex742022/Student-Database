// Login page

const errorUser = document.querySelector("#error-message-user");
const errorPass = document.querySelector("#error-message-pass");
const errorAccess = document.querySelector("#error-message-access");

const submit = document.querySelector("#submit");

const user = document.querySelector("#username");
const pass = document.querySelector("#password");
const access = document.querySelector("#access");

submit.addEventListener('click', (e) => {

    if(user.value.length == 0 ){
        
        errorUser.innerHTML = "<h4 class='error'>User is required</h4>";
        setTimeout(() => document.querySelector('.error').remove(), 2000);
        e.preventDefault();
        
    }
    if(pass.value.length == 0 ){
        
        errorPass.innerHTML = "<h4 class='error'>Password is required</h4></h4>";
        setTimeout(() => document.querySelector('.error').remove(), 2000);
        e.preventDefault();
        
    }
    if(access.value.length == 0){

        errorAccess.innerHTML = "<h4 class='error'>Access is required</h4>";
        setTimeout(() => document.querySelector('.error').remove(), 2000);
        e.preventDefault();
    }else{
        
    }

});
