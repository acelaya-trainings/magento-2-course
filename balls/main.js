
var config = {
        redBallsCount: 1,
        greenBallsCount: 5,
        blueBallsCount: 7
    },
    $currentDraggingElement,
    currentScore = 0;

window.onload = init;

function init () {
    initTimer();
    renderBalls();
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
        decrementScore();
        return;
    }

    $currentDraggingElement.remove();
    currentCounter = parseInt(document.getElementsByClassName('basket-count--' + basketClass)[0].innerHTML);
    document.getElementsByClassName('basket-count--' + basketClass)[0].innerHTML = ++currentCounter;
    incrementScore();
}

function incrementScore () {
    document.getElementById('score').innerHTML = ++currentScore;
}

function decrementScore () {
    document.getElementById('score').innerHTML = --currentScore;
}

function renderBalls () {
    var random,
        map = {
            0: 'red',
            1: 'green',
            2: 'blue'
        },
        color,
        total;

    do {
        random = Math.floor(Math.random() * 3);
        color = map[random];

        if (config[color + 'BallsCount'] > 0) {
            renderBall(color);
            config[color + 'BallsCount']--;
        }
        total = Object.values(config).reduce(function (a, b) {return a + b}, 0);
    } while (total > 0);
}

function renderBall (color) {
    var ballNode = document.createElement('div');
    ballNode.className = 'balls__ball ' + color;
    ballNode.draggable = true;
    ballNode.addEventListener('dragstart', dragBall);

    document.getElementsByClassName('balls')[0].appendChild(ballNode);
}
