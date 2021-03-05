<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <br>
    <div class="col-lg-offset-4 col-lg-4">
        <center><h1>Upload File</h1></center>
        <form action="/store" enctype="multipart/form-data" method="post">
            @csrf
            <input type="file" name="image">
            <br>
            <input type="submit" value="Upload">
        </form>
    </div>
</body>
</html>