<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Vinit Shahdeo">
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Online Debate System</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<style>
			  * {
			    font-family: 'Montserrat',Verdana, Arial, sans-serif;
			    box-sizing: border-box;
			    margin: 0;
			    padding: 0;
			  }
			  
			  a:link {
			    color:rgb(255,82,82);
			    text-decoration: none;
			  }
			  a:visited {
			    color:rgb(255,82,82);
			  }
			  a:hover {
			    color:rgb(255,82,82);
			  }
			  body{
				opacity: 1;
			    /*background: linear-gradient(to top,#5ee7df 0,#66a6ff 100%);*/
			    transition: opacity 300ms linear;
			    background-repeat: no-repeat;
			    min-height: 100vh;
			    background: linear-gradient(to bottom,#372865,#000);			    
			  }
			  .button {
			    background: -webkit-linear-gradient(top,#008dfd 0,#0370ea 100%);
			    border: 1px solid #076bd2;
			    border-radius: 3px;
			    color: #fff;
			    display: none;
			    font-size: 13px;
			    font-weight: bold;
			    line-height: 1.3;
			    padding: 8px 25px;
			    text-align: center;
			    text-shadow: 1px 1px 1px #076bd2;
			    letter-spacing: normal;
			  }
			  .center {
			    padding: 10px;
			    text-align: center;
			  }
			  .final {
			    color: black;
			    padding-right: 3px; 
			  }
			  .interim {
			    color: gray;
			  }
			  .info {
			    font-size: 14px;
			    text-align: center;
			    color: #777;
			    display: none;
			  }
			  .right {
			    float: right;
			  }
			  .sidebyside {
			    display: inline-block;
			    width: 45%;
			    min-height: 40px;
			    text-align: left;
			    vertical-align: top;
			  }
			  #headline {
			    font-size: 40px;
			    font-weight: 800;
			    color:rgb(255,82,82)
			  }
			  #info {
			    font-size: 20px;
			    text-align: center;
			    color: #777;
			    visibility: hidden;
			  }
			  #results {
			    font-size: 14px;
			    font-weight: bold;
			    border: 1px solid #bebcbc;
			    padding: 15px;
			    text-align: left;
			    min-height: 150px;
			  }
			  #start_button {
			    border: 0;
			    /*background-color:transparent;*/
			    padding: 0;
			    /*added by krishna*/
			    width: 100px;
			    height: 100px;
			    padding: 16px;
			    border-radius: 50%;
			    margin: 16px 0;
			  }
			  footer{
			    bottom: 0px;
			    text-align: center;
			    margin:auto;
			    padding: 20px;
			  }
			  footer p{
			    color:#777;

			  }
			  /*krishna*/
			  #aud-wave{
			  	background: url(img/color-wave.png);
			    position: absolute;
			    top: 50%;
			    transform: translate(0, -50%);
			    width: 100%;
			    height: 500px;
			    background-repeat: no-repeat;
			    background-size: cover;
			    z-index: -1;
			    opacity: 0.5;	  	
				}
				.aud-c-wrapper{
					background-color: white;
				    opacity: 0.75;
				    border-radius: 8px;
				    padding: 18px;
				    text-align: center;
				    display: flex;
				    justify-content: center;
				    align-items: center;
				    flex-direction: column;
				}
				.audio-mic-color{
					background-color: #f44336;
				}
				.audio-mic-transparent{
					background-color:transparent;
				}				
				.aud-results{
					width: 100%;
    				border-radius: 8px;
    				margin-top: 15px;
				}
				.aud-blue-wave{
					position: absolute;
				    top: -19%;
				    left: 50%;
				    transform: translate(-50%, 0);
				    z-index: -1;
				    width: 50%;
				    display: none;
				}
		</style>
		<script>
		    function copyButtons(){
		        //alert('hiii');
		        var s=document.getElementById('final_span').innerHTML;
		        window.location='./examples/demo1.php?lines='+s;
		    }
		    
		    function emailButtons(){
		        var msg=document.getElementById('final_span').innerHTML;
		        
		        
		        var email="vinitshahdeo@gmail.com";
		        var subject="Debate Results";
		        var url='mailto:'+email+'?subject='+subject+'&body='+msg+' thank you!';
		        document.getElementById('email').innerHTML='<a href="'+url+'" target="_blank">CLICK TO CONFIRM</a>';
		        console.log('Mail will be sent');
		    }
		</script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">		
	</head>
	<body>
		<h1 class="center" id="headline">
		   Online Debate System
		</h1>
		<div id="aud-wave"></div>
		<div class="container aud-capture-container">
			<div class="aud-c-wrapper">
				<div id="info">
					<p id="info_start">Click on the microphone icon and begin speaking.</p>
					<p id="info_speak_now">Speak now.</p>
					<p id="info_no_speech">No speech was detected. You may need to adjust your
					    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
					      microphone settings</a>.
					</p>
					<p id="info_no_microphone" style="display:none">
					    No microphone was found. Ensure that a microphone is installed and that
					    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
					    microphone settings</a> are configured correctly.
					</p>
					<p id="info_allow">Click the "Allow" button above to enable your microphone.</p>
					<p id="info_denied">Permission to use microphone was denied.</p>
					<p id="info_blocked">
						Permission to use microphone is blocked. To change,
					    go to chrome://settings/contentExceptions#media-stream</p>
					<p id="info_upgrade">Web Speech API is not supported by this browser.
					    Upgrade to <a href="//www.google.com/chrome">Chrome</a>
					    version 25 or later.
					</p>
				</div>
				<div style="position: relative;width: 100%;"> 
				  	<button id="start_button" class="audio-mic-color" onclick="startButton(event)">
				    	<img id="start_img" src="img/recording-microphone.png" alt="Start">
					</button>	
					<img src="img/source.gif" class="aud-blue-wave">
				</div>
				<div id="results" class="aud-results">
				  <span id="final_span" class="final"></span>
				  <span id="interim_span" class="interim"></span>
				    <p id="para"></p>
				</div>		
			</div>
		</div>   
		<!-- <div id="info">
		  <p id="info_start">Click on the microphone icon and begin speaking.</p>
		  <p id="info_speak_now">Speak now.</p>
		  <p id="info_no_speech">No speech was detected. You may need to adjust your
		    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
		      microphone settings</a>.</p>
		  <p id="info_no_microphone" style="display:none">
		    No microphone was found. Ensure that a microphone is installed and that
		    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
		    microphone settings</a> are configured correctly.</p>
		  <p id="info_allow">Click the "Allow" button above to enable your microphone.</p>
		  <p id="info_denied">Permission to use microphone was denied.</p>
		  <p id="info_blocked">Permission to use microphone is blocked. To change,
		    go to chrome://settings/contentExceptions#media-stream</p>
		  <p id="info_upgrade">Web Speech API is not supported by this browser.
		     Upgrade to <a href="//www.google.com/chrome">Chrome</a>
		     version 25 or later.</p>
		</div>
		<div class="right">
		  <button id="start_button" onclick="startButton(event)">
		    <img id="start_img" src="mic.gif" alt="Start"></button>
		</div>
		<div id="results">
		  <span id="final_span" class="final"></span>
		  <span id="interim_span" class="interim"></span>
		    <p id="para"></p>
		</div> -->
		<div class="center">
		  <div class="sidebyside" style="text-align:right">
		    <button id="copy_button" class="button" onclick="copyButtons()">
		      Calculate Score</button>
		    <div id="copy_info" class="info">
		      It will check whether user is talking "FOR THE MOTION" or "AGAINST THE MOTION". <br/>Also, it will display the score.
		    </div>
		  </div>

		  <div class="sidebyside">
		    <button id="email_button" class="button" onclick="emailButtons()">
		      Send Email</button>
		    <div id="email_info" class="info">
		     The paragraph recorded here can be mailed to the Judges too!
		    </div>
		  </div>
		    <br><br>
		    <div id="email"></div>
		    <p></p>
		  <div id="div_language" class="d-flex justify-content-center">
		    <select id="select_language" class="col-md-3 form-control" onchange="updateCountry()"></select>
		    &nbsp;&nbsp;
		    <select id="select_dialect" class="col-md-3 form-control"></select>
		  </div>
		  
		</div>
		<footer>
		  <p>Made with love by <a href="https://github.com/vinitshahdeo/" target="_blank">Vinit Shahdeo</a></p>
		<script>
		var langs =
		[['Afrikaans',       ['af-ZA']],
		 ['Bahasa Indonesia',['id-ID']],
		 ['Bahasa Melayu',   ['ms-MY']],
		 ['Català',          ['ca-ES']],
		 ['Čeština',         ['cs-CZ']],
		 ['Deutsch',         ['de-DE']],
		 ['English',         ['en-AU', 'Australia'],
		                     ['en-CA', 'Canada'],
		                     ['en-IN', 'India'],
		                     ['en-NZ', 'New Zealand'],
		                     ['en-ZA', 'South Africa'],
		                     ['en-GB', 'United Kingdom'],
		                     ['en-US', 'United States']],
		 ['Español',         ['es-AR', 'Argentina'],
		                     ['es-BO', 'Bolivia'],
		                     ['es-CL', 'Chile'],
		                     ['es-CO', 'Colombia'],
		                     ['es-CR', 'Costa Rica'],
		                     ['es-EC', 'Ecuador'],
		                     ['es-SV', 'El Salvador'],
		                     ['es-ES', 'España'],
		                     ['es-US', 'Estados Unidos'],
		                     ['es-GT', 'Guatemala'],
		                     ['es-HN', 'Honduras'],
		                     ['es-MX', 'México'],
		                     ['es-NI', 'Nicaragua'],
		                     ['es-PA', 'Panamá'],
		                     ['es-PY', 'Paraguay'],
		                     ['es-PE', 'Perú'],
		                     ['es-PR', 'Puerto Rico'],
		                     ['es-DO', 'República Dominicana'],
		                     ['es-UY', 'Uruguay'],
		                     ['es-VE', 'Venezuela']],
		 ['Euskara',         ['eu-ES']],
		 ['Français',        ['fr-FR']],
		 ['Galego',          ['gl-ES']],
		 ['Hrvatski',        ['hr_HR']],
		 ['IsiZulu',         ['zu-ZA']],
		 ['Íslenska',        ['is-IS']],
		 ['Italiano',        ['it-IT', 'Italia'],
		                     ['it-CH', 'Svizzera']],
		 ['Magyar',          ['hu-HU']],
		 ['Nederlands',      ['nl-NL']],
		 ['Norsk bokmål',    ['nb-NO']],
		 ['Polski',          ['pl-PL']],
		 ['Português',       ['pt-BR', 'Brasil'],
		                     ['pt-PT', 'Portugal']],
		 ['Română',          ['ro-RO']],
		 ['Slovenčina',      ['sk-SK']],
		 ['Suomi',           ['fi-FI']],
		 ['Svenska',         ['sv-SE']],
		 ['Türkçe',          ['tr-TR']],
		 ['български',       ['bg-BG']],
		 ['Pусский',         ['ru-RU']],
		 ['Српски',          ['sr-RS']],
		 ['한국어',            ['ko-KR']],
		 ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
		                     ['cmn-Hans-HK', '普通话 (香港)'],
		                     ['cmn-Hant-TW', '中文 (台灣)'],
		                     ['yue-Hant-HK', '粵語 (香港)']],
		 ['日本語',           ['ja-JP']],
		 ['Lingua latīna',   ['la']]];
		for (var i = 0; i < langs.length; i++) {
		  select_language.options[i] = new Option(langs[i][0], i);
		}
		select_language.selectedIndex = 6;
		updateCountry();
		select_dialect.selectedIndex = 6;
		showInfo('info_start');
		function updateCountry() {
		  for (var i = select_dialect.options.length - 1; i >= 0; i--) {
		    select_dialect.remove(i);
		  }
		  var list = langs[select_language.selectedIndex];
		  for (var i = 1; i < list.length; i++) {
		    select_dialect.options.add(new Option(list[i][1], list[i][0]));
		  }
		  select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
		}
		var create_email = false;
		var final_transcript = '';
		var recognizing = false;
		var ignore_onend;
		var start_timestamp;
		if (!('webkitSpeechRecognition' in window)) {
		  upgrade();
		} else {
		  start_button.style.display = 'inline-block';
		  var recognition = new webkitSpeechRecognition();
		  recognition.continuous = true;
		  recognition.interimResults = true;
		  recognition.onstart = function() {
		    recognizing = true;
		    showInfo('info_speak_now');
		    start_img.src = 'mic-animate.gif';
		  };
		  recognition.onerror = function(event) {
		    if (event.error == 'no-speech') {
		      start_img.src = 'img/recording-microphone.png';
		      showInfo('info_no_speech');
		      ignore_onend = true;
		    }
		    if (event.error == 'audio-capture') {
		      start_img.src = 'img/recording-microphone.png';
		      showInfo('info_no_microphone');
		      ignore_onend = true;
		    }
		    if (event.error == 'not-allowed') {
		      if (event.timeStamp - start_timestamp < 100) {
		        showInfo('info_blocked');
		      } else {
		        showInfo('info_denied');
		      }
		      ignore_onend = true;
		    }
		  };
		  recognition.onend = function() {
		    recognizing = false;
		    if (ignore_onend) {
		      return;
		    }
		    start_img.src = 'img/recording-microphone.png';
		    if (!final_transcript) {
		      showInfo('info_start');
		      return;
		    }
		    showInfo('');
		    if (window.getSelection) {
		      window.getSelection().removeAllRanges();
		      var range = document.createRange();
		      range.selectNode(document.getElementById('final_span'));
		      window.getSelection().addRange(range);
		    }
		    if (create_email) {
		      create_email = false;
		      createEmail();
		    }
		  };
		  recognition.onresult = function(event) {
		    var interim_transcript = '';
		    for (var i = event.resultIndex; i < event.results.length; ++i) {
		      if (event.results[i].isFinal) {
		        final_transcript += event.results[i][0].transcript;
		      } else {
		        interim_transcript += event.results[i][0].transcript;
		      }
		    }
		    final_transcript = capitalize(final_transcript);
		    final_span.innerHTML = linebreak(final_transcript);
		    interim_span.innerHTML = linebreak(interim_transcript);
		    if (final_transcript || interim_transcript) {
		      showButtons('inline-block');
		    }
		  };
		}
		function upgrade() {
		  start_button.style.visibility = 'hidden';
		  showInfo('info_upgrade');		  
		}
		var two_line = /\n\n/g;
		var one_line = /\n/g;
		function linebreak(s) {
		  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
		}
		var first_char = /\S/;
		function capitalize(s) {
		  return s.replace(first_char, function(m) { return m.toUpperCase(); });
		}
		function createEmail() {
		  var n = final_transcript.indexOf('\n');
		  if (n < 0 || n >= 80) {
		    n = 40 + final_transcript.substring(40).indexOf(' ');
		  }
		  var subject = encodeURI(final_transcript.substring(0, n));
		  var body = encodeURI(final_transcript.substring(n + 1));
		  window.location.href = 'mailto:?subject=' + subject + '&body=' + body;
		}
		function copyButton() {
		  if (recognizing) {
		    recognizing = false;
		    recognition.stop();
		  }
		  copy_button.style.display = 'none';
		  copy_info.style.display = 'inline-block';
		  showInfo('');
		}
		function emailButton() {
		  if (recognizing) {
		    create_email = true;
		    recognizing = false;
		    recognition.stop();
		  } else {
		    createEmail();
		  }
		  email_button.style.display = 'none';
		  email_info.style.display = 'inline-block';
		  showInfo('');
		}
		function startButton(event) {
		  if (recognizing) {
		    recognition.stop();
		    return;
		  }
		  final_transcript = '';
		  recognition.lang = select_dialect.value;
		  recognition.start();
		  ignore_onend = false;
		  final_span.innerHTML = '';
		  interim_span.innerHTML = '';
		  start_img.src = 'mic-slash.gif';
		  showInfo('info_allow');
		  showButtons('none');
		  start_timestamp = event.timeStamp;		  		  
		}
		function showInfo(s) {
		  if (s) {
		    for (var child = info.firstChild; child; child = child.nextSibling) {
		      if (child.style) {
		        child.style.display = child.id == s ? 'inline' : 'none';
		      }
		    }
		    info.style.visibility = 'visible';
		  } else {
		    info.style.visibility = 'hidden';
		  }
		}
		var current_style;
		function showButtons(style) {
		  if (style == current_style) {
		    return;
		  }
		  current_style = style;
		  copy_button.style.display = style;
		  email_button.style.display = style;
		  copy_info.style.display = 'none';
		  email_info.style.display = 'none';
		}
		</script>
	</body>
</html>
