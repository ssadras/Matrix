var username = $('#username')[0];
var password = $('#password')[0];
var submit = $('#submit')[0];

function all_is_number(string) {
	if (string.length == 0)
		return false;
	for (let char of string){
		if (!('0' <= char && char <= '9'))
			return false;
	}
	return true;
}

function submission(){
	if (username.value == '' || password.value == '') {
		alert('salam salam');
		return false;
	}
	if (all_is_number(username.value) || all_is_number(password.value)) {
		alert('چرا همش عدده');
		return false
	}
	$.post('../user/login',
	{
		'user': username.value,
		'pass': password.value,
		'jsconf': 1 
	}, function(data){
		if (data == 0)
			alert("چرا عین آدم وارد نمیکنی؟؟");
		else
			window.location.replace(data);
	});

}
