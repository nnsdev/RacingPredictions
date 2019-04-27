<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Race Predictions</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet">
</head>
<body class="bg-black-alt font-sans leading-normal tracking-normal">

    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="mt-8 w-1/2 bg-black border-grey p-5 text-white text-center">
                <h3 class="mb-4">Login to Race Predictions</h3>
                <a href="/auth" class="bg-black-alt w-full py-2 px-8 text-white no-underline text-center hover:bg-grey-darkest">
                    Login with Discord
                </a><br>
                <div class="mt-12 text-xs">
                    <a href="/privacy" class="text-white">Privacy</a> &middot; Sponsored by <a href="https://craigsetupshop.co.uk" target="_blank" class="text-white">Craig's Setup Shop</a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>