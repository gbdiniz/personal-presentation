<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intro</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=JetBrains+Mono:ital,wght@0,400;0,500;1,400&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex justify-center h-dvh w-dvw bg-neutral-950">
        <div class="flex flex-col w-full max-w-7xl p-12 text-green-500">
            <span>MICROSOFT WINDOWS [VERSION 6.1.7601]</span>
            <span>COPYRIGHT (C) 2009 MICROSOFT CORPORATION. ALL RIGHTS DESERVED.</span>
            <br>
            <span>C:\Users\GabrielDev><span id="command"></span></span>
        </div>
    </div>

    <script>
        setTimeout(() => {
            let command = document.querySelector("#command");

            let finalCommand = "start MyPresentation.pptx";

            for (let l = 0; l <= finalCommand.length; l++) {
                setTimeout(() => command.innerHTML = finalCommand.substring(0, l), 100 * l);
            }
        }, 500);
    </script>
</body>

</html>
