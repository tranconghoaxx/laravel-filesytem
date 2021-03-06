<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload folder</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>

</head>

<body>
    <p>Select The Folder:
    <form action="{{route('upload.folder')}}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="file" name="file" webkitdirectory mozdirectory />
        <input type="submit">
    </form>
    <label for="">Upload Folder</label>
    <input type="file" id="filepicker" name="fileF" webkitdirectory mozdirectory />
    <ul id="listing"></ul>
    </p>
    <p>You can select any directory with multiple files or multiple child directories in it.</p>
    <script>
        // var inps = document.getElementById('input');
        // [].forEach.call(inps, function(inp) {
        //     inp.onchange = function(e) {
        //         console.log(this.files);
        //     };
        // });
        function getMessage() {
            $.ajax({
                type: 'POST',
                url: '/getmsg',
                data: '_token = <?php echo csrf_token() ?>',
                success: function(data) {
                    $("#msg").html(data.msg);
                }
            });
        }

        document.getElementById("filepicker").addEventListener("change", function(event) {
            let output = document.getElementById("listing");
            let files = event.target.files;

            for (let i = 0; i < files.length; i++) {
                let item = document.createElement("li");
                item.innerHTML = files[i].webkitRelativePath;
                output.appendChild(item);

                console.log(files[i]);
            };
        }, false);
    </script>
</body>

</html>