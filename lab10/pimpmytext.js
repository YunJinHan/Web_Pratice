
var timer;

window.onload = function() {
	document.getElementById("Pimpin").onclick = PimpinFunction;
	document.getElementById("Bling").onchange = BlingFunction;
    document.getElementById("Snoopify").onclick = SnoopifyFunction;
};

function PimpinFunction() {
    //$("text").style.fontSize = "24pt";
    timer = setInterval(increaseFontSize, 500);
}
function BlingFunction() {
    if (document.getElementById("Bling").checked) {
    $("text").style.fontWeight = "bold";
    $("text").style.color = "green";
    $("text").style.textDecoration = "underline";
    } else {
        $("text").style.fontWeight = "normal";
        $("text").style.color = "black";
        $("text").style.textDecoration = "none";
    }
}
function SnoopifyFunction() {
    var string = document.getElementById("text");
    document.getElementById("text").value = string.value.toUpperCase();
	var array = string.value.split(".");
	string.value = array.join("-izzle.");
}
function increaseFontSize() {
	var text = document.getElementById("text");
	if (text.style.fontSize) {
        text.style.fontSize = parseInt(text.style.fontSize) + 2 + "pt";
	} else {
		text.style.fontSize = "12pt";
	}
}
