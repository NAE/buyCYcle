<html>

<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">


function doStuff(){
	//do your post request and stuff here
}

function callLoop(){
	doStuff();
	setTimeout("callLoop();", 1000);
}

window.onload = callLoop;
</script>

</head>




</html>
