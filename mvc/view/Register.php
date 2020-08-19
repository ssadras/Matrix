<div id="error" class="alert" hidden>
	<strong> خطا  </strong>
</div>
<form class="box">
	<h1>  ! ثبت نام کنید</h1>
	<input type="text" name="first_name" id="first_name" placeholder="   نام ">
	<input type="text" name="last_name" id="last_name" placeholder="  نام خانوادگی">
	<input type="text" name="username" id="username" placeholder="  (الزامی) نام کاربری  ">
	<input type="password" name="password" id="password" placeholder=" (الزامی) رمز عبور  ">
	<input type="password" name="repeat_password" id="repeat_password" placeholder=" (الزامی) تکرار رمز عبور ">
	<input type="email" name="email" id="email" placeholder=" (الزامی) ایمیل ">
	<input type="tel" name="phone_number" id="phone_number" placeholder="  شماره همراه ">
	<label class="container">آقا
		<input type="radio" checked="checked" name="radio">
		<span class="checkmark"></span>
	</label>
	<label class="container">خانم
		<input type="radio" name="radio">
		<span class="checkmark"></span>
	</label>
	<label class="container">سایر
		<input type="radio" name="radio">
		<span class="checkmark"></span>
	</label>
	<p> <a href="#">قوانین و مقررات </a>را قبول دارم</p>
	<input onclick="submit_register()" type="button" name="Register" id="Register" value=" ثبت نام ">
	<p>  قبلا ثبت نام کردید ؟ <a href="#">  وارد شوید   </a> </p>
</form>
<script src="../js/Register.js"></script>
