
function big(){
	setInterval(function (){
		//$("textarea").style.fontSize = "24pt";
		//var textarea = document.getElementById("textarea");
		//textarea.style.fontSize="24pt";
		var pt = "pt";
		var size = document.getElementById("textarea").style.fontSize;
		if(size == ""){
			document.getElementById("textarea").style.fontSize = "12pt";
		} else {
			size = parseInt(size);
			size = size + 2;
			size = String(size);
			pt = size.concat(pt);
			document.getElementById("textarea").style.fontSize = pt;
		}
	}, 500);
}


function color(){
	var checked = document.getElementById("checkbox").checked;
	
	if (checked == true)
	{
		$("textarea").style.color = "green";
		$("textarea").style.textDecoration = "underline";
		$("textarea").style.fontWeight = "bold";
	} else
	{
		$("textarea").style.color = "black";
		$("textarea").style.textDecoration = "none";
		$("textarea").style.fontWeight = "normal";
	}
}

function change(){
	var str = document.getElementById("textarea").value;
	var str2 = str.toUpperCase();
	str2 = str2.split(".").join("-izzle.");
	document.getElementById("textarea").value = str2;
	
}


