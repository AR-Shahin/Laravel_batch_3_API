<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>

    <h1 class="text-center">Database</h1>
    <hr>
    <div class="container mt-5 row ">
<div class="col-md-6">
    <table>
        <tr>SL</tr>
        <tr>Name</tr>
        @foreach ($users as $user)
            <tr>
                {{-- <th>{{ $loop->index + 1 }}</th> --}}
                <th>{{ $user->id }}</th>
                <th>{{ $user->name }}</th>
            </tr>
        @endforeach
        {{ $users->links() }}
    </table>
</div>
    </div>

</body>
</html>
