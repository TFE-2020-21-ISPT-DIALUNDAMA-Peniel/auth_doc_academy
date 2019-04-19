<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
<input type="file" name="" accept="image/*;capture=camera">
<br>
<video autoplay></video>
<script type="text/javascript">
	const constraints = {
		video : true
	};
	const video = document.querySelector('video');
	navigator.mediaDevices.getUserMedia(constraints).then((stream)=>video.scrObject = stream);
</script>
</body>
</html>