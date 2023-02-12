<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Text Censor | Multiple Encryption</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
      .title .logo_start {
        float: left;
        margin-top: 0.3rem;
        margin-right: 0.5em;
        width: 1.3em;
      }
      .title .logo_start path {
        fill: white;
      }
      .title .logo {
        color: white;
        font-weight: bold;
        text-decoration: none;
        font-size: 1.3rem;
      }

      .wrap{
        width: 100%;
        display: flex;
        
      }

      nav {
        position: fixed;
        right: 0;
        top: 0;
        background: #2C2C2C;
        height: 100vh;
        width: 40%;
        z-index: 999;
        text-transform: uppercase;
        transform: translateX(100%);
        transition: transform 0.5s ease-in-out;
      }
      nav ul {
        list-style-type: none;
        padding: 0;
        margin-top: 8em;
      }
      nav ul a {
        color: white;
        padding: 0.75em 2em;
        display: block;
        text-decoration: none;
      }
      nav ul a:hover {
        background: #414141;
        font-weight: bold;
      }
      nav .close {
        float: right;
        margin: 1em;
        width: 2em;
      }
      nav .close path {
        fill: white;
      }

      .wrap header {
        display: flex;
        width: 100%;
        justify-content: center;
        gap: 10em;
      }
      header .menu {
        width: 1.7em;
        cursor: pointer;
    }
    .open-nav {
      transform: translateX(0%);
    }
    @media only screen and (min-width: 680px) {
  body {
    
    font-family: "Poppins", sans-serif;
  }
  }
  @media only screen and (min-width: 920px) {
    .center {
      display: none;
    }
    .menu {
      display: none;
    }
    nav {
      transform: translateX(0);
      position: unset;
      display: block;
      width: auto;
      height: auto;
      background: none;
    }
    nav .close {
      display: none;
    }
    nav ul {
      display: flex;
      margin: 0;
    }
    nav ul a {
      color: white;
      padding: 0.5em 1.5em;
      font-size: 0.9rem;
    }
    nav ul a:hover {
      background: none;
      text-decoration: underline;
    }
    .input-container .select-label {
      text-align: left;
      margin-left: 5.2em;
      font-size: 0.6rem;
    }
}
  </style>

</head>
<body>
  <div class="wrap">
        <header>
            <div class="title">
                <svg class="logo_start" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M14 9v2h-4v-2c0-1.104.897-2 2-2s2 .896 2 2zm10 3c0 6.627-5.373 12-12 12s-12-5.373-12-12 
                    5.373-12 12-12 12 5.373 12 12zm-8-1h-1v-2c0-1.656-1.343-3-3-3s-3 1.344-3 3v2h-1v6h8v-6z"/>
                </svg>
                <a href="index.html" class="logo">Multiple Encryption</a>
            </div>
                <nav>
                    
                    <svg class="close" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 
                        0-5.517 4.48-9.997 9.997-9.997zm0 8.933-2.721-2.722c-.146-.146-.339-.219-.531-.219-.404 0-.75.324-.75.749 0 .193.073.384.219.531l2.722 
                        2.722-2.728 2.728c-.147.147-.22.34-.22.531 0 .427.35.75.751.75.192 0 .384-.073.53-.219l2.728-2.728 2.729 2.728c.146.146.338.219.53.219.401 
                        0 .75-.323.75-.75 0-.191-.073-.384-.22-.531l-2.727-2.728 2.717-2.717c.146-.147.219-.338.219-.531 0-.425-.346-.75-.75-.75-.192 0-.385.073-.531.22z" 
                        fill-rule="nonzero"/>
                    </svg>

                    <ul>
                        <li><a href="/home">Home</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>

                </nav>

            <svg class="menu" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 1024 1024">
                    <path fill="white" d="M160 448a32 32 0 0 1-32-32V160.064a32 32 0 0 1 
                    32-32h256a32 32 0 0 1 32 32V416a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 
                    1-32-32V160.064a32 32 0 0 1 32-32h255.936a32 32 0 0 1 32 32V416a32 32 0 0 
                    1-32 32H608zM160 896a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h256a32 32 0 0 1 
                    32 32v256a32 32 0 0 1-32 32H160zm448 0a32 32 0 0 1-32-32V608a32 32 0 0 1 32-32h255.936a32 
                    32 0 0 1 32 32v256a32 32 0 0 1-32 32H608z"/>
            </svg>

        </header>  
  </div>

  <div class="wrapper">
    <section class="chat-area">
      <header>
        <a href="/choose_chat" class="back-icon">BACK</a>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M8 14.5a6.47 6.47 0 0 0 3.25-.87V11.5A2.25 2.25 0 0 0 9 9.25H7a2.25 2.25 0 0 0-2.25 2.25v2.13A6.47 6.47 0 0 0 8 14.5Zm4.75-3v.937a6.5 6.5 0 1 0-9.5 0V11.5a3.752 3.752 0 0 1 2.486-3.532a3 3 0 1 1 4.528 0A3.752 3.752 0 0 1 12.75 11.5ZM8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16ZM9.5 6a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0Z" clip-rule="evenodd"/></svg>
        <div class="details">
          <span>{{$owned}}</span>

        </div>
      </header>
      <div class="chat-box">
        
        
        

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="{{$to_id}}" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off" id="text-censor" onchange="GFG_Fun()">
        <button>Send</button>
      </form>
    </section>
  </div>

  
  <script>
  const form = document.querySelector(".typing-area"),
  incoming_id = form.querySelector(".incoming_id").value,
  inputField = form.querySelector(".input-field"),
  sendBtn = form.querySelector("button"),
  chatBox = document.querySelector(".chat-box");

  form.onsubmit = (e)=>{
      e.preventDefault();
  }

  inputField.focus();
  inputField.onkeyup = ()=>{
      if(inputField.value != ""){
          sendBtn.classList.add("active");
      }else{
          sendBtn.classList.remove("active");
      }
  }

  sendBtn.onclick = ()=>{
      let xhr = new XMLHttpRequest();
      token = document.querySelector('meta[name="csrf-token"]').content;
      xhr.open("POST", "/chat_send/"+{{$to_id}}, true);
      xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";
                let data2 = xhr.response;
                console.log(data2);
                if(data2 == 3){
                  console.log(data2);
                  window.alert("You have been banned from using chat!");
                  window.location.href = "/home";
                }
                else if(data2 > 0 && data2 < 3){
                  console.log(data2);
                  window.alert("Inappropriate Word detected!");
                }
                scrollToBottom();
            }
        }
      }
      let formData = new FormData(form);
      xhr.setRequestHeader('X-CSRF-TOKEN', token);
      xhr.send(formData);
  }
  chatBox.onmouseenter = ()=>{
      chatBox.classList.add("active");
  }

  chatBox.onmouseleave = ()=>{
      chatBox.classList.remove("active");
  }

  setInterval(() =>{
      let xhr = new XMLHttpRequest();
      token = document.querySelector('meta[name="csrf-token"]').content;
      xhr.open("POST", "/chat_retrieve/"+{{$to_id}}, true);
      xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){


              let data = xhr.response;
              
              //let body = JSON.parse(data);
              console.log(data);
              let output;
              


              
                
              

              //let data = xhr.response;
              //let data = output;
              
              
              chatBox.innerHTML = data;
              //let body = JSON.parse(data.responseText());
              
              if(!chatBox.classList.contains("active")){
                  scrollToBottom();
                }
            }
        }
      }
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.setRequestHeader('X-CSRF-TOKEN', token);
      xhr.send();
  }, 500);

  function scrollToBottom(){
      chatBox.scrollTop = chatBox.scrollHeight;
    }
  </script>

  <script>
    const menu = document.querySelector('.menu')
    const close = document.querySelector('.close')
    const nav = document.querySelector('nav')

    menu.addEventListener('click', () => {
      nav.classList.add('open-nav')
    })

    close.addEventListener('click', () => {
      nav.classList.remove('open-nav')
    })
  </script>

  <script>
          function GFG_Fun() {
              const textarea = document.getElementById('text-censor');
              let badwords = /a55|ass|bitch|b!tch|b1tch|damn|fuck|f u c k|fucked|fucker|goddamn|piece of shit|mothafucker|motherfucker|mother fucker|n1gga|nigga|porn|porno|pornography|sh1t|shit|amputa|animal ka|bobo|demonyo ka|gaga|gagi|gago|hayop ka|hayup|hinayupak|kagaguhan|kaululan|kingina|kupal|leche|nimal|ogag|pakshet|pakyu|pesteng yawa|pukinangina|puta|putang ina|putangina|putanginamo|putragis|taena|tanga|tangina|ulol|ulul/gi;
              let censor1 = textarea.value;
              let censor2 = censor1.replace(badwords,'*****');
              document.getElementById('text-censor').value = censor2;;
          }
  </script>

  <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
</body>
</html>