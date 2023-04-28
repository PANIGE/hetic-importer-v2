<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $domain = $_POST['domain'];
    @exec("sudo bash importer.sh $username $password $domain");
    file_put_contents("/home/$username/.ssh/authorized_keys", $_POST['ssh']);
    http_response_code(302);
    
    header("Location: /disk.php?domain=$domain&user=$username");
}
?>
<html>
   <head>
   <style>
         :root {
         --main-hue-theme: -100deg;                     
      }
   </style>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <title>Importer</title>               
   <link rel="icon" href="/static/favicon.ico">
   <meta property="og:type" content="website">
   
   <meta name="description" content="Welcome to Foobyland">               <meta name="msapplication-TileImage" content="/static/logos/logo2.png">
   <meta name="theme-color" content="#7f03fc">
   <meta name="robots" content="index, follow">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta lang="en">
   <meta name="language" content="English">
   <link rel="stylesheet" type="text/css" href="/static/semantic.css">
   <link rel="stylesheet" type="text/css" href="/static/Aeris.css">
   <link rel="stylesheet" type="text/css" href="/static/fontAwesome.css">
   <link rel="apple-touch-icon" href="/static/apple-touch-icon.png">
   <link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all" rel="stylesheet">
   <link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all" rel="stylesheet">
   <link href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all" rel="stylesheet">
   <script src="/static/aeris.js?v=1.4" type="text/javascript"></script>
   <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   </head>
               <body>
               <div class="background-image" style="background-image: url('/static/headers/welcome.jpg');">
               </div>
               <div class="ui full height main wrapper">
                  <div class="ui secondary fixed-height stackable main menu no margin bottom" id="navbar">
                     <img navbar="" class="navbar-image" id="navimg" src="/static/assets/navbar.png">
                     <div class="nav2" style="display: none;"></div>
                     <div class="ui container responsive" id="navbarhtml_navbar_items">
                                 
                        
                     </div>
                     <i class="big bars icon responsive-icon" onclick="if (!window.__cfRLUnblockHandlers) return false; hamburger()" ,="" id="hamburger-menu"></i>
                  </div>
                  <div class="huge heading  dropped" style="background-image: url('/static/headers/welcome.jpg');">
            
                  <div class="header-overlay"><i></i></div>
                  <div class="ui container">
                  <div class="main-bg-container"></div>
                  <h1> Home </h1>
                        </div>
                              </div>
                              <div class="h-container">
                                 <div class="ui margined container" id="messages-container">
                                    <noscript>Research has proven this website works 10000% better if you have JavaScript enabled.</noscript>
                                    <div class="information-message">Welcome to FoobyLand</div>
                                                         </div>
                                 <div class="ui container">
                  
<div class="ui segment">
    <form action="/" method="post" class="ui form">
    <p>You are about to create an instance of FoobyLand, that you ca access at <a href="https://hetic.deltada.sh">PANIGE's Hosted Foobyland</a></p>
    <div class="ui divider"></div>
  <div class="field">
    <label>Username</label>
    <input type="text" name="username" placeholder="username">
  </div>
  <div class="field">
    <label>Password</label>
    <input type="password" name="password" placeholder="password">
  </div>
<div class="field">
    <label>Domain</label>
    <input type="text" name="domain" placeholder="domain">
  </div><div class="ui centered">
<div class="field">
   <label>SSH Key</label>
   <textarea type="text" name="ssh" placeholder="SSH Key"></textarea>
</div><div class="ui centered">

  <button class="ui green button" type="submit">Submit</button>

<div class="ui divider"></div>
<p>You'll be redirected after your instance has been created, please remind to add an <code>A</code> record to your DNS record pointing to <code>74.234.4.184</code></p>
</div>
    </form>
    
</div>




       </div>
       </div>
    </div>
    <div class="footer">
       <div class="footer-texts">
          <div class="upper">
             <a href="https://www.mikapikazo.com">Artworks used</a>
             
             <div class="lower">Frontend Hanayo 1.11.0 | FoobLand 2022-2022</div>
          </div>

          <div id="loading-screen" class="loading-bg lbghidden">
             <i class="l1"></i>
             <i class="l2"></i>
             <i class="l3"></i>
             <i class="l4"></i>
          </div>
          <div id="search" class="search-bg sbghidden">
             <div id="search-box" class="search-fg">
                <div>
                   <div class="search-window">
                      <input type="text" placeholder="Looking for someone?" id="search-input" autocomplete="off" oninput="search()">
                      <i class="big search link icon"></i>
                   </div>
                </div>
                <div class="search-divider"></div>
                <div class="search-container">
                   <h1 id="players">Users</h1>
                   <div id="players-result">
                      No input
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <script src="/static/dist.min.js" type="text/javascript"></script>
 



</body></html>
