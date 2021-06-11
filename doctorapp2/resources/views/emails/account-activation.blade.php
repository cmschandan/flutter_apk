<!DOCTYPE html>
<html>
<head>
    <title>Verify Email ID</title>
</head>

<body>
<h2>Welcome to the site {{ $emailParams->usersName }}</h2>
<br/>
Your registered email-id is {{ $emailParams->usersEmail }} , Please click on the below link to verify your email account
<br/>
<button type="button"><a href="{{url('user/activation', $emailParams->link)}}">Verify Email</a></button>
</body>

</html>