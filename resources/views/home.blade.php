<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apresentação</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,100..900;1,9..144,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

<body>
    <div class="flex justify-center h-dvh w-dvw bg-neutral-900 p-6 text-neutral-100">
        <div class="relative flex justify-between w-full p-8">
            <div class="flex flex-col justify-between">
                <p class="text-neutral-500">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel facilisis leo.
                    Phasellus eu velit
                    porta, dapibus nibh sit amet, convallis nibh. Fusce magna mi, consequat eget mollis quis, lobortis
                    ut augue. In cursus dictum lacus, a euismod sem congue non.
                </p>
                <div class="w-full flex flex-col justify-end gap-0">
                    <p class="font-light text-neutral-400">Olá, muito prazer!</p>
                    <h1 class="font-extrabold text-7xl uppercase">Meu nome é<br />Gabriel Diniz!</h1>
                    {{-- <p class="max-w-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel facilisis leo.
                    Phasellus eu velit
                    porta, dapibus nibh sit amet, convallis nibh. Fusce magna mi, consequat eget mollis quis, lobortis
                    ut augue. In cursus dictum lacus, a euismod sem congue non.
                </p>
                <a class="bg-blue-800 rounded-xl text-center w-fit px-5 py-2" href="">Saiba mais:</a> --}}
                </div>
            </div>

            {{-- Mano que fica no meio --}}
            <div class="w-full bg-neutral-700 rounded-xl flex justify-center">
                {{-- <img class="object-contain" src="{{ asset('assets/images/IMG_1185.jpg') }}" alt=""> --}}
            </div>

            <div class="w-full flex justify-center items-center">
                <ul class="flex flex-col gap-8">
                    <li class="border-2 rounded-xl size-32 flex justify-center items-center">Laravel</li>
                    <li class="border-2 rounded-xl size-32 flex justify-center items-center">PHP</li>
                    <li class="border-2 rounded-xl size-32 flex justify-center items-center">MySQL</li>
                    <li class="border-2 rounded-xl size-32 flex justify-center items-center">Tailwind</li>
                </ul>
            </div>

            <div class="absolute left-0 bottom-0">
                <div class="border-b-2 border-l-2 rounded-bl-sm border-neutral-300 size-10 opacity-50"></div>
            </div>

            <div class="absolute right-0 top-0">
                <div class="border-t-2 border-r-2 rounded-tr-sm border-neutral-300 size-10 opacity-50"></div>
            </div>
        </div>
    </div>
</body>

</html>
