import "./bootstrap";

// jquery validate repeat password

$(document).ready(function () {
    $("#passwordInputRegister, #repeatPasswordInputRegister").on(
        "keyup",
        function () {
            let passwordInput = $("#passwordInputRegister").val();
            let repeatPasswordInput = $("#repeatPasswordInputRegister").val();
            let repeatPasswordMessage = $("#repeatPasswordMessage");

            if (passwordInput !== "" && repeatPasswordInput !== "") {
                if (passwordInput == repeatPasswordInput) {
                    repeatPasswordMessage
                        .html("Password match")
                        .css("color", "green");
                } else
                    repeatPasswordMessage
                        .html("Password do not match")
                        .css("color", "red");
            }
        }
    );
});
