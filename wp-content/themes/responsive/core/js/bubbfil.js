jQuery(document).ready(function(){
	var date = new Date(); 
	date.setTime(date.getTime() + 2*3600*1000);
	document.cookie = "visited=true;expires=" + date.toGMTString(); 
});