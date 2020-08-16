$(document).ready(function () {
    function ajax() {
        var data = $(".restore_password").val();
        $.ajax({
            type: "POST",
            url: "http://coding/probe/restore_password.php",
            data: { name: "a" },
            success: function (answer) {
                $(".forgot_pass").after(answer);
            },
            statusCode: {
                200: function () {
                    console.log("OK");
                }
            },
        })
    }

    $(".forgot_pass").click(function () {
        $("form[name=registration]").css("display", "none");
        $("form[name=restore_password]").css("display", "block");
        
        
    })

})