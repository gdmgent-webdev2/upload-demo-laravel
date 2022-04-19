<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Demo</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-bold underline mb-5">
        Upload Demo
        </h1>

        <form method="post" action="{{ route('upload.store') }}">
            <input type="file" name="file" id="file">
            <button class="block bg-green-300 p-2 my-5" type="submit">Upload</button>
        </form>
    </div>


    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>