var username = $('#username')[0];
var password = $('#password')[0];
var eror_box = $('#eror');

function all_is_number(string) {
	if (string.length == 0)
		return false;
	for (let char of string){
		if (!('0' <= char && char <= '9'))
			return false;
	}
	return true;
}

function submit_login(){
	eror_text = '';
	if (username.value == '') {
		eror_text += "<b>نام کاربری</b> را وارد کنید <br/>";
	}
	if (password.value == ''){
		eror_text += "<b>رمز عبور</b> را وارد کنید<br/>";
	}
	if (eror_text != ''){
		eror_box.html(eror_text);
		eror_box.show();
		return false;
	}
	$.post('../user/login',
	{
		user: username.value,
		pass: password.value,
		jsconf: 1
	}, function(data){
		if (all_is_number(username.value) || all_is_number(password.value) || data == 0)
			eror_box.text("<b>نام کاربری</b> یا <b>رمز عبور</b> اشتباه است<br/>");
		else
			window.location.replace(data);
	});

}
