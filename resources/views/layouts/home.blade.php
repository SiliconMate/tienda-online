@props(['title']) 
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/utn.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">

    <!-- Core -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <title>{{ $title ?? 'Tienda Online'}}</title>
</head>

<body class="bg-white">

    <div class="grid grid-rows-[auto,1fr,auto] min-h-screen">
        <div class="">
            <x-home.header />
            <x-home.navbar />
        </div>
    
        <main>
            {{ $slot }}
        </main>
    
        <x-home.footer />
    </div>

</body>

</html>