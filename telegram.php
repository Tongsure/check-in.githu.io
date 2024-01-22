<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <title>Telegram database</title>
    <style>
        *{
            font-family: inter;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 500px;
            padding: 20px;
            margin: 10px;
            height: 500px;
            background-color: #2B4F77;
          
            border-radius: 10px;
        }

        input, label {
            width: 300px;
            margin: auto;

        }

       .containers{
        display:flex;
        justify-content: center;
        height: 85vh;
        align-items: center;
       }

        textarea {
            width: 300px;
            margin: auto;
            margin-top: 20px;
        }
        #pic {
            filter: drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.5));
        }  

    </style>
</head>
<body>

<div class="containers" >
    <form action="telegram.php" method="post">
        <h4 style="text-align:center ; font-size:20px ; color:whitesmoke">Check in</h4>
        <div class="form-group">
        <p id="demo"></p>
            <label for="exampleInputEmail1" style="color:whitesmoke">ID</label>
            <input type="text" class="form-control"  name="ID_user" id="ID_id" aria-describedby="emailHelp" placeholder="Enter ID">
            <small id="emailHelp"> Plase enter your ID</small><br>
            <!-- <button type="submit" id="login_btn">Check in</button> -->
            <div style="color:whitesmoke"  id="login_btn"  class="btn-group" role="group" aria-label="Basic example">
                <button id="change-icon"  class="btn btn-primary"  style="background-color: #1b3451; border:none"><i class="fa-solid fa-check"></i></button>
                <button id="change-btn"  class="btn btn-primary" style="background-color:#1b3451 ;  border:none">Check in</button>
            </div><br>
        
            <center><img id="pic" style="display:none" src="pngtree-simple-style-correct-symbol-icon-material-image_2291415-removebg-preview.png"></center>
        </div>
        <!-- <label>ID</label>
        <input type="text" name="ID_user" id="ID_id" required>
        <button type="submit" id="login_btn">Check in</button> -->
    </form>
</div>
<script>
    var Idcheck = [
        {
            ID: "0005164",
        },
        {
            ID: "0005165",
        },
        {
            ID: "0005166",
        },
        {
            ID: "0005167",
        },
        {
            ID: "0005168",
        },
        {
            ID: "0005169",
        },
        {
            ID: "0005170",
        },
    ];

    $("#login_btn").on("click", function (event) {
        var enteredID = $("#ID_id").val();
        var validID = false;

        for (let i = 0; i < Idcheck.length; i++) {
            if (enteredID === Idcheck[i].ID) {
                $("#pic").show().attr("src", "pngtree-simple-style-correct-symbol-icon-material-image_2291415-removebg-preview.png");
                $("#emailHelp").text("Thank you").css("color", "#00C62F");
                var audio = new Audio('mixkit-female-says-thank-you-380.wav'); // Replace with the path to your sound file
                audio.play();
                validID = true;
                break;
            }
        }

        if (!validID) {
        var audio = new Audio('wrong_sound_effect.mp3'); // Replace with the path to your sound file
        
        // Play the audio
        audio.play();
        $("#pic").show().attr("src", "wrong.png");
        // Attach an event listener to the 'ended' event
        audio.addEventListener('ended', function () {
            // Change the image source after the audio has finished playing
           
            $("#emailHelp").text("Please enter the right ID").css("color", "red");
        });

        event.preventDefault(); // Prevent form submission
    }
    });
</script>

</body>
</html>

<?php

try{
    $botToken ="6803035188:AAFqKzebTpZ6tE7LgZ9iHLiPpiB8q9e3S_k";
   date_default_timezone_set('Asia/Phnom_Penh');


       
$Employee_check = array(
    "0005164" => array(
        "Name" => "Chrea Tongsure",
        "Position" => "Full Stack"
    ),
    "0005165" => array(
        "Name" => "Po nika",
        "Position" => "Content Writer"
    ),
    "0005166" => array(
        "Name" => "Po Wathtey",
        "Position" => "Designer"
    ),
    "0005167" => array(
        "Name" => "Chrea Reachny",
        "Position" => "Accounting"
    ),
    "0005168" => array(
        "Name" => "Po nita",
        "Position" => "Accounting"
    ),
    "0005169" => array(
        "Name" => "Chrea vitou",
        "Position" => "Guide"
    ),
    "0005170" => array(
        "Name" => "Chrea dara",
        "Position" => "Designer"
    ),
);

$hour = date("G");

if ($hour >= 6 && $hour < 12) {
    $timeOfDay = "Morning";
} elseif ($hour >= 12 && $hour < 17) {
    $timeOfDay = "Afternoon";
} elseif($hour >=17 && $hour < 21){
    $timeOfDay = "Evening";
} else{
    $timeOfDay = "Night";
}

   $ID = $_POST['ID_user'];
   $Employee = $Employee_check[$ID];
   $Name = $Employee["Name"];
   $Position = $Employee["Position"];
   if(!$Employee){
   
    return;
   }
        $Date = date("l/Y/M/d h:i:sa");
        $telegramMessage = "====================== \n";
        $telegramMessage .= "=                 Check in               =\n";
        $telegramMessage .= "====================== \n";
        $telegramMessage .= "Date : $Date \n";
        $telegramMessage .= "Shift : $timeOfDay  \n";
        $telegramMessage .= "Username:  $Name \n";
        $telegramMessage .= "ID: $ID  \n";
        $telegramMessage .= "Position:  $Position  \n";
        $telegramMessage .= "====================== \n";

            // Send message to Telegram bot
    $telegramData = [
        'text' => $telegramMessage,
        'chat_id' => '1169639985',
        ];

        $telegramUR = file_get_contents("https://api.telegram.org/bot" . $botToken . "/sendMessage?" . http_build_query($telegramData));
   

}
catch(error){
  echo"Error";
};
?>
