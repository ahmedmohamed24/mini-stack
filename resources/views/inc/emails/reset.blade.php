<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini_Stack</title>
</head>
<body>
    <h1>This is an email form mini-stack.com</h1>
    <h3>To reset your password click <a href="{{ route('pass.reset',[$email,$token]) }}">Here</a></h3>
</body>
</html>
{{-- {{ route('pass.reset',$email,$token) }} --}}
