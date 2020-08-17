var main_box = $('#main_box');
$.get('../user/login', dataType='json', success=function(data){
	for (let question_data of data){
		let new_question = createElement("div");
		new_question.class = "question_box";
		let data.createTextNode('name : ' + question_data.name + ' , id : ' + question_data.id + ' , solve_numbers : ' + question_data.solve);
		new_question.appendChild(data);
		main_box.appendChild(new_question);