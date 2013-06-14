<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="utf-8" />
	<title>Gambini</title>
<style type="text/css">
<!--
/*
YUI 3.4.1 (build 4118)
Copyright 2011 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/
html{color:#000;background:#000}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td{margin:0;padding:0}table{border-collapse:collapse;border-spacing:0}fieldset,img{border:0}address,caption,cite,code,dfn,em,strong,th,var{font-style:normal;font-weight:normal}ol,ul{list-style:none}caption,th{text-align:left}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:normal}q:before,q:after{content:''}abbr,acronym{border:0;font-variant:normal}sup{vertical-align:text-top}sub{vertical-align:text-bottom}input,textarea,select{font-family:inherit;font-size:inherit;font-weight:inherit}input,textarea,select{*font-size:100%}legend{color:#000}

#menu {
	background:#000;
	border-bottom:2px solid #888;

}
#logo, #menu {
	margin:12px auto;
}
#menu {
	width:400px;
	padding:0 20px;
}
body {
	font-family:arial;
	color:#fff;
	text-align:center;
}
a {
	color:#c00;
	font-weight:bold;
}

label {
	float:left;
}
p {
	clear:both;
	padding:10px 0;
}
-->
</style>
</head>
<body>
	<div id="menu">
<p>
	<label for="size">Velikost: <input type="range" min="1" max="10" step="1" value="2" id="size" onchange="reset();return true;" />
	<span id="size-value"></span>
	</label>
</p>

<p>
	<label for="speed">Rychlost: <input type="range" min="100" max="2500" step="100" value="2400" id="speed" onchange="reset();return true;" />
	<span id="speed-value"></span>
	</label>
</p>

<p>
	<label for="barva">Barva: 
		<select id="barva">
			<option value="0">Disko</option>
			<option value="1">Vlastní</option>
		</select>

	</label>
	<span id="barva_html">
		#<input type="text" id="barva_html_kod" value="ffffff" size="6" />
	</span>	

</p>

<p>
	<label for="barva_pozadi">Barva pozadi: 
		#<input type="text" id="barva_pozadi" value="000000" size="6" />
	</label>

</p>

<p id="save_image">
	
</p>
<p>
	<button id="stop" onclick="stop();">Stop</button>
	<button id="stop" onclick="reset();">Play</button>
</p>
</div>

<canvas id="logo">
  Váš prohlížeč nepodporuje HTML5
</canvas> 

<script type="text/javascript">
<!--
/**
 * Gambini Logo
 */
// PHP in_array
function in_array(needle,haystack) {
	var control = false;
	for(var i=0;i<haystack.length;i++) {
		if(haystack[i]==needle) control = true;
	}
	
	return control;
}
// generování barvy
function random_color() {
	var barva_vyber = document.getElementById('barva').value*1;

	if(barva_vyber==1) {
		document.getElementById('barva_html').style.display = 'block';
		var red = 'ff';
		var green = 'ff';
		var blue = 'ff';

		return '#'+document.getElementById('barva_html_kod').value;

	} else {

		document.getElementById('barva_html').style.display = 'none';

	    var red = Math.round(25+Math.random()*230).toString(16);
	    	if(red.length==1) red = red+"0";
	    	
	    var green = Math.round(25+Math.random()*230).toString(16);
	    	if(green.length==1) green = green+"0";
	    	
	    	
	    var blue = Math.round(25+Math.random()*230).toString(16);
	    	if(blue.length==1) blue = blue+"0";

	    return '#'+red+''+green+''+blue;
   	}
    
    
}

function gambini_logo() {
	
	document.body.style.background = "#"+document.getElementById('barva_pozadi').value;

	var index = document.getElementById('size').value*1; // hlavní jednotka
		document.getElementById('size-value').innerHTML = index;
	var rect  = 4*index;// šířka a výška loga = (rect*33)+index
	var dimension = 31*(rect+index)+index;
	

var elem = document.getElementById('logo');

elem.setAttribute('width', dimension);
elem.setAttribute('height', dimension);

if (elem && elem.getContext) {

  var context = elem.getContext('2d');
  if (context) {


	// pole písmen letter[X] = Y;
	var letter = new Array();
		//G
		letter.push("3-14");
		letter.push("4-14");
		letter.push("5-14");
		letter.push("2-15");
		letter.push("5-15");
		letter.push("2-16");
		letter.push("5-16");
		letter.push("2-17");
		letter.push("5-17");
		letter.push("3-18");
		letter.push("4-18");
		letter.push("5-18");
		letter.push("5-19");
		letter.push("3-20");
		letter.push("4-20");
		
		//A
		letter.push("8-14");
		letter.push("9-14");
		letter.push("10-15");
		letter.push("8-16");
		letter.push("9-16");
		letter.push("10-16");
		letter.push("7-17");
		letter.push("10-17");
		letter.push("8-18");
		letter.push("9-18");
		letter.push("10-18");
		
		//M
		letter.push("12-14");
		letter.push("13-14");
		letter.push("15-14");
		letter.push("12-15");
		letter.push("14-15");
		letter.push("16-15");
		letter.push("12-16");
		letter.push("14-16");
		letter.push("16-16");
		letter.push("12-17");
		letter.push("14-17");
		letter.push("16-17");
		letter.push("12-18");
		letter.push("14-18");
		letter.push("16-18");
		
		//B
		letter.push("18-12");
		letter.push("18-13");
		letter.push("18-14");
		letter.push("19-14");
		letter.push("20-14");
		letter.push("18-15");
		letter.push("21-15");
		letter.push("18-16");
		letter.push("21-16");
		letter.push("18-17");
		letter.push("21-17");
		letter.push("18-18");
		letter.push("19-18");
		letter.push("20-18");
		
		//I1
		letter.push("23-12");
		letter.push("23-14");
		letter.push("23-15");
		letter.push("23-16");
		letter.push("23-17");
		letter.push("23-18");
		
		//N
		letter.push("25-14");
		letter.push("26-14");
		letter.push("27-14");
		letter.push("25-15");
		letter.push("28-15");
		letter.push("25-16");
		letter.push("28-16");
		letter.push("25-17");
		letter.push("28-17");
		letter.push("25-18");
		letter.push("28-18");

		//I2
		letter.push("30-12");
		letter.push("30-14");
		letter.push("30-15");
		letter.push("30-16");
		letter.push("30-17");
		letter.push("30-18");
	// vykreslí 33*33 pole
	for(posY=0;posY<31;posY++) {
		for(posX=0;posX<31;posX++) {
		if(!in_array((posX+1)+"-"+(posY+1),letter)) {
	    	context.fillStyle   = random_color();
	    	context.fillRect(index+posX*(index+rect), index+posY*(index+rect), rect, rect);
	    }
		}
	}

    
  }
  
  
  var img  = elem.toDataURL("image/png");
  document.getElementById('save_image').innerHTML = '<a href="'+img+'">Save As Image</a>';
 
 var speed = (document.getElementById('speed').value*1);
 timer=setTimeout("gambini_logo()",2600-speed);

 document.getElementById('speed-value').innerHTML = speed;
}

 
}

function reset() {
	clearTimeout(timer);
	gambini_logo();	
}

function stop() {
	clearTimeout(timer);	
}

gambini_logo();
-->
</script>
</body>
</html>
