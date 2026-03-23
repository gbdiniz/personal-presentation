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
        href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=JetBrains+Mono:ital,wght@0,400;0,500;1,400&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="wraper" class="relative overflow-hidden h-dvh">
        <div id="content" class="absolute flex">
            @include('slides.slide-1')
            @include('slides.slide-2')
            @include('slides.slide-3')
            @include('slides.slide-4')
        </div>

        <div id="screen" class="absolute flex w-dvw h-dvh"></div>

        <div id="cmd" class="absolute flex justify-center bg-neutral-900 w-dvw h-dvh p-12 text-green-500">
            <div class=" w-full max-w-7xl flex flex-col">
                <span>MICROSOFT WINDOWS [VERSION 6.1.7601]</span>
                <span>COPYRIGHT (C) 2009 MICROSOFT CORPORATION. ALL RIGHTS DESERVED.</span>
                <br>
                <span>C:\Users\GabrielDev><span id="command"></span></span>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.9.3/dist/dotlottie-wc.js" type="module"></script>

    <script>
        const cmd = document.querySelector("#cmd")
        let screen = document.querySelector("#screen");
        let divisions = 8;

        let finalCommand = "start MyPresentation.pptx";
        let timeOut = finalCommand.length * 100 + 500 + 500;

        setTimeout(() => {
            let command = document.querySelector("#command");

            for (let l = 0; l <= finalCommand.length; l++) {
                setTimeout(() =>
                    command.innerHTML = finalCommand.substring(0, l), 100 * l);
            }
        }, 500);

        setTimeout(() => {
            cmd.animate([{
                    opacity: 1
                },
                {
                    opacity: 0
                }
            ], {
                duration: 1000,
                easing: 'ease-in-out',
                iterations: 1,
                fill: 'forwards'
            })
        }, timeOut)

        setTimeout(() => {
            for (let l = 1; l <= divisions; l++) {
                const newD = document.createElement('div')
                const width = screen.offsetWidth / divisions;

                newD.id = `col-${l}`

                newD.style.width = `${width}px`;
                newD.style.height = '100%';
                newD.style.backgroundColor = '#d4d4d4';

                document.querySelector('#screen').appendChild(newD)
                // setTimeout(() => command.innerHTML = finalCommand.substring(0, l), 100 * l);
            }

            setTimeout(() => {
                for (let l = 1; l <= divisions; l++) {
                setTimeout(() => {
                    let col = document.querySelector(`#col-${l}`)

                    col.animate([{
                            transform: 'translateY(0px)'
                        },
                        {
                            transform: `translateY(${screen.offsetHeight}px)`
                        }
                    ], {
                        duration: 1000,
                        easing: 'ease-in-out',
                        iterations: 1,
                        fill: 'forwards'
                    })

                }, 150 * l);
                // col.style.transform = 'translateY(50px)';
            }
            }, 500)
        }, timeOut);
    </script>
</body>

</html>
