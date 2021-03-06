<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form action="{{route('upload.file')}}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="file" name="file">
                <input type="submit">
            </form>
        </div>
        <div class="row">
            <h2>Show File</h2>
            <img src="" alt="">
        </div>
    </div>

    <div class="container"> Muti upload
        <div class="row">
            <form action="{{route('upload.muti')}}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="file" name="file[]" multiple>
                <input type="submit">
            </form>
        </div>
        <div class="row">
            <h2>Show File</h2>
            <img src="" alt="">
        </div>
    </div>
</body>

</html>