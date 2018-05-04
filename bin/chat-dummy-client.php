<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    NUMBER_OF_SECONDS = 5
    setInterval(get_image_to_display, NUMBER_OF_SECONDS * 1000);
    function get_image_to_display(){
        $.ajax({
            url: "./get-image.php",
            type: 'GET',
            success: function(res) {
                console.log(res);
                var conn = new WebSocket('ws://162.241.216.173:9090/echo');
                conn.onopen = () => conn.send(res); 
                console.log('done');
            }
        });
    }
</script>