
$(document).ready(function () {
    // timer
    setInterval(myTimer, 1000);
    function myTimer() {
        var d = new Date();
        document.getElementById("demo").innerHTML = d.toLocaleTimeString();
    }

    // connect to server
    var conn = new WebSocket('ws://162.241.216.173:9090/echo');
    conn.onmessage = function (e) {
        document.getElementById('myImg').src = e.data;
    };

    // remove alerts after 5 seconds
    $('.alert').delay(5000).fadeOut(400);
});