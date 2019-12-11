window.onload= function(){
	var button = $("button");
	button.onclick = okClick;
	var sbutton = $("sbutton");
	sbutton.onclick = snoopy;
	var check = $("checkbox");
	check.onchange = change;
	var bbutton = $("bbutton");
	bbutton.onclick = imageChange;
	var ibutton = $("ibutton");
	ibutton.onclick = pigLatin;
	var mbutton = $("mbutton");
	mbutton.onclick = malko;
}
	

function okClick(){
	setInterval(function(){
		var size = parseInt($("textarea").getStyle("font-size"));
		$("textarea").style.fontSize = (size + 2) + "pt";
		},500);
}

function change(){
	if($("checkbox").checked){
		$("textarea").style.fontWeight = "bold";
		$("textarea").style.color = "green";
		$("textarea").style.textDecoration = "underline";
	}
	else{
		$("textarea").style.fontWeight = "normal";
		$("textarea").style.color = "black";
		$("textarea").style.textDecoration = "none";
	}
}
function snoopy(){
	$("textarea").value = $("textarea").value.toUpperCase();
	$("textarea").value = $("textarea").value.split(".").join("-izzle.");
}

function imageChange(){
	document.body.style.backgroundImage = "url('https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg')";
}

function pigLatin(){
	var str = $("textarea").value;
	str = str.split("");

	for(var i = 0; i < str.length ; i++)
	{
		if(str[0] !== "a" && str[0] !== "e" && str[0] !== "i" && str[0] !== "o" && str[0] !== "u"){
			str.push(str[0]);
			str.shift();
			console.log(str);
		}
		else{
			str.push("ay");
			console.log(str);
			break;
		}
	}
	str = str.join("");
	$("textarea").value = str;
}

function malko(){
	var str = $("textarea").value;
	str = str.split(" ");
	console.log(str);
	for(var i = 0; i < str.length ; i++)
	{
		if(str[i].length >= 5)
		{
			str[i] = "Malkovich";
		}
	}
	str = str.join(" ");
	$("textarea").value = str;
}