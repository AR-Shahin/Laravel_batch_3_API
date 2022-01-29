<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <h1 class="text-center">Database</h1>
    <hr>
    <div class="container mt-5">
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <input type="text" name="name" class="form-control"> <br>
            <input type="email" name="email" class="form-control"> <br>
            <input type="password" name="napasswordme" class="form-control"> <br>
            <button class="btn btn-success btn-block">Submit</button>
        </form>
    </div>

</body>
</html>
