window.addEventListener('DOMContentLoaded', function () {

	let habitItems = document.querySelectorAll('.habit__val-li'),
		audHab = new Audio('audio/mouseover3.mp3');

	habitItems.forEach(function (item) {
		item.addEventListener('click', function () {
			audHab.play();
			let thisId = item.id.slice(3),
				thisVal = 1;

			//console.log(thisId);

			if (item.classList.contains('complete')) {
				item.classList.remove('complete');
				thisVal = 0;
				htTrackerUpdate(thisId, thisVal);
			} else {
				item.classList.add('complete');
				htTrackerUpdate(thisId, thisVal);
			}

		});
	});

	function htTrackerUpdate(id, val) {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/ht_httrackerupdate.php";

		let params = "thisid=" + id + "&thisval=" + val;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {
				//console.log(request.responseText); 
			}
		});
		//	Вот здесь мы и передаем строку с данными, которую формировали выше. И собственно выполняем запрос. 
		request.send(params);
	}

});