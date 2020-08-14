var username = $('#username')[0].value;
var password = $('#password')[0].value;

function all_is_number(string) {
	if (string.length == 0)
		return false;
	for (let char of string){
		if (!('0' <= char && char <= '9'))
			return false;
	}
	return true;
}

function login(){
	if (username == '' || password == '') {
		alert('salam salam');
		return false;
	}
	if (all_is_number(username) || all_is_number(password)) {
		alert('چرا همش عدده');
		return false
	}
	$.post('../user/login',
	{
		user: username,
		pass: password,
		jsconf: 1
	}, function(data){
		if (data == 0)
			alert("چرا عین آدم وارد نمیکنی؟؟");
		else
			window.location.replace(data);
	});

}
