<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-6 mx-auto mt-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Your Name</label>
                    <input type="email" class="form-control" value="" id="username">
                </div>

                <div class="form-group mx-auto mt-4">
                    <label for="exampleFormControlTextarea1">Your Message</label>
                    <textarea class="form-control" value="" id="message" rows="3"></textarea>
                </div>

                <button class="btn btn-success" id="sendbtn">Send</button>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
    $("document").ready(function(){
        swal("Hello world!");
        let sendBtn = $("#sendbtn");
        // console.log(username);
        // add click event to send button
        sendBtn.on('click',function(){

            let username = $("#username").val();
            let message = $("#message").val();

            if(username != '' && message != ''){
                // send some data whene the user 
                // has been clicked the button
                let data = {"user":username,"msg":message};
                // send data
                conn.send(JSON.stringify(data));
            }
        });

        // run new web socket to lisetn for 
        // new Connection and messages
        var conn = new WebSocket('ws://localhost:8080');
        conn.onopen = function(e) {
            console.log("Connection established!");
        };

        conn.onmessage = function(e) {
            let info = JSON.parse(e.data);
            console.log(info.user);
            alert(info.user+" : said "+info.msg);
        };
    });
</script>
</body>
</html>