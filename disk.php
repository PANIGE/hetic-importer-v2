<?php

$domain = $_GET['domain'];
$domain = str_replace(" ", "", $domain);

$username = $_GET['username'];

$path = "/www/$domain";

function GetDirectorySize($path){
    $bytestotal = 0;
    $path = realpath($path);
    if($path!==false && $path!='' && file_exists($path)){
        foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
            $bytestotal += $object->getSize();
        }
    }
    return $bytestotal;
}

function getSizeSuffix($bytes, $decimalPlaces = 1) {
    if ($decimalPlaces < 0) { throw new InvalidArgumentException("decimalPlaces"); }
    if ($bytes < 0) { return "-" . getSizeSuffix(-$bytes, $decimalPlaces); }
    if ($bytes == 0) { return sprintf("%0.".$decimalPlaces."f bytes", 0); }

    // mag is 0 for bytes, 1 for KB, 2, for MB, etc.
    $mag = (int)log($bytes, 1024);

    // 1 << (mag * 10) == 2 ^ (10 * mag) 
    // [i.e. the number of bytes in the unit corresponding to mag]
    $adjustedSize = (float)$bytes / (1 << ($mag * 10));

    // make adjustment when the value is large enough that
    // it would round up to 1000 or more
    if (round($adjustedSize, $decimalPlaces) >= 1000)
    {
        $mag += 1;
        $adjustedSize /= 1024;
    }

    return sprintf("%0.".$decimalPlaces."f %s", $adjustedSize, array("bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB")[$mag]);
}

$size = GetDirectorySize($path);
$size = getSizeSuffix($size);
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
                  <h1> Disk Space Usage for : <?= $domain ?> </h1>
                        </div>
                              </div>
                              <div class="h-container">
                                 <div class="ui margined container" id="messages-container">
                                    <noscript>Research has proven this website works 10000% better if you have JavaScript enabled.</noscript>
                                    <div class="information-message">Welcome to FoobyLand</div>
                                                         </div>
                                 <div class="ui container">
                  
<div class="ui segment">
Disk Space Being Used for <?= $domain ?> : <?= $size ?>
</div>
<a class="ui blue inverted button" href="/backup.php?username=<?=$useranme?>&domain=<?=$domain?>">Create Backup</a>
<a class="ui green inverted button" href="<?=$domain ?>>Access Site </a>



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
