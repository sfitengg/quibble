var attempt_login = function(){
	var id_set = check_id();
	if(id_set)
		var password_set = check_password()
	
	if(id_set == password_set && password_set == true){
		//load the main page
		$.ajax({
			url:"/accounts/login",
			type:"POST",
			data:{email:$('#username').val(),password:$("#password").val()},
			success:function(data){
				console.log(data);
			}
		});
		alert("login successful")
	}
}

var forgot_password = function(){
	var id_set = check_id();
	if(id_set == true){
		//load the main page
		alert("Your password has been sent to your registered email id")
	}
}

var check_id = function(){
	console.log("check_id() called")
	var uname = $("#username").val();
	if( uname == ""){
		Materialize.toast('Please enter your username', 4000)
		return false;
	}
	else if(!validate_id(uname)){
		Materialize.toast('Please enter a valid username', 4000)
	}
	else{
		return true;
	}
}

var validate_id = function(id){
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(id)) {
        return true;
    }
    else {
        return false;
    }

}

var check_password = function(){
	console.log("check_password() called");
	var password = $("#password").val();
	if(password == ""){
		console.log()
		Materialize.toast('Please enter your password', 4000)
		return false;
	}
	else if(password.length < 8){
		Materialize.toast('Invalid Password.', 4000)
	}
	
	else{
		return true;
	}
}