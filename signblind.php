
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		var rec=window.SpeechRecogniton||window.webkitSpeechRecognition;
		var name=new rec();
		
		
		var arr=[];
		
		
		name.continuous=true;
		name.onstart=function()
		{
			document.write("Start\n")
			
		}
		window.onload=function(){
			name.start();
		}
		function name1()
		{
			
		}

		name.onspeechend=function()
		{
			document.write("t");
		}
		name.onresult=function(event)
		{
			var curr=event.resultIndex;
			t=event.results[curr][0].transcript;
			
			document.write(t);
			
		}
		/*
		function age1()
		{
			var msg=new SpeechSynthesisUtterance("tell me your age");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			age.start();
		}
		age.onstart=function()
		{
			setTimeout(age.stop(),3000);
		}
		age.onresult=function(event)
		{
			var curr=event.resultIndex;
			var t=event.results[curr][0].transcript;
			arr['age']=t;
			pwd1();
		}
		function pwd11()
		{
			var msg=new SpeechSynthesisUtterance("tell me your password");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			pwd.start();
		}
		pwd.onstart=function()
		{
			setTimeout(pwd.stop(),3000);
		}
		pwd.onresult=function(event)
		{
			var curr=event.resultIndex;
			var t=event.results[curr][0].transcript;
			arr['pwd']=t;
			cpwd1();
		}
		function cpwd1()
		{
			var msg=new SpeechSynthesisUtterance("tell me your password again");
			msg.lang="en-US";
			speechSynthesis.speak(msg);
			cpwd.start();
		}
		cpwd.onstart=function()
		{
			setTimeout(cpwd.stop(),3000);
		}
		cpwd.onresult=function(event)
		{
			var curr=event.resultIndex;
			var t=event.results[curr][0].transcript;
			arr['cpwd']=t;
			final1();
		}
		function final1()
		{
			var msg=new SpeechSynthesisUtterance();
			msg.text="please check your details.Your name is "+arr['name']+" your age is "+arr['age']+" your pwd is "+arr['pwd'];
		}
		*/
		
	</script>
</head>
<body>

</body>
</html>