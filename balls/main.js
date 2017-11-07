
var config = {
        redBallsCount: 2,
        greenBallsCount: 2,
        blueBallsCount: 2
    },
    $currentDraggingElement;

window.onload = init;

function init () {
    initTimer();
}

function initTimer () {
    var $element = document.getElementsByClassName('time-counter__value')[0],
        initialTime = new Date().getTime(),
        currentTime,
        time;

    setInterval(function () {
        currentTime = new Date().getTime();
        time = Math.floor((currentTime - initialTime) / 1000);
        $element.innerHTML = time;
    }, 250);
}

function dragBall (e) {
    $currentDraggingElement = e.target;
}

function dropBall (e) {
    var basket = e.target,
        basketClass = basket.className.split(' ').filter(function (element) {
            return element !== 'baskets__basket';
        })[0],
        ballClass = $currentDraggingElement.className.split(' ').filter(function (element) {
            return element !== 'balls__ball';
        })[0],
        currentCounter;

    if (basketClass !== ballClass) {
        alert('Mal!!');
        return;
    }

    $currentDraggingElement.remove();
    currentCounter = parseInt(document.getElementsByClassName('basket-count--' + basketClass)[0].innerHTML);
    document.getElementsByClassName('basket-count--' + basketClass)[0].innerHTML = ++currentCounter;
}

function renderBalls () {

}
