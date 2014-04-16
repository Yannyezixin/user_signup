function pawtype(){
passwordLength = document.getElementById("password").value;
errors = document.getElementById("error");
if(passwordLength.length<6 || passwordLength.length>16){
    errors.innerHTML = '密码长度应为6～16长度';
}
else{
    errors.innerHTML = '';
}
}
function emailcomfired(){
    with(document.getElementById("email")){
        aops = value.indexOf("@");
        dotpos = value.lastIndexOf(".");
        if(aops<1||dotpos-aops<2){
            document.getElementById("error1").innerHTML = '邮件格式不正确';
        }else{
            document.getElementById("error1").innerHTML = '';
        }
    }
}
function comfired(){
    comfiredpsd = document.getElementById("comfiredpassword").value;
    error2 = document.getElementById("error2");
    emailcomfired();
    pawtype();
    if(comfiredpsd != document.getElementById("password").value){
        error2.innerHTML = "前后两次密码不正确";
        return false;
    }else{
        error2.innerHTML = "";
        return true;
    }
}
