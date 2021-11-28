function validate()
{

var a=document.forms["form"].name.value;

if (a<0 || a>10)

{
	alert("Введите корректное число");
	var drawingCanvas = document.getElementById('smile');
	if(drawingCanvas && drawingCanvas.getContext) {
		var context = drawingCanvas.getContext('2d');
		//окружность
		context.strokeStyle="#000";
		context.fillStyle="#FF0000";
		context.beginPath();
		context.arc(100,100,50,0,Math.PI*2,true);
		context.closePath();
		context.stroke();
		context.fill();
		//левый глаз
		context.fillStyle="#fff";
		context.beginPath();
		context.arc(84,90,8,0,Math.PI*2,true);
		context.closePath();
		context.stroke();
		context.fill();
		//правый глаз
		context.beginPath();
		context.arc(116,90,8,0,Math.PI*2,true);
		context.closePath();
		context.stroke();
		context.fill();
		//рот
		context.beginPath();
		context.moveTo(70,115);
		context.quadraticCurveTo(100,95,130,115);
		context.quadraticCurveTo(100,80,70,115);
		context.closePath();
		context.stroke();
		context.fill();
	
	}
}
else if (a>5)
{	
var drawingCanvas=document.getElementById('smile');

if (drawingCanvas && drawingCanvas.getContext)
{
var context=drawingCanvas.getContext('2d');
alert("Спасибо за хорошую оценку!");
		//окружность
		context.strokeStyle="#000";
		context.fillStyle="#fc0";
		context.beginPath();
		context.arc(100,100,50,0,Math.PI*2,true);
		context.closePath();
		context.stroke();
		context.fill();
		//левый глаз
		context.fillStyle="#fff";
		context.beginPath();
		context.arc(84,90,8,0,Math.PI*2,true);
		context.closePath();
		context.stroke();
		context.fill();
		//правый глаз
		context.beginPath();
		context.arc(116,90,8,0,Math.PI*2,true);
		context.closePath();
		context.stroke();
		context.fill();
		//рот
		context.beginPath();
		context.moveTo(70,115);
		context.quadraticCurveTo(100,130,130,115);
		context.quadraticCurveTo(100,150,70,115);
		context.closePath();
		context.stroke();
		context.fill();
}
}

else
if(a<5)
{
var drawingCanvas=document.getElementById('smile');
if (drawingCanvas && drawingCanvas.getContext)
{
	alert("Спасибо за ваше мнение!	");
var context=drawingCanvas.getContext('2d');

		//окружность
		context.strokeStyle="#000";
		context.fillStyle="#708090	";
		context.beginPath();
		context.arc(100,100,50,0,Math.PI*2,true);
		context.closePath();
		context.stroke();
		context.fill();
		//левый глаз
		context.fillStyle="#fff";
		context.beginPath();
		context.arc(84,90,8,0,Math.PI*2,true);
		context.closePath();
		context.stroke();
		context.fill();
		//правый глаз
		context.beginPath();
		context.arc(116,90,8,0,Math.PI*2,true);
		context.closePath();
		context.stroke();
		context.fill();
		//рот
		context.beginPath();
		context.moveTo(70,115);
		context.quadraticCurveTo(100,95,130,115);
		context.quadraticCurveTo(100,95,70,115);
		context.closePath();
		context.stroke();
		context.fill();
}
}
}


	

