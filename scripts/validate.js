function validateSignIn(){
    // Get form inputs
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname"); 
    var tele = document.getElementById("tele");
    var address = document.getElementById("address");
    var sign_email = document.getElementById("sign-email");
    var sign_pass = document.getElementById("sign-pass");
    var re_sign_pass = document.getElementById("re-sign-pass");
    var plate = document.getElementById("plate");

    // Error msg boxes
    var fname_error = document.getElementById("fname-note");
    var lname_error = document.getElementById("lname-note"); 
    var tele_error = document.getElementById("tele-note");
    var address_error = document.getElementById("address-note");
    var sign_email_error = document.getElementById("sign-email-note");
    var sign_pass_error = document.getElementById("sign-pass-note");
    var re_sign_pass_error = document.getElementById("re-sign-pass-note");
    var plate_error = document.getElementById("plate-note");

    // Initial Return value
    SignPass = true;

    /*----- First Name Validation------*/
    fname_error.innerHTML = "";// Clear Previous messages
    if(fname.value == ''){// Empty check
        SignPass = false;
        fname_error.innerHTML = "* Cannot be empty !";
    }
    else if(!fname.value.match(/^[a-zA-Z]+$/)){// Should contain only letters
        SignPass = false;
        fname_error.innerHTML = "* Not a valid name !";
    }

    /*----- Last Name Validation------*/
    lname_error.innerHTML = "";// Clear Previous messaegs
    if(lname.value == ''){// Empty check
        SignPass = false;
        lname_error.innerHTML = "* Cannot be empty !";
    }
    else if(!lname.value.match(/^[a-zA-Z]+$/)){// Should contain only letters
        SignPass = false;
        lname_error.innerHTML = "* Not a valid name !";
    }

    /*----- Phone Validation------*/
    tele_error.innerHTML = "";// Clear Previous messaegs
    if(tele.value == ''){// Empty check
        SignPass = false;
        tele_error.innerHTML = "* Cannot be empty !";
    }
    else if(!tele.value.match(/^[0-9]{10}$/)){// Should contain only 10 numbers
        SignPass = false;
        tele_error.innerHTML = "* Not a valid Phone number !";
    }

    /*----- Plate number Validation------*/
    plate_error.innerHTML = "";// Clear Previous messages
    if(plate.value == ''){// Empty check
        SignPass = false;
        plate_error.innerHTML = "* Cannot be empty !";
    }
    else if (!plate.value.match(/^[A-Za-z]{2,3}-[0-9]{4}$|^[0-9]{2}-[0-9]{4}$/)) {
        SignPass = false;
        plate_error.innerHTML = "* Invalid plate format !"
    }

    /*----- Address Validation------*/
    address_error.innerHTML = "";// Clear Previous messaegs
    if(address.value == ''){// Empty check
        SignPass = false;
        address_error.innerHTML = "* Cannot be empty !";
    }
    else if(address.value.match(/[!'@#$%^*?"{}|<>]/)){// Shouldn't contain special characters
        SignPass = false;
        address_error.innerHTML = "* Special characters are not allowed !";
    }

    /*----- Email Validation------*/
    sign_email_error.innerHTML = "";// Clear Previous messages
    if(sign_email.value == ''){// Empty check
        SignPass = false;
        sign_email_error.innerHTML = "* Cannot be empty !";

    }
    else if(!sign_email.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        SignPass = false;
        sign_email_error.innerHTML = "* Invalid E-mail format !";
    }


    /*----- Password Validation------*/
    sign_pass_error.innerHTML = "";// Clear Previous messages
    if(sign_pass.value == ''){// Empty Check
        SignPass = false;
        sign_pass_error.innerHTML = "* Cannot be empty !";
    }
    else if(!sign_pass.value.match(/[0-9]/g)){
        SignPass = false;
        sign_pass_error.innerHTML = "* Should contain numbers !";
    }
    else if(!sign_pass.value.match(/[a-z]/g)){
        SignPass = false;
        sign_pass_error.innerHTML = "* Should contain Lowercase letters !";
    }
    else if(!sign_pass.value.match(/[A-Z]/g)){
        SignPass = false;
        sign_pass_error.innerHTML = "* Should contain Uppercase letters !";
    }
    else if(!sign_pass.value.match(/[!@#$%^&*(),.?":{}|<>]/)){
        SignPass = false;
        sign_pass_error.innerHTML = "* Use special characters !";
    }
    else if(sign_pass.value.length < 8){
        SignPass = false;
        sign_pass_error.innerHTML = "* Should contain atlease 8 characters !";
    }
    

    /*----- Passwords match check------*/
    re_sign_pass_error.innerHTML = "";// Clear Previous messages
    if(sign_pass.value != re_sign_pass.value){
       SignPass = false;
       re_sign_pass_error.innerHTML = "* Passwords doesn't match !";
    }
    
    // Returning value
    return SignPass;
}

function validateUserSignIn(){
    // Get form inputs
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname"); 
    var tele = document.getElementById("tele");
    var address = document.getElementById("address");
    var sign_email = document.getElementById("sign-email");
    var sign_pass = document.getElementById("sign-pass");
    var re_sign_pass = document.getElementById("re-sign-pass");

    // Error msg boxes
    var fname_error = document.getElementById("fname-note");
    var lname_error = document.getElementById("lname-note"); 
    var tele_error = document.getElementById("tele-note");
    var address_error = document.getElementById("address-note");
    var sign_email_error = document.getElementById("sign-email-note");
    var sign_pass_error = document.getElementById("sign-pass-note");
    var re_sign_pass_error = document.getElementById("re-sign-pass-note");

    // Initial Return value
    SignPass = true;

    /*----- First Name Validation------*/
    fname_error.innerHTML = "";// Clear Previous messages
    if(fname.value == ''){// Empty check
        SignPass = false;
        fname_error.innerHTML = "* Cannot be empty !";
    }
    else if(!fname.value.match(/^[a-zA-Z]+$/)){// Should contain only letters
        SignPass = false;
        fname_error.innerHTML = "* Not a valid name !";
    }

    /*----- Last Name Validation------*/
    lname_error.innerHTML = "";// Clear Previous messaegs
    if(lname.value == ''){// Empty check
        SignPass = false;
        lname_error.innerHTML = "* Cannot be empty !";
    }
    else if(!lname.value.match(/^[a-zA-Z]+$/)){// Should contain only letters
        SignPass = false;
        lname_error.innerHTML = "* Not a valid name !";
    }

    /*----- Phone Validation------*/
    tele_error.innerHTML = "";// Clear Previous messaegs
    if(tele.value == ''){// Empty check
        SignPass = false;
        tele_error.innerHTML = "* Cannot be empty !";
    }
    else if(!tele.value.match(/^[0-9]{10}$/)){// Should contain only 10 numbers
        SignPass = false;
        tele_error.innerHTML = "* Not a valid Phone number !";
    }

    /*----- Address Validation------*/
    address_error.innerHTML = "";// Clear Previous messaegs
    if(address.value == ''){// Empty check
        SignPass = false;
        address_error.innerHTML = "* Cannot be empty !";
    }
    else if(address.value.match(/[!'@#$%^*?"{}|<>]/)){// Shouldn't contain special characters
        SignPass = false;
        address_error.innerHTML = "* Special characters are not allowed !";
    }

    /*----- Email Validation------*/
    sign_email_error.innerHTML = "";// Clear Previous messages
    if(sign_email.value == ''){// Empty check
        SignPass = false;
        sign_email_error.innerHTML = "* Cannot be empty !";

    }
    else if(!sign_email.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        SignPass = false;
        sign_email_error.innerHTML = "* Invalid E-mail format !";
    }


    /*----- Password Validation------*/
    sign_pass_error.innerHTML = "";// Clear Previous messages
    if(sign_pass.value == ''){// Empty Check
        SignPass = false;
        sign_pass_error.innerHTML = "* Cannot be empty !";
    }
    else if(!sign_pass.value.match(/[0-9]/g)){
        SignPass = false;
        sign_pass_error.innerHTML = "* Should contain numbers !";
    }
    else if(!sign_pass.value.match(/[a-z]/g)){
        SignPass = false;
        sign_pass_error.innerHTML = "* Should contain Lowercase letters !";
    }
    else if(!sign_pass.value.match(/[A-Z]/g)){
        SignPass = false;
        sign_pass_error.innerHTML = "* Should contain Uppercase letters !";
    }
    else if(!sign_pass.value.match(/[!@#$%^&*(),.?":{}|<>]/)){
        SignPass = false;
        sign_pass_error.innerHTML = "* Use special characters !";
    }
    else if(sign_pass.value.length < 8){
        SignPass = false;
        sign_pass_error.innerHTML = "* Should contain atlease 8 characters !";
    }
    

    /*----- Passwords match check------*/
    re_sign_pass_error.innerHTML = "";// Clear Previous messages
    if(sign_pass.value != re_sign_pass.value){
       SignPass = false;
       re_sign_pass_error.innerHTML = "* Passwords doesn't match !";
    }
    
    // Returning value
    return SignPass;
}

function validateUpdateForm(){
    // Get form inputs
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname"); 
    var tele = document.getElementById("tele");
    var address = document.getElementById("address");
    var sign_email = document.getElementById("email");

    // Error msg boxes
    var fname_error = document.getElementById("fname-note");
    var lname_error = document.getElementById("lname-note"); 
    var tele_error = document.getElementById("tele-note");
    var address_error = document.getElementById("address-note");
    var sign_email_error = document.getElementById("email-note");

    // Initial Return value
    SignPass = true;

    /*----- First Name Validation------*/
    fname_error.innerHTML = "";// Clear Previous messages
    if(fname.value == ''){// Empty check
        SignPass = false;
        fname_error.innerHTML = "* Cannot be empty !";
    }
    else if(!fname.value.match(/^[a-zA-Z]+$/)){// Should contain only letters
        SignPass = false;
        fname_error.innerHTML = "* Not a valid name !";
    }

    /*----- Last Name Validation------*/
    lname_error.innerHTML = "";// Clear Previous messaegs
    if(lname.value == ''){// Empty check
        SignPass = false;
        lname_error.innerHTML = "* Cannot be empty !";
    }
    else if(!lname.value.match(/^[a-zA-Z]+$/)){// Should contain only letters
        SignPass = false;
        lname_error.innerHTML = "* Not a valid name !";
    }

    /*----- Phone Validation------*/
    tele_error.innerHTML = "";// Clear Previous messaegs
    if(tele.value == ''){// Empty check
        SignPass = false;
        tele_error.innerHTML = "* Cannot be empty !";
    }
    else if(!tele.value.match(/^[0-9]{10}$/)){// Should contain only 10 numbers
        SignPass = false;
        tele_error.innerHTML = "* Not a valid Phone number !";
    }

    /*----- Address Validation------*/
    address_error.innerHTML = "";// Clear Previous messaegs
    if(address.value == ''){// Empty check
        SignPass = false;
        address_error.innerHTML = "* Cannot be empty !";
    }
    else if(address.value.match(/[!'@#$%^*?"{}|<>]/)){// Shouldn't contain special characters
        SignPass = false;
        address_error.innerHTML = "* Special characters are not allowed !";
    }

    /*----- Email Validation------*/
    sign_email_error.innerHTML = "";// Clear Previous messages
    if(sign_email.value == ''){// Empty check
        SignPass = false;
        sign_email_error.innerHTML = "* Cannot be empty !";

    }
    else if(!sign_email.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        SignPass = false;
        sign_email_error.innerHTML = "* Invalid E-mail format !";
    }
    
    // Returning value
    return SignPass;
}