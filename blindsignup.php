<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		var t;
		window.onload=function(){
			var msg=new SpeechSynthesisUtterance("You have entered signup page. Please reply for the details asked through microphone. Lets start. Tell me your first name");
			msg.lang="en-US";
			speechSynthesis.speak(msg);

			
			var rec=window.SpeechRecogniton||window.webkitSpeechRecognition;
			var sp=new rec();
			
			sp.continuous=true;
			sp.start();
			sp.onresult=function(e){
				var curr=event.resultIndex;
				t=event.results[curr][0].transcript;

			}
			sp.stop();
			msg.text=t;
			speechSynthesis.speak(msg);

		}
	</script>
</head>
<body>

</body>
</html>