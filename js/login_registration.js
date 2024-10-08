function newUser() {
    // alert("good");

    var url1 = "php/user_register.php";
    var dataString = {};
        $.ajax({
            type: "POST",
            data: dataString,
            url: url1,
            success: function (data) {
                    //alert(data);
                    obj = JSON.parse(data);
                    if(obj.status == "success"){
                        var content = document.getElementById("content_box");
                        content.innerHTML = obj.new_user_register;
                    }
                }
        });
}

function reloadPage() {
    location.reload();
}

function newUserRegister() {
    const usr_email_1 = document.getElementById('usr_email');
    const usr_email_2 = document.getElementById('usr_email-rep');
    const usr_psw_1 = document.getElementById('usr_pasw');
    const usr_psw_2 = document.getElementById('repeat_psw');
    let user_email_permission = false;
    let user_password_permission = false;

    //Date validation
    if (usr_email_1.value != usr_email_2.value) {
        usr_email_1.style="border-color: red;";
        usr_email_2.style="border-color: red;";
        alert('Email one and two do not match!');
    } else if (usr_email_1.value == '' || usr_email_2.value == '') {
        usr_email_1.style="border-color: red;";
        usr_email_2.style="border-color: red;";
        alert('Email can\'t be empty.');
    } else if (usr_email_1.value == usr_email_2.value) {
        user_email_permission = true;
    }

    if (usr_psw_1.value != usr_psw_2.value) {
        usr_psw_1.style="border-color: red;";
        usr_psw_2.style="border-color: red;";
        alert('Password one and two do not match!');
    } else if (usr_email_1.value == '' || usr_email_2.value == '') {
        usr_psw_1.style="border-color: red;";
        usr_psw_2.style="border-color: red;";
        alert('Password can\'t be empty.');
    } else if (usr_email_1.value == usr_email_2.value) {
        user_password_permission = true;
    }

    if ( user_email_permission && user_password_permission) {
        saveNewUser(usr_email_1.value, usr_psw_1.value);
    }
}


// Check or user alredy registered
function checkUser(user_email) {
    var dataString = {"userEmail" : user_email};
    var user_exist = false;
        $.ajax({
                async: false,
                type: "POST",
                data: dataString,
                url: "php/check_new_user.php",
                success: function (data) {
                        //alert(data);
                        obj = JSON.parse(data);
                        user_exist = obj.user_found;
                }
            });
    return user_exist;
}

function saveNewUser(user_email, user_key) {

    // Message if email address already registered
    if (checkUser(user_email)) {
        document.querySelector(".warning_box").style = "display: inline-block;";
        document.getElementById('warning_message').innerHTML = "Email address<br /><span class='text-danger'>" + user_email + "</span><br />already registered.<br /><br />Please enter other email address.";
    } else {
            var url1 = "php/save_new_user.php";
            var dataString = {"userPassword" : user_key, "userEmail" : user_email};
                $.ajax({
                            type: "POST",
                            data: dataString,
                            url: url1,
                            success: function (data) {
                            //alert(data);
                                obj = JSON.parse(data);
                                if(obj.status == "success"){
                                    document.querySelector(".success_msg").style = "display: inline-block;";
                                    document.getElementById("mail_adrs").innerHTML = "<b>" + user_email + "</b>";
                                }
                            }
                });
            }
}

function closeBox(box_class) {
    document.querySelector("." + box_class).style = "display: none;";
}

function userLogin() {
    let usr_psw = document.getElementById('floatingPassword');
    let usr_mail = document.getElementById('floatingInput');

    if (usr_psw.value == "") {
        usr_psw.style = "border-color: red;";
        alert("Password can't be empty.");
    } else if (usr_mail.value == "") {
        usr_mail.style = "border-color: red;";
        alert("Email address can't be empty.");
    } else {
        var url1 = "php/user_login.php";
        var dataString = {"userPassword" : usr_psw.value, "userEmail" : usr_mail.value};
            $.ajax({
                        type: "POST",
                        data: dataString,
                        url: url1,
                        success: function (data) {
                        //alert(data);
                            obj = JSON.parse(data);
                            if(obj.status == "success"){
                                if (obj.user_found == 'success') {
                                    window.location = "php/user_statistic_page.php"
                                } else {
                                    document.querySelector(".success_msg").style = "display: inline-block;";
                                }
                            }
                        }
            });
        }
}


/*
function accountCheckAndSave() {
    var whichAccount = document.getElementById('whcAccount').innerText;
    var entered_code = document.getElementById('seccconf').value;
    var cpsw = document.getElementById('confirmpsw').value;

    // Check autogenerated security code.
    if (entered_code != document.getElementById('seccode').innerText) {
        alert('Wrong security code');
        newUserDataSave(whichAccount);
    } 
    else if (cpsw == '') {
        alert('Password field empty');
        newUserDataSave(whichAccount);
    } 
    else if ((entered_code == document.getElementById('seccode').innerText) && (cpsw != '')) {
        var url1 = "accountSettings/check_user.php";
        var dataString = {"userProvidePsw" : cpsw};
            $.ajax({
                type: "POST",
                data: dataString,
                url: url1,
                success: function (data) {
                        //alert(data);
                        obj = JSON.parse(data);
                        if(obj.status == "success"){
                            
                            if(obj.pswtest != true) {
                                alert('Wrong password');
                            } else {
                                rewriteNewData(whichAccount, cpsw);
                            }

                        }

                }
            
            });
        }
    
}
        */