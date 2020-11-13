window.addEventListener('DOMContentLoaded', function () {

	let fitIcons = document.querySelectorAll('.fitness__list-item'),
		audFit = new Audio('audio/mouseover3.mp3');


	ftTrackerOutput();

	fitIcons.forEach(function (item) {

		item.addEventListener('click', function () {
			audFit.play();
			let thisId = item.id.slice(5),
				thisVal = 1;

			if (item.classList.contains('complete')) {
				item.classList.remove('complete');
				thisVal = 0;
				ftTrackerUpdate(thisId, thisVal);
			} else {
				item.classList.add('complete');
				ftTrackerUpdate(thisId, thisVal);
			}

		});

	});

	function ftTrackerUpdate(id, val) {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/ft_fttrackerupdate.php";

		let params = "thisid=" + id + "&thisval=" + val;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {

			}
		});
		//	Вот здесь мы и передаем строку с данными, которую формировали выше. И собственно выполняем запрос. 
		request.send(params);
	}

	function ftTrackerOutput() {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/ft_fttrackeroutput.php";

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {
				let todayFitInfo = JSON.parse(request.responseText);
				//console.log(todayFitInfo);

				for (let i = 0; i < todayFitInfo.length; i++) {
					let squareId = todayFitInfo[i],
						squareGet = document.getElementById('fitit' + squareId);

					squareGet.classList.add('complete');

				}
			}
		});
		//	Вот здесь мы и передаем строку с данными, которую формировали выше. И собственно выполняем запрос. 
		request.send();
	}
});