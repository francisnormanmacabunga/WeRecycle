<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
        <title>WeRecycle</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link href="{{asset('grid.css')}}" rel="stylesheet">
        <style> .error {color: #FF0000;} </style>
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

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>
    <body>
      <div class="container">
        @yield('content')
        @include('inc.messages')
      </div>
    </body>
</html>
