function RunnerMain()
{
    var vendors = ['webkit', 'moz'];
    for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] || window[vendors[x] + 'CancelRequestAnimationFrame'];
    }

    var cw = canvas.width,
    ch = canvas.height,
    bX = 30,
    bY = 30,
    mY = 50,
    lastTime = (new Date()).getTime(),
    currentTime = 0,
    delta = 0,
    score = 100;

    var started = false;
    var dead = false;
    function die() {
        if (dead)
        return;
        dead = true;
        document.location.href = "http://portal.kouosl/platformer/game?id="+game_id+"&setscore="+Math.round(score);
    }

    canvas.addEventListener('keypress', handleKeyPress);
    function handleKeyPress(e) {
        if (e.keyCode == 32) {
            bY-=30;
            started = true;
        }
    }

    function gameLoop() {
        window.requestAnimationFrame(gameLoop);
    
        currentTime = (new Date()).getTime();
        delta = (currentTime - lastTime) / 1000;
        ctx.clearRect(0, 0, cw, cw);

        ctx.font = "24px Arial";
        ctx.fillStyle = 'green';
        ctx.fillText("score: " + Math.round(score) ,500,20)
    
        ctx.beginPath();
        ctx.fillStyle = 'red';
        ctx.arc(bX, bY, 20, 0, Math.PI * 360);
        ctx.fill();

        if (bY >= ch)
        {
            //dead
            die();
        }
        if (bY <= 0) 
        {
            bY=0;
        }
        
        if (started && !dead) {
            score += delta*60;
            bY += (mY * delta);
        }

        lastTime = currentTime;
    }

    gameLoop();
}

if (game == 'oyunlar/runner.js')
    document.addEventListener('DOMContentLoaded', RunnerMain, false);