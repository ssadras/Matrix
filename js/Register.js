var first_name = $('#first_name')[0];
var last_name = $('#last_name')[0];
var username = $('#username')[0];
var password = $('#password')[0];
var repeat_password = $('#repeat_password')[0];
var email = $('#email')[0];
var phone_number = $('#phone_number')[0];

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
	if (password.value == repeat_password.value)
		return true;
	return false;
}

function valid_email(){
	var email_addsign = email.value.split("@");
	if (email_addsign.length != 2 || email_addsign[0] == '' || email_addsign[1] == '')
		return false;
	var email_dot = email_addsign[1].split('.');
	if (email_dot.length != 2 || email_dot[0] == '' || email_dot[1] == '')
		return false;
	return true;
}

function valid_phone_number(){
	if (phone_number.value.length == 0)
		return true;
	var main_number = phone_number.value.slice(1);
	alert(main_number);
	if ( all_is_number(main_number) && ( (phone_number.value[0] == '+' && phone_number.value.length == 13) || (phone_number.value[0] == '0' && phone_number.value.length == 11) || (phone_number.value[0] == '9' && phone_number.value.length == 10) ) )
		return true;
	return false;
}

function submit_register() {
	if ( (username.value != '' && password.value != '' && repeat_password.value != '' && email.value != '') && !all_is_number(username.value) && !all_is_number(password.value) && !all_is_number(repeat_password.value) && equal_passwords() && valid_email() && valid_phone_number() ) {
		$.post('../user/register',
			{
				first_name: first_name.value,
				last_name: last_name.value,
				user: username.value,
				pass: password.value,
				repass: repeat_password.value,
				mail: email.value,
				phone: phone_number.value
			}, function (data) {
				data=JSON.parse(data)
				if (data.status == 0)
					alert(data.error);
				else {
					window.location.replace(data.url);
				}
			});
	}
	else{
		alert('ay baba');
	}
}
