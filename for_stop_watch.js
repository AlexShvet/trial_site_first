t_start = 0;
t_present = 0;
pause_check = 0;
minut = 0;
function timer() {
    t_present = new Date().getTime();
    if (t_start == 0) {
        t_start = new Date().getTime();
    }
    t_view = t_present - t_start;
    second = (t_view / 1000).toFixed(0);
    if (second == 60) {
        t_start = new Date().getTime();
        seconds.innerText = "0";
        minut = parseInt(minut) + 1;
    }
    if (second >= 10) {
        var null_sec = document.querySelector("#null_sec");
        null_sec.style.display = "none";
    }
    if (minut > 0 && second <= 9) {
        var null_sec = document.querySelector("#null_sec");
        null_sec.style.display = "inline-block";
    }
    if (minut >= 10) {
        var null_min = document.querySelector("#null_min");
        null_min.style.display = "none";
    }
    minutes.innerText = minut;
    seconds.innerText = second;
    paus = requestAnimationFrame(timer);
    
}

function start() {
    seconds = document.querySelector("#seconds");
    minutes = document.querySelector("#minutes");
    var zero = document.querySelector("#zero");
    zero.style.display = "inline-block";
    var notice = document.querySelector("#notice");
    notice.style.display = "none";
    var sta = document.querySelector("#sta");
    sta.style.display = "none";
    var two = document.querySelector("#two");
    two.style.display = "inline-block";
    if (pause_check == 0) {
        t_start = new Date().getTime();
        timer();
    }
    if (pause_check == 1) {
        var x = new Date().getTime();
        t_start = x - t_view;
        timer();
        pause_check = 0;
    }
}

function pause() {
    if (pause_check == 0) {
        cancelAnimationFrame(paus);
    }
    pause_check = 1;
    var zero = document.querySelector("#zero");
    zero.style.display = "none";
    var notice = document.querySelector("#notice");
    notice.style.display = "inline-block";
    sta.style.display = "inline-block";
    var two = document.querySelector("#two");
    two.style.display = "none";
}

function zero() {
    t_start = 0;
    t_present = 0;
    minut = 0;
    pause_check == 0;
    seconds.innerText = "0";
    minutes.innerText = "0";
    cancelAnimationFrame(paus);
    sta.style.display = "inline-block";
    var two = document.querySelector("#two");
    two.style.display = "none";
    if (second >= 10) {
        var null_sec = document.querySelector("#null_sec");
        null_sec.style.display = "none";
    } else null_sec.innerText = "0";
    
}