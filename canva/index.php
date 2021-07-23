<!DOCTYPE html>
<html>
<head>
	<title>Canva</title>
	<style>
		.controls {
			display: inline-block;
		}

	</style>
</head>
<body>
	<div class="controls">
	  <p>
	    <button id="edit" onclick="Edit()">Toggle editing polygon</button>
	  </p>
	</div>
	<canvas id="c" width="500" height="400" style="border:1px solid #ccc"></canvas>


<footer>
    <script src="https://unpkg.com/fabric@4.0.0-beta.12/dist/fabric.js" ></script>

    <script>
    		var canvas = new fabric.Canvas('c');
    		// Define an array with all fonts
    		var fonts = ["Pacifico", "VT323", "Quicksand", "Inconsolata"];

    		var textbox = new fabric.Textbox('Lorum ipsum dolor sit amet dsfds', {
    		  left: 50,
    		  top: 50,
    		  width: 180,
    		  fontSize: 30
    		});
            var textbox1 = new fabric.Textbox('shubham', {
              // textAlign: "center",
              originX: 'right',
              fontSize: 45,
              fontWeight: 600
            });
    		canvas.add(textbox);
            canvas.add(textbox1).setActiveObject(textbox1);

    		fonts.unshift('Times New Roman');
    		// Populate the fontFamily select

    		var select = document.getElementById("font-family");
    		fonts.forEach(function(font) {
    		  var option = document.createElement('option');
    		  option.innerHTML = font;
    		  option.value = font;
    		  select.appendChild(option);
    		});

    		// Apply selected font on change
    		document.getElementById('font-family').onchange = function() {
    		  if (this.value !== 'Times New Roman') {
    		    loadAndUse(this.value);
    		  } else {
    		    canvas.getActiveObject().set("fontFamily", this.value);
    		    canvas.requestRenderAll();
    		  }
    		};

    		function loadAndUse(font) {
    		  var myfont = new FontFaceObserver(font)
    		  myfont.load()
    		    .then(function() {
    		      // when font is loaded, use it.
    		      canvas.getActiveObject().set("fontFamily", font);
    		      canvas.requestRenderAll();
    		    }).catch(function(e) {
    		      console.log(e)
    		      alert('font loading failed ' + font);
    		    });
    		}
    </script>
</footer>
</body>
</html>