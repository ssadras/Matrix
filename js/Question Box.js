var main_box = $('#main_box')[0];
var questions_data = [{name:'Key Kavous', id: '1234', solved:'4'}, {name:'Key Kavous', id: '1234', solved:'4'}, {name:'Key Kavous', id: '1234', solved:'4'}, {name:'Key Kavous', id: '1234', solved:'4'}];
function show_div(questions_data) {
	//alert(23);
	for (let question_data of questions_data){
		var question_box = document.createElement("div");
		var paragraph = document.createElement("p");
		let text = document.createTextNode('name : ' + question_data.name + ' , id : ' + question_data.id + ' solved : ' + question_data.solved);
		paragraph.appendChild(text);
		question_box.appendChild(paragraph);
		question_box.style.color = "blue";
		main_box.appendChild(question_box);
	}
}
show_div(questions_data);
