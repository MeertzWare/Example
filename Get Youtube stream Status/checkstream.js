$(document).ready(function() {
$.getJSON('https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=[CHANNEL ID]&type=video&eventType=live&key=[YOUR API-KEY]',function(data){

 if (typeof(data.items[0]) != "undefined") {
     console.log('stream is online ');
	 document.getElementById("ytls").innerHTML = '<iframe src="https://www.youtube.com/embed/live_stream?channel=[CHANNEL ID]&autoplay=1" width="920" height="630"></iframe>';
   } else {
     console.log('stream is offline');
 }   
});
});