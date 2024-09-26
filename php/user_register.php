<?php
session_start();
date_default_timezone_set('Europe/London');
setlocale(LC_ALL,'en_GB');


$register_form_html="<div class=\"fun_ico_safe mb-3\"></div>
                    <div class=\"warning_box\">
                        <div id=\"warning_message\">Message</div>
                        <button class=\"btn btn-primary mt-5 btn-lg fw-bold\" onClick=\" closeBox('warning_box')\">Close </button>
                    </div>

                    <div class=\"success_msg\">
                        <div class=\"card\">
                            <h5 class=\"card-header\">Congratulation!</h5>
                            <div class=\"card-body\" style=\"text-align: center;\">
                                <h5 class=\"card-title\">User created successfully</h5>
                                <p class=\"card-text\">Email address <span id=\"mail_adrs\">test@test.com</span> registered.<br />
                                please use this email address to login.</p>
                                <a href=\"#\" class=\"btn btn-success\" onClick=\"closeBox('success_msg'); reloadPage();\">Close</a>
                            </div>
                        </div>
                    </div>

                    <div class=\"form-floating mb-3\">
                        <input type=\"email\" class=\"form-control\" id=\"usr_email\" placeholder=\"name@example.com\">
                        <label for=\"user_email\">Email address</label>
                    </div>
                    <div class=\"form-floating mb-3\">
                        <input type=\"email\" class=\"form-control\" id=\"usr_email-rep\" placeholder=\"name@example.com\">
                        <label for=\"usr_email-rept\">Repeat Email address</label>
                    </div>
                    <div class=\"form-floating mb-3\">
                        <input type=\"password\" class=\"form-control\" id=\"usr_pasw\" placeholder=\"Password\">
                        <label for=\"usr_pasw\">Password</label>
                    </div>
                    <div class=\"form-floating mb-4\">
                        <input type=\"password\" class=\"form-control\" id=\"repeat_psw\" placeholder=\"Password\">
                        <label for=\"repeat_psw\">Repeat Password</label>
                    </div>
                    <div class=\"d-grid gap-3\">
                        <input class=\"btn btn-primary btn-lg fw-bold\" type=\"submit\" value=\"Submit\" onClick=\"newUserRegister();\">
                        <input class=\"btn btn-outline-secondary btn-lg fw-bold\" type=\"submit\" value=\"Cancel\" onClick=\"reloadPage()\";>
                    </div>
        ";

$mainarray = array();
$mainarray['status']="success";
$mainarray['new_user_register'] = $register_form_html;
echo json_encode($mainarray);
exit;

?> 