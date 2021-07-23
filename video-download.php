
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		blob:https://app.liveplan.com/044aaf99-3029-4c16-a325-da4544a9b2aa

	/deliveries/a754208ddc81ef284af5b62eeae7a196c7bc59a1.m3u8
	<script>
		// let blob = await fetch("https://app.liveplan.com/044aaf99-3029-4c16-a325-da4544a9b2aa").then(r => r.blob());

		let file = await fetch("https://app.liveplan.com/044aaf99-3029-4c16-a325-da4544a9b2aa").then(r => r.blob()).then(blobFile => new File([blobFile], "fileNameGoesHere", { type: "image/png" })
		console.log(file)
	</script>
</body>
</html>