

/*
function activar() {

    animate(document.getElementById('bar1'), [150, 20, 75, 200]);
    animate(document.getElementById('bar2'), [50, 150, 100, 50]);
    animate(document.getElementById('bar3'), [200, 130, 20, 10]);
    animate(document.getElementById('bar4'), [120, 25, 100, 15]);
    animate(document.getElementById('bar5'), [200, 50, 10, 50]);
    animate(document.getElementById('bar6'), [20, 30, 30, 170]);
    animate(document.getElementById('bar7'), [30, 150, 125, 150]);
    animate(document.getElementById('bar7'), [30, 150, 125, 150]);

}


function parar() {

    parar_animate(document.getElementById('bar1'), [0, 0, 0, 0]);
    parar_animate(document.getElementById('bar1'), [0, 0, 0, 0]);
    parar_animate(document.getElementById('bar1'), [0, 0, 0, 0]);
}
function parar_animate(element, heights){
    let currentHeight = 0;
    let loop = 0;

    setInterval(function () {

        if (currentHeight === heights[loop]) {
            loop++;
            if (!heights[loop]) {
                loop = 0;
            }
        } else {
            if (currentHeight > heights[loop]) {
                currentHeight--;
            } else {
                currentHeight++;
            }
            element.style.height = currentHeight + 'px';


        }


    }, 5);
}


function animate(element, heights) {
    let currentHeight = 0;
    let loop = 0;

      setInterval(function () {

        if (currentHeight === heights[loop]) {
            loop++;
            if (!heights[loop]) {
                loop = 0;
            }
        } else {
            if (currentHeight > heights[loop]) {
                currentHeight--;
            } else {
                currentHeight++;
            }
            element.style.height = currentHeight + 'px';


        }


    }, 5);

}
*/

