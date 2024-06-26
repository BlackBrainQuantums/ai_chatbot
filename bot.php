<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YaadBox | BlackBrain Quantums</title>
    <link rel="stylesheet" href="style.css">

<!-- BlackBrain Quantums-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YaadBox</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="title">YaadBox</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Yo! Wah gwaan?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here..." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        $("#send-btn").on("click", function(){
            $value = $("#data").val();
            $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
            $(".form").append($msg);
            $("#data").val('');
            
            // start ajax code
            $.ajax({
                url: 'message.php',
                type: 'POST',
                data: { text: $value }, // Corrected data format
                success: function(result){
                    $reply = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                    $(".form").append($reply);
                    // when chat goes down the scroll bar automatically comes to the bottom
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                },
                error: function(xhr, status, error) {
                    console.error("An error occurred:", error); // Handle errors
                }
            });
        });
    });
</script>
    
</body>
</html>