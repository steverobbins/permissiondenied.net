$(document).ready(function() {

    getPassword();

    $("#getPassword").submit(function(e) {

        e.returnValue = false;
        e.preventDefault();

        $('#password').text("...");

        getPassword();
    });
});

function getPassword() {

    $.get("ajax/password.php", function(response) {

        $('#password').text(response);
    });
}