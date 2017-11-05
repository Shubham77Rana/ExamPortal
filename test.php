<?php
    session_start();
?>
<html>
    <head>
        <title>Timer</title>
<script type="text/javascript">
    
    var stop=setInterval(function()
    {
        var xhr=new XMLHttpRequest();
        xhr.open("GET","timer.php",false);
        xhr.send();
        var over=xhr.responseText;
        document.getElementById('time').textContent=over;
        
        if(over=="00:00:00")
        {
            clearInterval(stop);
            document.write("Test Over");
        }
      
    },1000);
    
</script>
    </head>
    <body>
        <div id="time"></div>
    </body>
</html>