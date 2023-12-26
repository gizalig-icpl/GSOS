<?php
require_once("include/header.php");
include_once('./include/session.php');

// Fetch flashcard data from the database
$category_id = $_GET['id'];
// $sql = "SELECT * FROM question_master where category_id=:category_id";
// $stmt = $dbh->prepare($sql);
// $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
// $stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// if (count($result) > 0) {
//     $flashcards =$result;
// } else {
//     $flashcards = [];
// }
$question_time=config("flashcard","question_time");
$answer_time=config("flashcard","answer_time");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flashcards</title>
    <style>
        /* body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        } */
        
        .flashcard-container { 
            font-weight: bold;
            width: 100%;
            height: 200px;
            perspective: 800px;
            position: relative;
        }

        .flashcard {
            width: 100%;
            height: 100%;
            position: absolute;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        .front, .back {
            width: 100%;
            height: 100%;
            position: absolute;
            backface-visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
        }

        .front {
            /* background-color: lightskyblue; */
            background-color: white;
            transform: rotateY(0);
        }

        .back {
            background-color: lightgrey;
            background-color: white;
            transform: rotateY(180deg);
        }

        .flashcard-container.flipped .flashcard {
            transform: rotateY(180deg);
        }

        .flashcard:hover {
            cursor: pointer;
        }
        .tool{
            background-color: #F6F7FB;
            z-index: 1;
            height: auto;
            width: 100%;
        }

    </style>
    <script>
        var question_time=<?php echo $question_time; ?>;
        var answer_time=<?php echo $answer_time; ?>;
        var frontspeak=false;
        var backspeak=false;
        var currentPosition = <?php echo isset($_SESSION['position']) ? $_SESSION['position'] : 0; ?>;
        function Data(action,id)
        {
            $.ajax({
                method: 'POST',
                url: './domain/index.php?page=fetch-flashcard',
                data: { action: action,id:id },
                success: function (res) {
                    flashcards = JSON.parse(res);
                    loadFlashcard(currentPosition);
                },
                error: function (res) {
                    console.log(res1);
                },
            });
        }
        
        function loadFlashcard(position) {
            var flashcard = flashcards[position];
            var question = flashcard.question;
            var answer = flashcard.answer;
            
            $("#current").text(currentPosition+1+" / "+flashcards.length);
            $("#flashcard-container .front .frontText").text("Q. "+question);
            $("#flashcard-container .back .backText").text("Ans. "+answer);
            
            $("#flashcard-container").removeClass("flipped");
        }
        
        function flipCard() {
            if(frontspeak == false && backspeak == false)
            {
                $("#flashcard-container").toggleClass("flipped");
            }
            frontspeak=false;
            backspeak=false;
        }

        function play(){
            currentPosition++;
                
            if (currentPosition >= flashcards.length) {
                currentPosition = 0;
            }
            
            loadFlashcard(currentPosition);
            setTimeout(function(){$("#flashcard-container").toggleClass("flipped");},question_time*1000);
        }

        function tool(text){
            $(".tool").text(text);
            document.getElementById('fronttool').classList.remove("d-none");
            document.getElementById('backtool').classList.remove("d-none");
            setTimeout(function() { 
                document.getElementById('fronttool').classList.add("d-none");
                document.getElementById('backtool').classList.add("d-none");
            }, 1000);
        }

        const synth = window.speechSynthesis;
        synth.cancel();
        function speaks(position){
            let x = event.target;
            let pr = x.parentElement.parentElement;
            let ch = pr.children[position].innerText;
            // console.log(pr);
            // console.log(pr,ch);
            var message = ch; // To get message from textarea
            const messageParts = message.split(/<break[=0-9]*>/g);  //Regex to split the entered using <break>
            
            var timeDelay = "";
            if(messageParts.length>1)  // to check delay is added or not
            {
                timeDelay = message.match(/break[=0-9]*/g).toString().replace(/break=/g, "").split(",");  // To get time delay added in break
            }
            let currentIndex = 0;
            
            // TTS function which is called for each part of text
            const speak = (textToSpeak, timeToDelay) => {
                var msg = new SpeechSynthesisUtterance();
                synth.cancel();
                const voices = synth.getVoices();
                msg.voice = voices[10];
                msg.rate = 1;
                msg.pitch = 1;
                msg.volume = 1;
                msg.text= textToSpeak;
                synth.speak(msg);
                // const msg = new SpeechSynthesisUtterance();
                // const voices = window.speechSynthesis.getVoices();
                // msg.voice = voices[10];
                // msg.rate = 1;
                // msg.pitch = 1;
                // msg.volume = 1; // 0 to 1
                // msg.text = textToSpeak;
                // msg.onend = function() {
                // currentIndex++;
                // if (currentIndex < messageParts.length) {
                //     setTimeout(() => {
                //     speak(messageParts[currentIndex],timeDelay[currentIndex])
                //     }, timeToDelay)
                // }
                // };
                // speechSynthesis.speak(msg);
            }
            
            speak(messageParts[0], timeDelay[0]);  // calling speak function
        }
        $(document).ready(() =>{
            Data("fetch",<?php echo $category_id; ?>);
            var myInterval;
            
            $("#next-btn").click(function() {
                currentPosition++;
                
                if (currentPosition >= flashcards.length) {
                    currentPosition = 0;
                }
                
                loadFlashcard(currentPosition);
            });
            $("#back-btn").click(function() {
                currentPosition--;
                
                if (currentPosition == -1) {
                    currentPosition = flashcards.length;
                }
                
                loadFlashcard(currentPosition);
            });

            $("#play").click(function(){
                document.getElementById("play").classList.add("d-none");
                document.getElementById("pause").classList.remove("d-none");
                setTimeout(function(){$("#flashcard-container").toggleClass("flipped");},question_time*1000);
                tool("Auto-play cards is on");
                myInterval=setInterval(function(){play()},(question_time+answer_time)*1000);
            });
            $("#pause").click(function(){
                document.getElementById("play").classList.remove("d-none");
                document.getElementById("pause").classList.add("d-none");
                tool("Auto-play cards is off");
                clearInterval(myInterval); 
            });
            $("#random").click(function(){
                document.getElementById("random").classList.add("d-none");
                document.getElementById("fetch").classList.remove("d-none");
                tool("Card shuffle is on");
            });
            $("#fetch").click(function(){
                document.getElementById("random").classList.remove("d-none");
                document.getElementById("fetch").classList.add("d-none");
                tool("Card shuffle is off");
                clearInterval(myInterval); 
            });
            
            $("#flashcard-container").click(function() {
                flipCard();
            });
            $(function(){
                if ('speechSynthesis' in window)  // To check speech sysntesis is supported in browser or not
                {
                    
                    // To get supported voice list in browser & append to select list
                    speechSynthesis.onvoiceschanged = function() {
                    var $voicelist = $('#voices');

                    if($voicelist.find('option').length == 0) {
                        speechSynthesis.getVoices().forEach(function(voice, index) {
                        var $option = $('<option>')
                        .val(index)
                        .html(voice.name + (voice.default ? ' (default)' :''));

                        $voicelist.append($option);
                        });
                    }
                    }

                    // On speak button click below function is calling
                    $('#frontspeak').click(function(event){
                        frontspeak=true;
                        speaks(0);
                    });
                    $('#backspeak').click(function(event){
                        backspeak=true;
                        speaks(1);
                    });
                    
                } else {
                    alert("Your Browser does not support speech synthesis");
                }
                });
        });
        
    </script>
</head>
<body>
<div class="wrapper">
        <div class="page-content">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div id="flashcard-container" class="flashcard-container">
                        <div class="flashcard">
                            <div class="front card card-body">
                                <!-- <i class="bi bi-volume-up position-absolute top-0 end-0 p-4" id="frontspeak"></i> -->
                                <h3 class="frontText"></h3>
                                <div class="tool position-absolute bottom-0 text-center d-none" id="fronttool"></div>
                            </div>
                            <div class="back card card-body">
                                <!-- <i class="bi bi-volume-up position-absolute top-0 end-0 p-4" id="backspeak"></i> -->
                                <div class="backText"></div>
                                <div class="tool position-absolute bottom-0 text-center d-none" id="backtool"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center justify-content-center d-flex justify-content-evenly p-3">
                        <div id="autoplay" class="col">
                            <i class="bi bi-play-fill" id="play"></i>
                            <i class='bi bi-pause-fill d-none' id='pause'></i>
                        </div>
                        <div id="autoplay" class="col">
                            <i class="bi bi-shuffle" onclick="Data('random',<?php echo $category_id; ?>);" id="random"></i>
                            <i class="bi bi-shuffle d-none" onclick="Data('fetch',<?php echo $category_id; ?>);" id="fetch"></i>
                        </div>
                        <i class="bi bi-chevron-left col" id="back-btn"></i>
                        <div id="current" class="col-3"></div>
                        <i class="bi bi-chevron-right col" id="next-btn"></i>

                    </div>
                </div>
            </div>
        </div>
</div>
    
    
</body>
</html>
