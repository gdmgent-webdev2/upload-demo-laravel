<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Upload Demo</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto p-5">
        <h1 class="text-3xl font-bold underline mb-5">
        Upload Demo
        </h1>

        @if($errors->any())
            <div class="block bg-red-200 px-6 py-6 mb-5">
                <ul class="text-red-600 list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form enctype="multipart/form-data" method="post" action="{{ route('upload.store') }}">
            @csrf
            <input type="file" name="file" id="file">
            <button class="block bg-green-300 p-2 my-5" type="submit">Upload</button>
        </form>
    </div>


    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>