<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Cancelled</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
<div class="min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl w-full bg-white rounded-xl shadow-md overflow-hidden p-8">
        <div class="text-center">
            <div class="flex justify-center mb-6">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-red-100">
                    <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-4">Payment Cancelled</h1>

            <p class="text-lg text-gray-600 mb-8">
                {{ auth()->user()->name }}, your payment was cancelled. No charges were made to your account.
            </p>

            <div class="bg-yellow-50 p-4 rounded-lg mb-8">
                <p class="text-yellow-800 mb-2">You'll be redirected to the dashboard in <span id="countdown" class="font-bold">10</span> seconds</p>
                <div class="w-full bg-yellow-200 rounded-full h-2.5">
                    <div id="progress-bar" class="bg-yellow-500 h-2.5 rounded-full transition-all duration-1000 ease-linear"></div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('filament.admin.pages.dashboard') }}"
                   class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Return to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let timeLeft = 10;
        const countdownElement = document.getElementById('countdown');
        const progressBar = document.getElementById('progress-bar');

        const timer = setInterval(function () {
            timeLeft--;
            countdownElement.textContent = timeLeft;
            progressBar.style.width = (timeLeft * 10) + '%';

            if (timeLeft <= 0) {
                clearInterval(timer);
                window.location.href = "{{ route('filament.admin.pages.dashboard') }}";
            }
        }, 1000);
    });
</script>
</body>
</html>
