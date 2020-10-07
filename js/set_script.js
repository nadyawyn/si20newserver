window.addEventListener('DOMContentLoaded', function () {

	let genItems = document.querySelectorAll('.main_settings-gen-item'),

		pParUpdate = document.getElementById('setppupdate'),
		bParUpdate = document.getElementById('setbpupdate'),
		pbParInputs = document.querySelectorAll('.set__list-item_body'),

		myAge = document.getElementById('ftage'),
		myHeight = document.getElementById('ftheight'),
		myWeight = document.getElementById('ftweight'),
		myBreast = document.getElementById('ftbreast'),
		myWaist = document.getElementById('ftwaist'),
		myHips = document.getElementById('fthips'),
		myLeg = document.getElementById('ftleg'),
		myBelly = document.getElementById('ftbelly'),

		newVitamin = document.getElementById('addvitinp'),
		newVitaminBut = document.getElementById('addvitbutton'),
		existingVitamin = document.querySelectorAll('.vitamin'),
		vitDelBtn = document.querySelectorAll('.vitdel'),

		audChoose = new Audio('audio/mouseover3.mp3');

	//Включение и выключение модулей
	genItems.forEach(function (item) {
		item.addEventListener('click', function () {
			audChoose.play();
			genItemSelect(item);
		});
	});

	//Ввод фитнес параметров
	pParUpdate.addEventListener('click', bodyParUpdate, false);
	bParUpdate.addEventListener('click', bodyParUpdate, false);

	//Обработка витаминов
	newVitaminBut.addEventListener('click', addNewVitamin, false);

	existingVitamin.forEach(function (item) {
		item.addEventListener('change', function () {

			let thisVal = item.value.toLowerCase(),
				thisValClear = thisVal.replace(/['"]+/g, ''),
				thisId = item.id.slice(2);

			editVitaminList(thisId, thisValClear);
		});
	});

	vitDelBtn.forEach(function (item) {
		item.addEventListener('click', function () {

			audChoose.play();

			let checkMessage = confirm('Delete this one?');

			if (checkMessage == true) {
				let thisId = item.id.slice(5);

				let thisVitLi = document.getElementById('vtli' + thisId);
				thisVitLi.remove();

				deleteFromVitaminList(thisId);
			}

		});
	});

	function genItemSelect(it) {
		if (it.classList.contains('inactive')) {
			it.classList.remove('inactive');
			let thisVal = 1,
				thisId = it.id.slice(3);

			genItemUpdate(thisId, thisVal);
		} else {
			it.classList.add('inactive');
			let thisVal = 0,
				thisId = it.id.slice(3);

			genItemUpdate(thisId, thisVal);
		}
	}
	//Добавляем данные о воде
	function genItemUpdate(id, val) {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/set_genitemupdate.php";

		let params = "thisid=" + id + "&thisval=" + val;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {

			}
		});

		request.send(params);
	}

	function bodyParUpdate() {

		let myFlag = 0;
		pbParInputs.forEach(function (item) {
			let thisVal = item.value;

			if (!isNaN(thisVal) && thisVal) {
				//console.log(thisVal);
				item.style.backgroundColor = "#aeff9c";

				myFlag = myFlag + 1;
			} else {
				item.style.backgroundColor = "#ff9c9c";

			}

		});

		if (myFlag == 8) {

			// Создаем экземпляр класса XMLHttpRequest
			let request = new XMLHttpRequest();
			// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
			let url = "proc/set_pbparupdate.php";

			let params = "age=" + myAge.value + "&height=" + myHeight.value + "&weight=" + myWeight.value + "&breast=" + myBreast.value + "&waist=" + myWaist.value + "&hips=" + myHips.value + "&leg=" + myLeg.value + "&belly=" + myBelly.value;

			request.open("POST", url, true);
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.addEventListener("readystatechange", () => {
				if (request.readyState === 4 && request.status === 200) {
					//console.log(request.responseText);
				}
			});

			request.send(params);

			alert('All updated successfully!');
		}
	}

	// ADD new VITAMIN to base
	function addNewVitamin() {
		if (!newVitamin.value) {
			newVitamin.placeholder = "Add vitamin name!";
		} else {
			let vitaminName = newVitamin.value.toLowerCase(),
				vitaminNameClear = vitaminName.replace(/['"]+/g, '');

			updateVitaminList(vitaminNameClear);
		}

	}

	function updateVitaminList(vitname) {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/set_addnewvitamin.php";

		let params = "vitaminname=" + vitname;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {
				//console.log(request.responseText);
				let addedVitInfo = JSON.parse(request.responseText);

				if (addedVitInfo.newvitadded) {
					alert('You have added ' + addedVitInfo.newvitadded);
					location.reload();
				} else {
					alert('You already have such vitamin =)');
				}

			}
		});

		request.send(params);
	}

	// EDIT existing VITAMIN
	function editVitaminList(id, vitname) {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/set_editvitamin.php";

		let params = "thisid=" + id + "&thisvitname=" + vitname;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {
				//console.log(request.responseText);
			}
		});
		request.send(params);
	}

	//DELETE existing VITAMIN
	function deleteFromVitaminList(id) {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/set_delvitamin.php";

		let params = "thisid=" + id;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {
				console.log(request.responseText);
			}
		});
		request.send(params);
	}
});