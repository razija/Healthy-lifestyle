
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Galerija</title>
<link rel="stylesheet" href="pravi.css">
<script src="novi.js"></script>
</head>

<body>
<div class="test" id="test">
    <img src="slicice/image1.jpg" 
	width="300" height="200" style="cursor:pointer" 
	onclick="showImage(this.src, 'slicice/1velika.jpg');"/>
	
	<img src="slicice/trening.jpg"
	width="300" height="200" style="cursor:pointer"  
	onclick="showImage(this.src, 'slicice/trening.jpg');"/>
	
	<img src="slicice/brain.png"
	width="300" height="200" style="cursor:pointer" 
	onclick="showImage(this.src, 'slicice/brain.png');"/>
	</div>
	  <div id="largeImgPanel" onclick="this.style.display='none'">
            <img id="largeImg"
                 style="height:100%; margin:0; padding:0;" />
        </div>

</body>
</html>
