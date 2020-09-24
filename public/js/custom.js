
$(document).ready(function() {
    var i = 0;
    $('#play').click(function() {
        
        var audio = document.getElementById("audio");
        audio.play();
    });
    $('#pause').click(function() {
        var audio = document.getElementById("audio");
        audio.pause();
    });
    $('#next').click(function() {
        
        var songtable = document.getElementById("songbody").querySelectorAll("#audio"); 
        var songlength = songtable - 1;
        if(songlength <= i) {

        } else {
            i++;
        }
        songtable[i-1].pause();
        songtable[i-1].currentTime = 0;
        console.log(songtable.length);
        songtable[i].play();
        console.log(songtable);
    });
    $('#prev').click(function() {
        i--;
        if(i < 0 ) {
            i = 0;
        }
        var songtable = document.getElementById("songbody").querySelectorAll("#audio");
        songtable[i+1].pause();
        songtable[i+1].currentTime = 0;
        
        songtable[i].play();
        console.log(songtable);
	});
});