<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Empire: CRM for Real Estate</title>

        {{-- Bootstrap css --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        {{-- jquery --}}
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous"></script>
        {{-- popper --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        {{-- bootstrap js --}}
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        {{-- font --}}
        <link href="https://fonts.googleapis.com/css?family=Cinzel|Roboto" rel="stylesheet">
        
        {{-- favicon --}}
        <link rel="icon" type="image/png" href="../assets/images/favicon.png">

        {{-- external css --}}
        <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
   

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/home"><span id="brandname">EMPIRE</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- nav-toggler -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/contacts">Contacts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/opportunities">Opportunities</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/deals">Deals</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  More
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Planner</a>
                  <a class="dropdown-item" href="#">Calendar</a>
                  <a class="dropdown-item" href="#">Notes</a>
                  <a class="dropdown-item" href="#">Files</a>
                  <a class="dropdown-item" href="#">Professionals</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Marketing</a>
                </div>
              </li>              
            </ul>            
          </div>

          <div class="">
             <ul class="navbar-nav ml-auto pr-3">
              <li class="nav-item dropdown ml-auto">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  More
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="" id="profile">
                       <img src="https://via.placeholder.com/50x50">
                        <p>Name: </p>
                        <p>Email: </p>
                   
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Log out</a>
                     </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>

        <div class="container-fluid">
            <h1>Home page</h1>
            


                       
               
            </div>
        </div>      
    </body>
</html>
