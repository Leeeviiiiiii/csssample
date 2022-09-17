$(document).ready(function(){
    $("#conf_password").keyup(function(){
        if($("#reg_password").val()==$("#conf_password").val()){
            $("#message").html("Password Match");
            $("#message").css("color", "green");
            $("#reg_submit").prop("disabled" , false);
        }else{
            $("#message").html("Password does not Match");
            $("#message").css("color", "red");
            $("#reg_submit").prop("disabled" , true);
        }
    });
});