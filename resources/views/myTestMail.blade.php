<!DOCTYPE html>
<html>
    <head>
        <title>{{ config('app.name') }}</title>
    </head>
    <body>

        <h1>{{ $details['title'] }}</h1>
        <p>{{ $details['body'] }}</p>
        <p>Email : {{ $details['data']['email']}}</p>
        <p>Password : {{ $details['data']['password']}}</p>
        <p>Thank you</p>
    </body>
</html>