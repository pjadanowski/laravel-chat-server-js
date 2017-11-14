<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

  

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/mainStyle.css') }}">
</head>
<body>
    <div class="flex-center position-ref full-height">
       {{--  @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                        @endauth
            </div>
        @endif --}}

        <div class="content">

            <h1>Chat</h1>

      
                    
                    <div id="chat-window" class="card">
                         <div id="output"></div>
                    </div>
                    <input id="message" type="text" placeholder="Message" class="form-control" />
                    <button id="send"
                            class="btn btn-primary" 
                    >Send</button>
    



           
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
    <script type="text/javascript">
        var socket = io.connect('http://lb4.dev:8890');
        var message = document.getElementById('message'),
      
        btn = document.getElementById('send'),
        output = document.getElementById('output');

        // Emit events
        btn.addEventListener('click', function(){
            socket.emit('messageWasSend', {
            message: message.value,
            // handle: handle.value
        });
            message.value = "";
        });

        // Listen for events
        socket.on('messageWasSend', function(data){
            output.innerHTML += '<p><strong>' + '</strong>' + data.message + '</p>';
        });
    </script>
</body>
</html>
