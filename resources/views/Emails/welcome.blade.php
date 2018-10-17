<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome Email</title>
  </head>
  <body>
    <h2>Welcome to WeRecycle {{$user['firstname']}}!</h2><br/>
    Your successfully created a profile! Sign in with this credentials!<br/><br/>
    Username: {{$user['username']}}<br/>
    Password: {{$user['password']}}
  </body>
</html>
