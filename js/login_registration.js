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