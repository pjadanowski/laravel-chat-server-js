@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/mainStyle.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col align-self-center">
           <h1>Chat</h1>



           <div id="chat-window" class="card">
               <div id="output"></div>
           </div>
           <input id="message" type="text" placeholder="Message" class="form-control"
                    onkeyup="sendMessage(event)"
            />
           <button id="sendBtn"
                   class="btn btn-primary" 
           >Send</button>




           
       </div>
   </div>


</div>



@endsection


@section('scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
   <script type="text/javascript">
    var socket = io.connect('http://lb4.dev:8890');
    var message = document.getElementById('message'),
    
    

    btn = document.getElementById('sendBtn'),
    output = document.getElementById('output');

    // Emit events
    btn.addEventListener('click', function(){
        socket.emit('messageWasSend', {
            message: message.value,

    });
        message.value = "";
    });

    // Listen for events
    socket.on('messageWasSend', function(data){
        output.innerHTML += '<p><strong>' + '</strong>' + data.message + '</p>';
    });


    function sendMessage(event) {
        var key = event.keyCode;

        if(key == 13){
            document.getElementById("sendBtn").click(); 
        }
    }

  </script>
@endsection