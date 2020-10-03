$(function () {
    // For user Registration
    $("#regsubmit").click(function () {

        let name = $("#name").val();
        let username = $("#username").val();
        let password = $("#password").val();
        let email = $("#email").val();
        let dataString = 'namee=' + name + '&usernamee=' + username + '&passwordd=' + password + '&emaill=' + email;

        $.ajax({
            type: "POST",
            url: "getregister.php",
            data: dataString,
            success: function (daata) {
                $("#state").html(daata);
            }
        });
        return false;
    });


    // For user Login
    $("#loginsubmit").click(function () {
        let email = $("#email").val();
        let password = $("#password").val();
        let dataString = 'emaill=' + email + '&passwordd=' + password;

        $.ajax({
            type: "POST",
            url: "getlogin.php",
            data: dataString,
            success: function (daata) {
                if ($.trim(daata) == "empty") {//echo "empty"; User.php
                    $(".empty").show();
                    setTimeout(function () {
                        $(".empty").hide();
                        //$(".empty").fadeOut();
                    }, 4000);
                } else if ($.trim(daata) == "disable") {//echo "disable"; User.php
                    $(".disable").show();
                    setTimeout(function () {
                        $(".disable").fadeOut();
                    }, 4000);

                } else if ($.trim(daata) == "error") {//echo "error"; User.php
                    $(".error").show();
                    setTimeout(function () {
                        $(".error").fadeOut();
                    }, 4000);
                } else {
                    window.location = "exam.php";
                }
            }
        });
        return false;
    });
});