<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Abc Page</h1>
{{-- <h4>{{ $custom_title }}</h4>
<h5>{{ $abc }}</h5>
@php
    var_dump($nums);
@endphp

@if (false)
    <h1>If Block</h1>
    {{-- @elseif (true)
    <h1>Else If Block</h1> --}}

    {{-- @else
    <h1>Else Block</h1>
@endif

@includeIf('inc.abc_inc')

@auth
    Auth
@endauth
@guest
<hr>
    Guest
@endguest --}}
@php
    $x = [10,20,30]
@endphp
<x-test></x-test> --}}
<x-alert.error title="This is Component Title" :nums="$x"/>


{{-- <x-alert.error title="Anisur Rahman"></x-alert.error> --}}

</body>
</html>
