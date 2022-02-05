<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <h2 class="text-center">One to One</h2>
    <hr>


    <div class="container">
        <table class="table">
            {{-- <tr>
                <th>SL</th>
                <th>Name</th>
                <th>City</th>
                <th>Phone</th>
                <th>Zip Code</th>
            </tr> --}}

            {{-- @php
                dd($users)
            @endphp --}}
            {{-- @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ optional($user->profile)->city }}</td>
                    <td>{{ optional($user->profile)->phone}}</td>
                    <td>{{ optional($user->profile)->zip_code}}</td>
                    <td>{{ $user->profile->city ?? 'Default' }}</td>
                    <td>{{ $user->profile->phone ?? 'Default'}}</td>
                    <td>{{ $user->profile->zip_code ?? 'Default'}}</td>

                </tr>
            @endforeach --}}

            <tr>
                <th>SL</th>
                <th>City</th>
                <th>User</th>
            </tr>
            @foreach ($profiles as $profile)

            <tr>
                <th>{{ $profile->id }}</th>
                <th>{{ $profile->city }}</th>
                <th>{{ $profile->user }}</th>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
