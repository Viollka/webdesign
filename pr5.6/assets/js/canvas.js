function canvas(selector, options){
   const canvas = document.querySelector(selector);
   canvas.classList.add('canvas')
   canvas.setAttribute('width', `${options.width || 400}px`)
   canvas.setAttribute('height', `${options.height || 300}px`)


   // отримання контексту для малювання
   const context = canvas.getContext('2d')
  // отримуємо координати canvas відносно viewport
   const rect = canvas.getBoundingClientRect();

   let mycolor = context.strokeColor;
   let mywidth = 5;

  // ...
  let isPaint = false // чи активно малювання
  let points = [] //масив з точками

	// об’являємо функцію додавання точок в масив
   const addPoint = (x, y, dragging) => {
      // преобразуємо координати події кліка миші відносно canvas
      console.log(mycolor)
      points.push({
          x: (x - rect.left),
          y: (y - rect.top),
          dragging: dragging,
        color: mycolor,
        width: mywidth,
      })
}

	 // головна функція для малювання
   const redraw = () => {
   //очищуємо  canvas
   context.clearRect(0, 0, context.canvas.width, context.canvas.height);

   context.strokeStyle = options.strokeColor;
   context.lineJoin = "round";
   context.lineWidth = options.strokeWidth;
   let prevPoint = null;
   for (let point of points){
       context.beginPath();
       context.strokeStyle = point.color;
       context.lineWidth = point.width;
       if (point.dragging && prevPoint){
           context.moveTo(prevPoint.x, prevPoint.y)
       } else {
           context.moveTo(point.x - 1, point.y);
       }
       context.lineTo(point.x, point.y)
       context.closePath()
       context.stroke();
       prevPoint = point;
   }
}

	 // функції обробники подій миші
const mouseDown = event => {
   isPaint = true
   addPoint(event.pageX, event.pageY);
   redraw();
}

const mouseMove = event => {
   if(isPaint){
       addPoint(event.pageX, event.pageY, true);
       redraw();
   }
}

// додаємо обробку подій
canvas.addEventListener('mousemove', mouseMove)
canvas.addEventListener('mousedown', mouseDown)
canvas.addEventListener('mouseup',() => {
   isPaint = false;
});
canvas.addEventListener('mouseleave',() => {
   isPaint = false;
});


// TOOLBAR
const toolBar = document.getElementById('toolbar')
// clear button
const clearBtn = document.createElement('img')
clearBtn.classList.add('btn')
clearBtn.src = "public/image/clear.png";
clearBtn.width = "50";
clearBtn.height = "50";

const downloadBtn = document.createElement('img')
downloadBtn.classList.add('btn')
downloadBtn.src = "public/image/download.png";
downloadBtn.width = "50";
downloadBtn.height = "50";

const saveBtn = document.createElement('img')
saveBtn.classList.add('btn')
saveBtn.src = "public/image/save.png";
saveBtn.width = "50";
saveBtn.height = "50";

const restoreBtn = document.createElement('img')
restoreBtn.classList.add('btn')
restoreBtn.src = "public/image/restore.png";
restoreBtn.width = "50";
restoreBtn.height = "50";





const tsBtn = document.createElement('img')
tsBtn.classList.add('btn')
tsBtn.src = "public/image/time.png";
tsBtn.width = "50";
tsBtn.height = "50";


const bgBtn = document.createElement('img')
bgBtn.classList.add('btn')
bgBtn.src = "public/image/im.png";
bgBtn.width = "50";
bgBtn.height = "50";


  tsBtn.addEventListener('click', () => {
	var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
	var today  = new Date();

	context.fillText(today.toLocaleDateString("en-US", options),20, 20); // Saturday, September 17, 2016
  

});

  restoreBtn.addEventListener('click', () => {
    let stringified_points = localStorage.getItem('points');
    points = JSON.parse(stringified_points);
    isPaint= true;
    redraw();
    isPaint = false;
  

});

clearBtn.addEventListener('click', () => {
// тут необхідно додати код очистки canvas та масиву точок (clearRect)
	context.clearRect(0, 0, context.canvas.width, context.canvas.height);
	 points = [];
});

bgBtn.addEventListener('click', () => {
const img = new Image;
img.src =`https://www.fillmurray.com/200/300)`;
img.onload = () => {
   context.drawImage(img, 0, 0);
}

});

downloadBtn.addEventListener('click', () => {
	// тут необхідно додати код очистки canvas та масиву точок (clearRect)
	const dataUrl = canvas.toDataURL("image/png").replace(/^data:image\/[^;]/, 'data:application/octet-stream');
	const newTab = window.open('about:blank','image from canvas');
	newTab.document.write("<img src='" + dataUrl + "' alt='from canvas'/>");

});

saveBtn.addEventListener('click', () => {
	
	localStorage.setItem('points', JSON.stringify(points));

});




toolBar.insertAdjacentElement('afterbegin', tsBtn);
  toolBar.insertAdjacentElement('afterbegin', clearBtn);
   toolBar.insertAdjacentElement('afterbegin', saveBtn);
  toolBar.insertAdjacentElement('afterbegin', downloadBtn);
	 toolBar.insertAdjacentElement('afterbegin', restoreBtn);
	  toolBar.insertAdjacentElement('afterbegin', bgBtn);
   


	 
	 
	
     document.getElementById('myColor').oninput = function(){
      options.strokeColor = this.value;
       mycolor = this.value;
    }
    
    document.getElementById('brushSize').oninput = function(){
      options.strokeWidth = this.value;
       mywidth = this.value;
    }
}

window.onload = function(){
canvas('#draw', {
   width: 500,
   height: 300,
   strokeWidth: 5,
   strokeColor: "#df4b26"
});

}