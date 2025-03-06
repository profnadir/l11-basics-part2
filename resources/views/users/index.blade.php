<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    @include("shared.notification",["var"=>"test"])



    {{-- @if (Auth::check())
        <p>connected</p>
    @endif --}}

    @auth()
        <p>connected</p>
    @endauth

    {{-- @unless (Auth::check())
        <p>not connected</p>
    @endunless --}}

    @guest
        <p>not connected</p>
    @endguest

    <?php
    //echo htmlspecialchars("<script>alert('hacked')</script>");
    ?>
    {{-- {{ $groupe }} --}}
    {{--  {!! $groupe !!} --}}

    {{-- @if (count($users) == 1)
        <p>il ya un utilisateur</p>
    @elseif(count($users) > 1)
        <p>il ya plusieurs utlisateurs</p>
    @else
        <p>il n'ya aucun utilisateur</p>
    @endif --}}

    {{-- (1) --}}
    @if (count($users) > 0)
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    @else
        <p>aucun utilisateurs</p>
    @endif

    {{-- (1) == (2) --}}

    {{-- (2) --}}
    @forelse ($users as $user)
        <li>{{ $user->name }}</li>
    @empty
        <p>Aucun utilisateur</p>
    @endforelse

    @php
        $isActive = false;
        $hasError = true;
    @endphp

    <span @class([
        'p-4',
        'font-bold' => $isActive,
        'text-gray-500' => !$isActive,
        'bg-red' => $hasError,
    ])></span>

    <span class="p-4 text-gray-500 bg-red"></span>


    @php
        $isActive = false;
    @endphp
    <span @style([
        'background-color: red', 
        'font-weight: bold' => $isActive
        ])>
    </span>

    <span style="background-color: red;"></span>


</body>

</html>
