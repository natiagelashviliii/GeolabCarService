function isEmail(email) {
    var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
    if (email.search(emailRegEx) == -1) {
        return (false);
    }
    return (true);
}

$(document).ready(function(){
    $(".toggle").click(function(){
        $("ul").toggle();
    });
});

