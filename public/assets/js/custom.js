function goFullScreen(){

    var elem = document.getElementById('full');

    if(elem.requestFullscreen){
        elem.requestFullscreen();
    }
    else if(elem.mozRequestFullScreen){
        elem.mozRequestFullScreen();
    }
    else if(elem.webkitRequestFullscreen){
        elem.webkitRequestFullscreen();
    }
    else if(elem.msRequestFullscreen){
        elem.msRequestFullscreen();
    }
}

function exitFullScreen(){

    if(document.exitFullscreen){
        document.exitFullscreen();
    }
    else if(document.mozCancelFullScreen){
        document.mozCancelFullScreen();
    }
    else if(document.webkitExitFullscreen){
        document.webkitExitFullscreen();
    }
    else if(document.msExitFullscreen){
        document.msExitFullscreen();
    }

}

