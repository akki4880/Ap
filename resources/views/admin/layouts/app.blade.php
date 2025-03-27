<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AR') }}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Vite for Vue.js components -->
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Assuming you have this set up correctly --}}

    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <!--Replace with your tailwind.css once created-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

@if(session('success'))

<!--Toast-->
<div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    <input type="checkbox" class="hidden" id="footertoast">

    <label
        class="close cursor-pointer flex items-start justify-between w-full p-2 bg-green-500 h-10 rounded shadow-lg text-white"
        title="close" for="footertoast">
        {{ session('success') }}

        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
            viewBox="0 0 18 18">
            <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
            </path>
        </svg>
    </label>
</div>

<script>
// Function to hide the toast with animation
function hideToastWithAnimation() {
    var toast = document.querySelector('.alert-toast');
    if (toast) {
        toast.classList.add('hide-toast-animation');
        setTimeout(function() {
            toast.style.display = 'none';
        }, 500); // Set a timeout to remove the element after the animation completes
    }
}

// Call the hideToastWithAnimation function after 10 seconds (10000 milliseconds)
setTimeout(hideToastWithAnimation, 10000);
</script>


@endif

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('admin.layouts.navigation')

        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="">
            {{ $slot }}
        </main>
    </div>
</body>

</html>