var first_name = $('#first_name')[0];
var last_name = $('#last_name')[0];
var username = $('#username')[0];
var password = $('#password')[0];
var repeat_password = $('#repeat_password')[0];
var email = $('#email')[0];
var phone_number = $('#phone_number')[0];
var error_box = $('#error');

function all_is_number(string) {
	if (string.length == 0)
		return false;
	for (let char of string){
		if (!('0' <= char && char <= '9'))
			return false;
	}
	return true;
}

function invalid_username(){
	for (let char of username.value)
		if ( !('A' <= char && char <= 'Z') && !('a' <= char && char <= 'z') && !('0' <= char && char <= '9') && char != '_' && char != '-' && char != '.')
			return true;
	return false;
}

function invalid_password(){
	for (let char of password.value)
		if ( !(32 <= char.charCodeAt() && char.charCodeAt() <= 126) )
			return true;
	return false;
}

function invalid_email(){
	var email_addsign = email.value.split("@");
	if (email_addsign.length != 2 || email_addsign[0] == '' || email_addsign[1] == '')
		return true;
	var email_dot = email_addsign[1].split('.');
	if (email_dot.length != 2 || email_dot[0] == '' || email_dot[1] == '')
		return true;
	return false;
}

function invalid_phone_number(){
	if (phone_number.value.length == 0)
		return false;
	var main_number = phone_number.value.slice(1);
	alert(main_number);
	if ( all_is_number(main_number) && ( (phone_number.value[0] == '+' && phone_number.value.length == 13) || (phone_number.value[0] == '0' && phone_number.value.length == 11) || (phone_number.value[0] == '9' && phone_number.value.length == 10) ) )
		return false;
	return true;
}

function submit_register() {
	error_box.hide();
	$.post('../user/login',
	{
		f_name: first_name.value,
		l_name: last_name.value,
		user: username.value;
		pass: password.value,
		repass: repeat_password.value,
		mail: email.value,
		phone: phone_number.value
	}, function(data){
		error_text = '';
		statues = data.statues;
		if (username.value == '')
			error_text += "<b>نام کاربری</b> را وارد کنید<br/>";
		else if (username.value.length < 6)
			error_text += "<b> نام کاربری</b> باید حداقل 6 کاراکتر باشد<br/>";
		if (invalid_username())
			error_text += "<b>نام کاربری</b> تنها باید شامل حروف لاتین و کاراکترهای _، - و . باشد<br/>";
		else if (statues.username == 'invalid')
			error_text += "<b>نام کاربری</b> تکراری است<br/>";
		if (password.value == '')
			error_text += "<b>رمز عبور</b> را وارد کنید<br/>";
		else if (password.value.length < 8)
			error_text += "<b>رمز عبور<b> باید حداقل 8 کاراکتر باشد<br/>";
		if (invalid_password())
			error_text += "<b>رمز عبور</b> نباید شامل کاراکترهای نامتعارف باشد<br/>";
		else if (password.value != repeat_password.value || statues.equal_passwords == 'invalid')
			error_text += "<b>رمز عبور</b> و تکرار آن مطابقت ندارد<br/>";
		if (invalid_email() || statues.email == 'invalid')
			error_text += "<b>ایمیل</b> نامعتبر است<br/>";
		if (invalid_phone_number() || statues.phone == 'invalid')
			error_text += "<b>شماره تلفن</b> نامعتبر است<br/>";
		if (error_text != ''){
			error_box.html(error_text);
			error_box.show();
		}
		else{
			window.location.replace(data.url);
		}

	}, 'json');

}
