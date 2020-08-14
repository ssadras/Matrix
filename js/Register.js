var first_name = $('#first_name')[0].value;
var last_name = $('#last_name')[0].value;
var username = $('#username')[0].value;
var password = $('#password')[0].value;
var repeat_password = $('#repeat_password')[0].value;
var email = $('#email')[0].value;
var phone_number = $('#phone_number')[0].value;

function all_is_number(string) {
	if (string.length == 0)
		return false;
	for (let char of string){
		if (!('0' <= char && char <= '9'))
			return false;
	}
	return true;
}

function equal_passwords(){
	if (password == repeat_password)
		return true;
	return false;
}

function valid_email(){
	var email_addsign = email.split("@");
	if (email_addsign.length != 2 || email_addsign[0] == '' || email_addsign[1] == '')
		return false;
	var email_dot = email_addsign[1].split('.');
	if (email_dot.length != 2 || email_dot[0] == '' || email_dot[1] == '')
		return false;
	return true;
}

function valid_phone_number(){
	var main_number = phone_number.slice(1);
	if ( all_is_number(main_number) && ( (phone_number[0] == '+' && phone_number.length == 13) || (phone_number[0] == '0' && phone_number.length == 11) || (phone_number[0] == '9' && phone_number.length == 10) ) )
		return true;
	return false;
}

function register_js() {
	if ( (username != '' && password != '' && repeat_password != '' && email != '') && !all_is_number(username) && !all_is_number(password) && !all_is_number(repeat_password) && equal_passwords() && valid_email() && valid_phone_number() ) {
		$.post('../user/login',
			{
				first_name: first_name,
				last_name: last_name,
				username: username,
				pass: password,
				repass: repeat_password,
				mail: email,
				phone: phone_number
			},
			function (data) {
				if (data.statues == 0)
					alert(data.error);
				else
					window.location.replace(data.url);
			});
	}
}