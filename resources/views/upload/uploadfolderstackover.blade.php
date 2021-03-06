<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/cmd/test" enctype="multipart/form-data" method="post">
        @csrf
        <input id="upload" name="content[]" type="file" value="Input" directory webkitdirectory>
        <input type="submit" value="submit">
    </form>
</body>

</html>