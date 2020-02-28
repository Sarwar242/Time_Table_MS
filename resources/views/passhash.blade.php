<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PASSWORD_EnCRYPT</title>
</head>
<body>
    <div>
    <form  action="{{ route('test') }}" method="post">
    @csrf
        <input type="text" name="pass" placeholder="Password..">
        <input type="submit" value="submit">
    </form> 
    </div>

    <div>
        <h1>Password: {{ $pass ?? '' }}</h1>
    </div>

</body>
</html>