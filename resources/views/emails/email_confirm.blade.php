<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Verify Your Email Address</h2>

<div>
    Thanks {{ $name }} for creating an account with the verification demo app.
    Please follow the link below to verify your email address
    <a href="{{ URL::to('auth/verify/' . $key) }}">{{ URL::to('register/verify/' . $key) }}</a>.<br/>

</div>

</body>
</html>