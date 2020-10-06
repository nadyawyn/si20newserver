window.addEventListener('DOMContentLoaded', function () {

	let vitaminButtons = document.querySelectorAll('.vitamins__item'),

		audVit = new Audio('audio/mouseover3.mp3'),
		audCVit = new Audio('audio/congrats.mp3');


	//Add VITAMINS as COMPLETE or uncheck them
	function vitCheckUncheck(id, val) {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/vt_vttrackerupdate.php";

		let params = "thisid=" + id + "&thisval=" + val;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {
				//let allTagReport = JSON.parse(request.responseText);
				//console.log(request.responseText);
				//console.log(allTagReport);

			}
		});
		//	Вот здесь мы и передаем строку с данными, которую формировали выше. И собственно выполняем запрос. 
		request.send(params);
	}


	//Add VITAMINS as COMPLETE or uncheck them -- IMPLEMENT
	vitaminButtons.forEach(function (item) {
		item.addEventListener('click', function () {
			audVit.play();

			let vitId = item.id.slice(2),
				vitVal = 1;

			if (item.classList.contains('complete')) {
				vitVal = 0;
				item.classList.remove('complete');
			} else {
				item.classList.add('complete');
			}

			vitCheckUncheck(vitId, vitVal);
		});
	});

});