<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Details</title>
</head>
<body>
    <h1>Registration Details</h1>
    <p>Hello,</p>
    <p>Your Registration details:</p>
    <ul>
        <li><strong>Registration Number:</strong> {{ $registrationDetails['registration_number'] }}</li>
        {{-- <li><strong>Name:</strong> {{ $registrationDetails['name'] }}</li> --}}
        <li><strong>Email:</strong> {{ $registrationDetails['email'] }}</li>
    </ul>
    <p>Thank you!</p>
</body>
</html>
