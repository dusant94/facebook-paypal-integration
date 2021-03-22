<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h5>To change password click on this link: <a href="{{ route('reset.password', [$user->id, $code]) }}" target="__blank">CLICK HERE</a></h5>

</body>
</html>
