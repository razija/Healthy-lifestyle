    function showImage(smSrc, lgSrc) {
        document.getElementById('largeImg').src = smSrc;
        showLargeImagePanel();
        unselectAll();
        setTimeout(function() {
            document.getElementById('test').style.display = "none";

            document.getElementById('largeImg').src = lgSrc;
        }, 1)
    }
    function showLargeImagePanel() {
        document.getElementById('largeImgPanel').style.display = 'block';
    }
    function unselectAll() {
        if(document.selection)
            document.selection.empty();
        if(window.getSelection)
            window.getSelection().removeAllRanges();
    }

    document.onkeydown = function(evt) {
        evt = evt || window.event;
        var isEscape = false;
        if ("key" in evt) {
            isEscape = (evt.key == "Escape" || evt.key == "Esc");
        } else {
            isEscape = (evt.keyCode == 27);
        }
        if (isEscape) 
        {
            window.location.reload(this);
        }
    }
	
function validateForm(test) {
			//var greska = document.getElementById('greska');
                //greska.innerHTML="";

	  		var forma=document.getElementById(test);

	  		var greska = forma.children[0];
	  		greska.innerHTML="";

	  		if(forma.ime !== undefined)
	  		{
	  			if (forma.ime.value.length > 10) 
	  			{
                	greska.innerHTML ="Predugo ime.<br>";
            		return false; 
      			}
      		}
      		if(forma.ime !== undefined)
	  		{
	      		if (forma.ime.value != "undefined" && forma.ime.value == "")
			  	{
			        greska.innerHTML = "Niste unijeli ime.<br>";
		            return false;
			    }
		  	}

		  	if(forma.ime !== undefined)
	  		{
			  	if (forma.ime.value != "undefined" && forma.ime.value.length < 3) 
		  		{
	                greska.innerHTML ="Prekratko ime.<br>";
	            	return false; 
		  		}
		  	}
		  	

	  		var emailrgx = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
		 	
		 	if(forma.email !== undefined)
		 	{
				if (forma.email.value != "undefined" && !emailrgx.test(forma.email.value)) 
				{
					greska.innerHTML="Email formata ime@niko.neznankovic";  
					return false;
				}
			 	if (forma.email.value != "undefined" && forma.email.value == "")
		  		{
		       		greska.innerHTML ="Niste unijeli email.<br>";
	           		return false;
		  		}
		  	}
		  	
		  	if(forma.komentar !== undefined)
		  	{
		  		if (forma.komentar.value != "undefined" && forma.komentar.value == "")
		  		{
		       		greska.innerHTML ="Niste unijeli komentar.<br>";
	            	return false;
		  		}
		  	}

	  	}
		
var timeout	= 500;
var closetimer	= 0;
var ddmenuitem	= 0;

function mopen(id)
{	
	
	mcancelclosetime();

	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}

function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}
document.onclick = mclose;

function ucitaj(url) {
   var ajax = new XMLHttpRequest();
   ajax.onreadystatechange = function () {
   if (ajax.readyState == 4 && ajax.status == 200)
      document.getElementById("stranica").innerHTML = ajax.responseText;
   if (ajax.readyState == 4 && ajax.status == 404)
      document.getElementById("stranica").innerHTML = naziv;
    }
   ajax.open("GET", url, true);
   ajax.send();
   
}