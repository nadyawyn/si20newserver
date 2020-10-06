window.addEventListener('DOMContentLoaded', function () {

	let productAddBtn = document.getElementById('addtocalbase'),
		productAddInpProd = document.getElementById('addtobalbaseprod'),
		productAddInpCal = document.getElementById('addtobalbasecal'),
		readyInputFood = document.querySelectorAll('.ad__base-input_foodready'),
		readyInputCal = document.querySelectorAll('.ad__base-input_calready'),
		newFoodEntryInputs = document.querySelectorAll('.ad__list-item_m'),
		allHintFields = document.querySelectorAll('.hint'),
		maxCalOutput = document.getElementById('ad__max'),
		calorOutput = document.querySelector('.ad__caloriemeter'),
		calorOutputFill = document.querySelector('.ad__caloriemeter-fill'),
		calorOutputValue = document.querySelector('.ad__caloriemeter-value_num'),
		calorTotal = 0,
		waterItem = document.querySelectorAll('.ad__water-item'),

		//acquiredHintFields = document.querySelectorAll('.gothint'),

		adBase = document.querySelector('.ad__base');

	var audWater = new Audio('audio/mouseover3.mp3'),
		audCWater = new Audio('audio/congrats.mp3');

	//Getting MAX CALORIES from base

	function getPersonalMax() {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/ad_getpersonalmax.php";

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {
				let allPersonalPar = JSON.parse(request.responseText);
				//console.log(request.responseText);
				//console.log(allPersonalPar);
				calorOutputDraw(allPersonalPar.weight, allPersonalPar.height, allPersonalPar.age);
			}
		});
		//	Вот здесь мы и передаем строку с данными, которую формировали выше. И собственно выполняем запрос. 
		request.send();


	}

	//getPersonalMax();

	sumUpCalories();

	//ADD new product to Database
	function addToCalorBase() {
		if (!productAddInpProd.value || !productAddInpCal.value) {
			if (!productAddInpProd.value) {
				productAddInpProd.placeholder = "Add product name!";
			}
			if (!productAddInpCal.value) {
				productAddInpCal.placeholder = "???";
			}
		} else {
			let productName = productAddInpProd.value.toLowerCase(),
				productNameClear = productName.replace(/['"]+/g, ''),
				calorVal = productAddInpCal.value,
				calorValClear = calorVal.replace(/['"]+/g, '');

			updateCalorDataBase(productNameClear, calorValClear);
		}
	}

	function updateCalorDataBase(prodname, cal) {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/ad_addnewproduct.php";

		let params = "thisprodname=" + prodname + "&thiscal=" + cal;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {
				let addedProductInfo = JSON.parse(request.responseText);

				alert('You have added ' + addedProductInfo.newprodadded + ' (' + addedProductInfo.newcaladded + ' kcal)');

			}
		});
		request.send(params);
	}
	//EDIT product in Database
	function editCalorBase(id, prodname, cal) {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/ad_editproduct.php";

		let params = "thisid=" + id + "&thisprodname=" + prodname + "&thiscal=" + cal;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {}
		});
		request.send(params);
	}

	function getCaloriesForHint(id, prodname) {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/ad_getcalorfrombase.php";

		let params = "thisprodname=" + prodname;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {
				let thisCalorValue = +request.responseText,
					thisCVdiv = thisCalorValue / 100,
					thisGrams = +document.getElementById('qty' + id).value,
					thisFinalCal = Math.floor(thisCVdiv * thisGrams);

				document.getElementById('cal' + id).value = thisFinalCal;
				document.getElementById('cal' + id).style.backgroundColor = '#e2ffc7';

				alTrackerUpdate(id, prodname, thisGrams, thisFinalCal);

			}
		});
		request.send(params);
	}

	//Getting all calories for the DAY
	function sumUpCalories() {
		getPersonalMax();
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/ad_sumupcalor.php";

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {

				let calSumInfo = JSON.parse(request.responseText);

				for (let i = 0; i < calSumInfo.length; i++) {
					calorTotal = +calorTotal + +calSumInfo[i];
				}

				let calorTotalOutput = Math.floor(calorTotal / 10);
				calorOutputFill.style.height = calorTotalOutput + 'px';
				calorOutputValue.textContent = calorTotal;
				calorScaleColor(calorTotal, maxCalOutput.textContent);
				calorTotal = 0;
			}
		});
		request.send();
	}

	function alTrackerUpdate(id, prodname, gram, cal) {
		let finalTime = document.getElementById('time' + id).value;

		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/ad_altrackerupdate.php";

		let params = "thisid=" + id + "&thistime=" + finalTime + "&thisprodname=" + prodname + "&thisqty=" + gram + "&thiscal=" + cal;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.addEventListener("readystatechange", () => {
			if (request.readyState === 4 && request.status === 200) {
				let calSumInfo = JSON.parse(request.responseText);

				for (let i = 0; i < calSumInfo.length; i++) {
					calorTotal = +calorTotal + +calSumInfo[i];
				}

				let calorTotalOutput = Math.floor(calorTotal / 10);

				calorOutputFill.style.height = calorTotalOutput + 'px';
				calorOutputValue.textContent = calorTotal;

				calorScaleColor(calorTotal, maxCalOutput.textContent);

				calorTotal = 0;

			}
		});
		request.send(params);

	}

	//Определяем цвет калориметра
	function calorScaleColor(calvalue, maxvalue) {

		let thisShare = Math.floor((+calvalue / +maxvalue) * 100);

		if (thisShare < 25) {
			calorOutputFill.classList.remove('over100');
			calorOutputFill.classList.remove('from0to25');
			calorOutputFill.classList.remove('from25to50');
			calorOutputFill.classList.remove('from50to75');
			calorOutputFill.classList.remove('from75to100');

			calorOutputFill.classList.add('from0to25');
		} else if (thisShare < 50) {
			calorOutputFill.classList.remove('over100');
			calorOutputFill.classList.remove('from0to25');
			calorOutputFill.classList.remove('from25to50');
			calorOutputFill.classList.remove('from50to75');
			calorOutputFill.classList.remove('from75to100');

			calorOutputFill.classList.add('from25to50');
		} else if (thisShare < 75) {
			calorOutputFill.classList.remove('over100');
			calorOutputFill.classList.remove('from0to25');
			calorOutputFill.classList.remove('from25to50');
			calorOutputFill.classList.remove('from50to75');
			calorOutputFill.classList.remove('from75to100');

			calorOutputFill.classList.add('from50to75');
		} else if (thisShare < 100) {
			calorOutputFill.classList.remove('over100');
			calorOutputFill.classList.remove('from0to25');
			calorOutputFill.classList.remove('from25to50');
			calorOutputFill.classList.remove('from50to75');
			calorOutputFill.classList.remove('from75to100');

			calorOutputFill.classList.add('from75to100');
		} else {
			calorOutputFill.classList.remove('from0to25');
			calorOutputFill.classList.remove('from25to50');
			calorOutputFill.classList.remove('from50to75');
			calorOutputFill.classList.remove('from75to100');

			calorOutputFill.classList.add('over100');
		}


	}

	//Рисуем столбик калориметра
	function calorOutputDraw(weight, height, age) {
		//const rmr = (655 + (9.6 * weight) + (1.8 * height) - (4.7 * age)) * 1.3;
		const rmr = (9.99 * weight + 6.25 * height - 4.92 * age - 161) * 1.2;
		calorOutput.style.height = Math.floor(rmr / 10) + 'px';
		maxCalOutput.textContent = Math.floor(rmr);
	}

	function getAlHint(id, str) {

		if (str.length == 0) {
			document.getElementById('hint' + id).innerHTML = "";
			return;
		} else {

			let xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById('hint' + id).innerHTML = xmlhttp.responseText;

					let acquiredHintFields = document.querySelectorAll('.gothint');

					//При нажатии на подсказку подставляем ее в поле и, если есть ВРЕМЯ, добавляем в базу
					acquiredHintFields.forEach(function (item) {
						item.style.backgroundColor = '#ff8f00';
						item.style.color = '#ffffff';
						item.addEventListener('click', function () {
							let thisIdval = item.parentNode.id.slice(4);


							document.getElementById('meal' + thisIdval).value = item.textContent;

							let thisTimeInp = document.getElementById('time' + thisIdval),
								thisGramInp = document.getElementById('qty' + thisIdval);

							if (!thisTimeInp.value || !thisGramInp.value) {
								thisTimeInp.style.backgroundColor = '#fff9c7';
								thisGramInp.style.backgroundColor = '#fff9c7';
							} else {

								thisTimeInp.style.backgroundColor = '#e2ffc7';
								thisGramInp.style.backgroundColor = '#e2ffc7';

								let inputValC = item.textContent;

								getCaloriesForHint(thisIdval, inputValC);

								item.parentNode.textContent = "";
							}
						});

					});

				}
			};
			xmlhttp.open("GET", "proc/ad_getproductfrombase.php?q=" + str, true);
			xmlhttp.send();
		}

	}

	//Добавляем данные о воде
	function wTrackerUpdate(id, val) {
		// Создаем экземпляр класса XMLHttpRequest
		let request = new XMLHttpRequest();
		// Указываем путь до файла на сервере, который будет обрабатывать наш запрос 
		let url = "proc/ad_waterupdate.php";

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

	// Выводим подсказки в ALIMENTATION TRACKER
	newFoodEntryInputs.forEach(function (item) {
		item.addEventListener('keyup', function () {
			let thisFieldId = item.id.slice(4),
				thisFieldVal = item.value.toLowerCase(),
				thisFieldValClear = thisFieldVal.replace(/['"]+/g, ''),
				thisFieldValClearAll = thisFieldValClear.replace(/[\\\/]/g, '');


			getAlHint(thisFieldId, thisFieldValClearAll);
		});
	});

	//Обрабатываем событие изменения поля приема пищи
	newFoodEntryInputs.forEach(function (item) {
		item.addEventListener('change', function () {
			let inputId = item.id.slice(4);

			let thisTimeInp = document.getElementById('time' + inputId),
				thisGramInp = document.getElementById('qty' + inputId),
				thisCalInp = document.getElementById('cal' + inputId);

			if (!thisTimeInp.value || !thisGramInp.value) {
				thisTimeInp.style.backgroundColor = '#fff9c7';
				thisGramInp.style.backgroundColor = '#fff9c7';
			} else {

				thisTimeInp.style.backgroundColor = '#e2ffc7';
				thisGramInp.style.backgroundColor = '#e2ffc7';

				let inputValC = item.value.toLowerCase(),
					inputValCClear = inputValC.replace(/['"]+/g, ''),
					inputValCClearAll = inputValCClear.replace(/[\\\/]/g, ''),
					inputValT = thisTimeInp.value;

				if (thisCalInp.value) {
					let inputCalC = thisCalInp.value;
					thisCalInp.style.backgroundColor = '#e2ffc7';

				}

			}

		});
	});

	readyInputFood.forEach(function (item) {
		item.addEventListener('change', function () {
			let thisFieldId = item.id.slice(7),
				thisFieldVal = item.value.toLowerCase(),
				thisFieldValClear = thisFieldVal.replace(/['"]+/g, ''),
				theOtherField = document.getElementById('calor' + thisFieldId),
				theOtherFieldVal = theOtherField.value;

			editCalorBase(thisFieldId, thisFieldValClear, theOtherFieldVal);

		});
	});

	readyInputCal.forEach(function (item) {
		item.addEventListener('change', function () {
			let thisFieldId = item.id.slice(5),
				thisFieldVal = item.value,
				theOtherField = document.getElementById('product' + thisFieldId),
				theOtherFieldVal = theOtherField.value.toLowerCase(),
				theOtherFieldValClear = theOtherFieldVal.replace(/['"]+/g, '');

			editCalorBase(thisFieldId, theOtherFieldValClear, thisFieldVal);

		});
	});

	productAddBtn.addEventListener('click', addToCalorBase, false);

	// Сохраняем данные воды в WATER TRACKER

	waterItem.forEach(function (item) {
		item.addEventListener('click', function () {
			audWater.play();

			let cupId = item.id.slice(3),
				cupVal = 1;

			if (item.classList.contains('complete')) {
				cupVal = 0;
				item.classList.remove('complete');
			} else {
				item.classList.add('complete');
			}

			wTrackerUpdate(cupId, cupVal);
		});
	});
});