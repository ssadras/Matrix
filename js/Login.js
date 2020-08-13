var username = document.getElementById('username');
var password = document.getElementById('password');
var submit = document.getElementById('submit');
function check_all_number(string) {
	for (let char of string){
		if (!('0' <= char && char <= '9'))
			return false
	}
	return true
}
function check_empty_value(){
	if (username.value == '' || password.value == '')
		alert('salam salam')
	else if (check_all_number(username.value))
		alert('چرا همش عدده')
}