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
<h1 class="text-center">Validation</h1>
<hr>
<div class="row justify-content-center">
    <div class="col-md-6">
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
        <form action="{{ url('validate') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter Your name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="eamil" class="form-control" name="eamil" placeholder="Enter Your Eamil" value="{{ old('eamil') }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Your Password">
                @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="file">
                @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
