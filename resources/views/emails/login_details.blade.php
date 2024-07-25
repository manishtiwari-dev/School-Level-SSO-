<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Details</title>
</head>
<body>
    <h1>Login Details</h1>
    <p>Hello,</p>
    <p>Your login details:</p>
    <ul>
        <li><strong>Email:</strong> {{ $loginDetails['email'] }}</li>
        <li><strong>Password:</strong> {{ $loginDetails['password'] }}</li>
    </ul>
    <p>Thank you!</p>
</body>
</html>
