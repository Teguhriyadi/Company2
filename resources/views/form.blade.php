<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="{{ url('/fillable')  }}">
        {{ csrf_field() }}
        <input type="text" name="title">
        <input type="text" name="body">
        <input type="text" name="size">
        <input type="text" name="except">
        <input type="submit">
    </form>

</body>
</html>
