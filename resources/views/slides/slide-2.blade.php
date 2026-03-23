<div class="flex justify-center h-dvh w-dvw bg-gray-950 p-6 text-neutral-100">
    <div class="relative flex w-full p-8 gap-16">

        {{-- LEFT: tag + slide number bg --}}
        <div class="flex flex-col justify-between shrink-0 w-48">
            <p class="text-gray-500 jetbrains-mono text-xs">[ 02 / 04 — MOTIVAÇÃO ]</p>
            <span class="syne text-[12rem] leading-none text-gray-900 select-none pointer-events-none self-start">02</span>
        </div>

        {{-- CENTER: main content --}}
        <div class="flex-1 flex flex-col justify-center gap-8">
            <span class="jetbrains-mono text-red-700 text-xs tracking-widest">// Por que escolhi TI?</span>

            <h2 class="syne text-[clamp(2.8rem,5vw,4.5rem)] leading-[0.9] uppercase">
                Sempre gostei<br>
                <span class="text-red-700 syne">de tecnologia</span><br>
            </h2>

            <div class="flex flex-col gap-4 max-w-lg">
                <p class="jetbrains-mono text-gray-400 text-sm leading-relaxed">
                    Sempre gostei do mundo da internet. Comecei com a criação de jogos e após, os meus primeiros sites. Depois de um tempo, vi que a programação é a área que eu mais gosto.
                </p>
                {{-- <p class="jetbrains-mono text-gray-600 text-xs leading-relaxed">
                    Quando vi meu primeiro código funcionar, percebi que era possível criar do zero. Isso foi suficiente.
                </p> --}}
            </div>
        </div>

        {{-- RIGHT: keywords --}}
        {{-- <div class="flex flex-col justify-center gap-6 shrink-0 items-end">
            @foreach(['Curiosidade', 'Construção', 'Lógica', 'Criatividade'] as $word)
            <div class="flex items-center gap-2">
                <span class="w-1 h-1 rounded-full bg-red-700 shrink-0"></span>
                <span class="jetbrains-mono text-xs text-gray-600 tracking-wider">{{ $word }}</span>
            </div>
            @endforeach
        </div> --}}

        <div class="absolute left-0 bottom-0">
            <div class="border-b-2 border-l-2 rounded-bl-sm border-gray-300 size-10 opacity-50"></div>
        </div>
        <div class="absolute right-0 top-0">
            <div class="border-t-2 border-r-2 rounded-tr-sm border-gray-300 size-10 opacity-50"></div>
        </div>
    </div>
</div>
