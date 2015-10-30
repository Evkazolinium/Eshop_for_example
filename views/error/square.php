<? include ROOT.'/views/layouts/header.php';?>
<style>
    .brdR {
	border: 4px double black; /* Параметры границы */
	border-color: #6495ED;
	border-width: 4px;
	border-radius: 8px;
    background: #FFFAFA; /* Цвет фона */
    padding: 10px;
	width: 5px;
    height: 5px;
}
#count, #main, h2 {position: absolute; overflow: auto; }
.count_snake {
	top: 15px;
	left: 140px;
    color: green;
	font: 24pt sans-serif; 
}
h2 {font: 24pt sans-serif; color: green; left: 20px;}
#main {
	position: absolute;
	overflow: auto;
	padding: 10px;
	top: 92px;
	left: 200px;	
	bottom: 0; right: 0;
}
#cover-div {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9000;
    width: 100%;
    height: 100%;
    background-color: gray;
    opacity: 0.3;
}
.form {
	position: absolute;
	display: inline-block;
	padding: 5px 5px 5px 70px;
	width: 200px;
	border: 1px solid black;
	vertical-align: middle;
	top: 82px;
	left: 700px;	
}

#form-container {
	position: fixed;
	top: 0;
	left: 0;
	z-index: 9999;
	display: none;
	width: 100%;
	height: 100%;
	text-align: center;
}

</style>
<script>
/******Змейка******/
/* Заметки: 
	сложность:
		1. простая(медленная скорость)
		2. средняя(быстрая скорость)
		3. высокая(быстрая скорость, кубики показываются на пару мгновений, змейка исчезает иногда)
		4. несправедливая(происходит хаос, а именно - змейка может стать меньше и все , что в высокой)
	imposibly game:
		ездит по квадрату(изнутри)
*********Конец заметок*********/
window.onload = function() {
	var n = 20, m = 20;
	var arr = [];
	var drawJ = 0, drawI = 0, count = 0, x = -3, t = 100, div, snake, elemRandI, elemRandJ, divRand, counter = 0, k = 1;
	myCount();
	square();
/*****Отрисовка поля "действия"******/
/**************Анимация змейки*********************/
	var snake =  setInterval(function() { drawSnake();}, 100);
	function drawSnake() {
		if(drawJ < m && drawI < n) {
			var div = arr[drawI][drawJ];
			if(div.style.background == "rgb(0, 255, 0)") {
				alert("Game Over");
				clearInterval(snake);
				options();				
			}
			div.style.background = "#00FF00";
			setTimeout(function() { div.style.background = "#FFFAFA";}, t);
		}
		elemForSnake();
		if(drawI == elemRandI && drawJ == elemRandJ) {
			t += 120;
			divRand.style.background = "#00FF00";
			counter = 0;
			myCount();
		}
		keyPress();
		switch(count) {
			case 2: drawJ--; break;
			case 1: drawI++; break;
			case 3: drawI--; break;
			default: drawJ++;
		}
			
		if(drawI >= m || drawJ >= m || drawI < 0 || drawJ < 0) {
			clearInterval(snake);
			alert("Game Over");
			options();
		}
	}
	function square() {
		for(var i = 0; i < n; i++) {
			var divR = document.createElement('div');
			arr[i] = divR;
			for(var j = 0; j < m; j++) {
				var divC = document.createElement('div');
				divC.className = "brdR";
				divC.style.float = "left";
				divC.setAttribute("id", j);
				main.appendChild(divC);
				arr[i][j] = divC;
			}
			divR.className = "brdR";
			divR.setAttribute("id", i);
			main.appendChild(divR);
		}
	}
	/*********Управление змейкой************/
	function keyPress() {
		addEventListener("keydown", function(event) {
			switch(event.keyCode) {
				case 40: if(count != 3) count = 1; break;
				case 39: if(count != 2) count = 0; break;
				case 37: if(count != 0) count = 2; break;
				case 38: if(count != 1) count = 3; break;
			}
		});	
	}
	/*************Геймплей*****************/
	function elemForSnake() {
		if(counter < 1) {
			elemRandJ = getRandomInt(0, n-1);
			elemRandI = getRandomInt(0, m-1);
			divRand = arr[elemRandI][elemRandJ];
			if(divRand.style.background != "rgb(0, 255, 0)") {
				divRand.style.background = "#48D1CC";
			}else
				elemForSnake();
		}
		counter = 1;
	}
	function getRandomInt(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}

	function myCount() {
		var elem = document.getElementById('count_snake');
		elem.innerHTML = k++;
		elem.className = "count_snake";
	}
	function options() {
		showCover();
		var conteiner = document.getElementById('form-container');
		var form = document.createElement('div');
		form.className = "form";
		conteiner.appendChild(form);
	}
	function showCover() {
      var coverDiv = document.createElement('div');
      coverDiv.id = 'cover-div';
      document.body.appendChild(coverDiv);
    }

    function hideCover() {
      document.body.removeChild(document.getElementById('cover-div'));
    }
}
</script>
<body>
	   <h2>Счет :
	<div id="count_snake"></div>
           </h2>
	<div id="main"></div>
	<div id="form-container">
		<form id="form">
		<button name="ok" value="New game">
		</form>
	</div>
</body>