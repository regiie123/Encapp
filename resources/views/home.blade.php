<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Encryption</title>
    <link rel="stylesheet" href="css/start.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
        <header>
            <div class="title">
                <svg class="logo_start" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M14 9v2h-4v-2c0-1.104.897-2 2-2s2 .896 2 2zm10 3c0 6.627-5.373 12-12 12s-12-5.373-12-12 
                    5.373-12 12-12 12 5.373 12 12zm-8-1h-1v-2c0-1.656-1.343-3-3-3s-3 1.344-3 3v2h-1v6h8v-6z"/>
                </svg>
                <a href="#" class="logo">Multiple Encryption</a>
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

    <div class="choices-box">
        <div class="button-container">
            <div class="move">
                <div class="button1">

                    <a href="/file_enc"><button type="button"><svg class="file" xmlns="http://www.w3.org/2000/svg" 
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024">
                        <path fill="white" d="M928 444H820V330.4c0-17.7-14.3-32-32-32H473L355.7 186.2a8.15 8.15 0 0 0-5.5-2.2H96c-17.7 0-32 14.3-32 32v592c0 
                        17.7 14.3 32 32 32h698c13 0 24.8-7.9 29.7-20l134-332c1.5-3.8 2.3-7.9 2.3-12c0-17.7-14.3-32-32-32zm-180 0H238c-13 0-24.8 
                        7.9-29.7 20L136 643.2V256h188.5l119.6 114.4H748V444z"/>
                        </svg> Share a File </button>
                    </a>
                </div>

                <div class="button2">
                    <a href="/banned"><button type="button"><svg xmlns="http://www.w3.org/2000/svg" class="file"  viewBox="0 0 256 256"><path fill="currentColor" d="M128 24a104 104 0 1 0 104 104A104.2 104.2 0 0 0 128 24Zm0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88Zm12-36a12 12 0 1 1-12-12a12 12 0 0 1 12 12Zm49.7-57.7a8.1 8.1 0 0 1 0 11.4a8.2 8.2 0 0 1-11.4 0L168 123.3l-10.3 10.4a8.2 8.2 0 0 1-11.4 0a8.1 8.1 0 0 1 0-11.4l10.4-10.3l-10.4-10.3a8.1 8.1 0 0 1 11.4-11.4l10.3 10.4l10.3-10.4a8.1 8.1 0 0 1 11.4 11.4L179.3 112Zm-80-20.6L99.3 112l10.4 10.3a8.1 8.1 0 0 1 0 11.4a8.2 8.2 0 0 1-11.4 0L88 123.3l-10.3 10.4a8.2 8.2 0 0 1-11.4 0a8.1 8.1 0 0 1 0-11.4L76.7 112l-10.4-10.3a8.1 8.1 0 0 1 11.4-11.4L88 100.7l10.3-10.4a8.1 8.1 0 0 1 11.4 11.4Z"/></svg> Chat Ban List </button>
                    </a>
                </div>
                
                @if($pass === 1)
                <div class="button3">
                    <a href="#" onclick="GFG_Fun()"><button type="button"><svg class="text" xmlns="http://www.w3.org/2000/svg" 
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path fill="white" 
                        d="M14 18H4c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2h2.4l1.7 3l1.7-1l-2.3-4H4v-6h10v6h-3v2h3c1.1 
                        0 2-.9 2-2v-6c0-1.1-.9-2-2-2zm5 8h2c3.9 0 7-3.1 7-7v-2h-2v2c0 2.8-2.2 5-5 
                        5h-2v2zm-1-15h6v2h-6zm0-4h12v2H18zm0-4h12v2H18zM4 14h2v-2c0-2.8 2.2-5 
                        5-5h4V5h-4c-3.9 0-7 3.1-7 7v2z"/></svg>Chat with Users</button></a>
                </div>
                @else
                <div class="button3">
                    <a href="/choose_chat"><button type="button"><svg class="text" xmlns="http://www.w3.org/2000/svg" 
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path fill="white" 
                        d="M14 18H4c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2h2.4l1.7 3l1.7-1l-2.3-4H4v-6h10v6h-3v2h3c1.1 
                        0 2-.9 2-2v-6c0-1.1-.9-2-2-2zm5 8h2c3.9 0 7-3.1 7-7v-2h-2v2c0 2.8-2.2 5-5 
                        5h-2v2zm-1-15h6v2h-6zm0-4h12v2H18zm0-4h12v2H18zM4 14h2v-2c0-2.8 2.2-5 
                        5-5h4V5h-4c-3.9 0-7 3.1-7 7v2z"/></svg>Chat with Users</button></a>
                </div>
                @endif

                <div class="button4">
                    <a href="/text_enc"><button type="button"><svg class="encryp" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path fill="white" 
                        d="M29 21.278V19a4 4 0 0 0-8 0v2.278A1.994 1.994 0 0 0 20 23v5a2.002 
                        2.002 0 0 0 2 2h6a2.002 2.002 0 0 0 2-2v-5a1.994 1.994 0 0 0-1-1.722zM25 
                        17a2.002 2.002 0 0 1 2 2v2h-4v-2a2.002 2.002 0 0 1 2-2zm-3 11v-5h6v5zM2 
                        2h2v4H2zm12 0h2v4h-2zm4 0h2v4h-2zM2 8h2v8H2zm0 10h2v8H2zm12 0h2v8h-2zM6 
                        8h2v8H6zm12 0h2v6h-2zm-8 18H8a2.002 2.002 0 0 1-2-2v-4a2.002 2.002 0 0 1 
                        2-2h2a2.002 2.002 0 0 1 2 2v4a2.002 2.002 0 0 1-2 2zm-2-6v4h2v-4zm6-4h-2a2.002 
                        2.002 0 0 1-2-2v-4a2.002 2.002 0 0 1 2-2h2a2.002 2.002 0 0 1 2 2v4a2.002 
                        2.002 0 0 1-2 2zm-2-6v4h2v-4zm-2-4H8a2.002 2.002 0 0 1-2-2V2h2v2h2V2h2v2a2.002 
                        2.002 0 0 1-2 2z"/></svg>Text Encryption</button></a>
                </div>
            </div>
        </div>

    </div>

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
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
        alert(msg);
        }
    </script>

    <script>
        function GFG_Fun() {
            window.alert("You have been banned from using chat!");
            return false;
        }
    </script>
    
</body>
</html>