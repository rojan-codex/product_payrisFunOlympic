<?php
session_start(); //to start the session 
?>

<!doctype html>
<html lang="en">

<head>
    <title>Welcome to Fun Olympic Games 2024</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="United Limited| Real State Business| Buy House| Buy Land">
    <meta name="description" content="United Limited| Real State Business| Buy House| Buy Land">
    <meta name="author" content="Asbin Magar">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="assets/img/logo2.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Monoton&family=Roboto:wght@100;300;400&display=swap"
        rel="stylesheet">
    <!-- <style>
        /* Add the desired height and width for carousel images */
        .carousel-item img {
            width: 100%; /* Set the width as you like, it will scale proportionally */
            height: 500px; /* Set the height as you like */
            object-fit: cover; /* This property ensures the image covers the entire container */
        }
    </style> -->
    <style>
        .chatbox {
            width: 70%;
            height: 340px;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.618);
        }

        .messages {
            overflow-y: auto;
            height: 300px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: end;
            height: 86%;
        }

        .messages p {
            padding-top: 0;
            padding-bottom: 0;
            margin-top: 0;
            margin-bottom: 0;
        }

        .message-input {
            width: calc(100% - 80px);
            padding: 16px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: transparent;
            height: 10px;
            font-size: 13px;
        }

        .message-input::placeholder {
            font-weight: bold;
            letter-spacing: 0.6px;
        }

        .message-form button {
            width: fit-content;
            vertical-align: middle;
            color:rgb(226 61 61);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 16px;
            border: none;
            font-size: 32px;
            background-color: transparent;
        }

        .chatbox-section {
            width: 100%;
            justify-content: center;
            align-items: center;
            margin-top: 4%;
            margin-bottom: 4%;
        }

        .chatbox-section .chatbox-container {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 8%;
        }

        .chatbox-section .chatbox-container .video {
            width: 60%;
            height: 454px;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_SESSION['username'])) {
        include 'header.php';
    } else {
        include 'userheader.php';
    }
    ?>

    <div class="jumbotron jumbotron-fluid mb-0 " style="margin-top: 5%; padding: 2rem 2rem;">
        <div class="container text-center">
            <h1 class="display-4">Videos</h1>
        </div>
    </div>
    <!-- main body start  -->
    <div class="container-fluid bg-white p-5">
        <div class="container-fuild">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="text-center">Watch Matches Live <i class="bi bi-broadcast text-danger"></i></h2>
                    <hr class="my-2">

                    <?php
                    // <!-- creating variable  -->
                    $dir = glob('assets/video/{*.mp4}', GLOB_BRACE);
                    //  loop start 
                    foreach ($dir as $value) {

                        ?>
                        <!-- photo insert  -->
                        <a href="<?php echo $value; ?>">
                            <!-- <video src="<?php echo $value; ?>" alt="Gurus of Fitness" width="300px" align="left" hspace="5px"
                                vspace="5px">  or -->
                            <center>

                                <video width="640px" height="350px" class="my-3" controls>
                                    <source src="<?php echo $value; ?>" type="video/mp4" />
                                    <!-- <source src="<?php echo $value; ?>" type="video/ogg" /> -->
                                </video>
                            </center>
                        </a>
                        <!-- loop end  -->
                        <?php
                    }
                    ?>

                </div>
                <div class="col-md-4" style="padding-top:5%">
                <!-- Chatbox 1 -->
                <div class="chatbox">
                    <div class="messages" id="messages1"></div>
                    <form class="message-form" id="message-form1">
                        <input type="text" class="message-input"   id="message-input1" placeholder="Type your comment here..." />
                        <button type="submit"><i class='bx bxs-send'></i></button>
                    </form>
                </div>

                <!-- Chatbox 2 -->
                <div class="chatbox my-5">
                    <div class="messages" id="messages2"></div>
                    <form class="message-form" id="message-form2">
                        <input type="text" class="message-input" id="message-input2" placeholder="Type your comment here..." />
                        <button type="submit"><i class='bx bxs-send'></i></button>
                    </form>
                </div>

                <!-- Chatbox 3 -->
                <div class="chatbox">
                    <div class="messages" id="messages3"></div>
                    <form class="message-form" id="message-form3">
                        <input type="text" class="message-input" id="message-input3" placeholder="Type your comment here..." />
                        <button type="submit"><i class='bx bxs-send'></i></button>
                    </form>
                </div>

                <!-- Chatbox 4 -->
                <div class="chatbox mt-5">
                    <div class="messages" id="messages4"></div>
                    <form class="message-form" id="message-form4">
                        <input type="text" class="message-input" id="message-input4" placeholder="Type your comment here..." />
                        <button type="submit"><i class='bx bxs-send'></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
            <?php
                    include 'rightbar.php';
                    ?>
            </div>
        </div>
        
    </div>
    <!-- main body end  -->

    <?php
    include 'footer.php';
    ?>
    <script>
    const messageForms = document.querySelectorAll("[id^='message-form']");
    const messageInputs = document.querySelectorAll("[id^='message-input']");
    const messagesContainers = document.querySelectorAll("[id^='messages']");

    messageForms.forEach((form, index) => {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const messageInput = messageInputs[index];
            const messagesContainer = messagesContainers[index];
            
            const message = messageInput.value;
            if (!message) return;

            const messageElement = document.createElement("p");
            messageElement.textContent = message;
            messageElement.classList.add("message");

            messagesContainer.appendChild(messageElement);
            messageInput.value = "";
        });
    });
</script>
    
</body>

</html>