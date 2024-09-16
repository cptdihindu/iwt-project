let loginPopup = document.getElementById("login-popup");
let SigninPopup = document.getElementById("sign-in-popup");

function openLoginPopup(){ // JOIN button
    loginPopup.classList.add("open-login-popup");
}
function openSignInPopup(){// hyperlink in login window to open sign-in window
    closeLoginPopup();
    SigninPopup.classList.add("open-sign-in-popup");
}


function closeLoginPopup(){ // 'X' mark in login window to close
    loginPopup.classList.remove("open-login-popup");
    clearFormData("c_login_form");
    //When 'X' clicked data entered should be erased.
}
function closeSignInPopup(){// 'X' mark in login window to close
    SigninPopup.classList.remove("open-sign-in-popup");
    clearFormData("c_sign_in_form");
    //When 'X' clicked data entered should be erased.
}


function loginSignRedir(){// hyperlink in sign-in window to open login window
    openLoginPopup();
    closeSignInPopup();
}


//A function to erase form data when form closed
function clearFormData(form_id){
    document.getElementById(form_id).reset();
}