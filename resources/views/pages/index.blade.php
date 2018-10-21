<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="http://werecycle.eco/css/app.css">
        <link href="grid.css" rel="stylesheet">
        <style> .error {color: #FF0000;} </style>
        <title>WeRecycle</title>
        <script>
        function validNo(input, kbEvent) {
          var keyCode, keyChar;
          keyCode = kbEvent.keyCode;
          if (window.event)
          keyCode = kbEvent.keyCode;
          else
          keyCode = kbEvent.which;
          if (keyCode == null) return true;
          keyChar = String.fromCharCode(keyCode);
          var charSet = "0123456789";
          if (charSet.indexOf(keyChar) != -1) return true;
          if (keyCode == null || keyCode == 0 || keyCode == 8 || keyCode == 9 || keyCode == 13 || keyCode == 27) return true;
          return false;
        }
        function onlyNumbers(e) {
          var keynum;
          var keychar;
          var numcheck;
          if(window.event) {
            keynum = e.keyCode;}
            else if(e.which) {
              keynum = e.which; }
              keychar = String.fromCharCode(keynum);
              numcheck = /\d/;
              return numcheck.test(keychar);
            }
        </script>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>
    <body>
      <div class="container">
          <div class="jumbotron mt-3 text-center">
    <h3>Welcome to landing page!</h3>
    <p class="lead">This is WeRecycle!!</p>

    <div class="row">
          <div class="container col-md-4 center-align">
        <h4 class="d-flex justify-content-between align-items-center mb-3">

        </h4>
        <ul class="list-group mb-3">


          <li class="list-group-item d-flex justify-content-between">
            <span>Volunteers attending</span>
            <strong>0</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Volunteers needed</span>
            <strong>10</strong>
          </li>
        </ul>


      </div>
    </div>

    <a class="btn btn-lg btn-primary" href="/createApplicant" role="button">Apply as a Volunteer </a>


  </div>

  <div class="jumbotron mt-3 text-center">
    <h3>Temporary Links</h3>
    <p class="lead">Under Construction!</p>
    <a class="btn btn-success btn-lg" href="/activitycoordinator/login" role="button">Go to AC Page</a>
    <a class="btn btn-success btn-lg" href="/programdirector/login" role="button">Go to PD Page</a>
    <a class="btn btn-success btn-lg" href="/admin/login" role="button">Go to Admin Page</a>
  </div>
              </div>
    </body>
</html>
