<div class="flex justify-center h-dvh w-dvw bg-gray-950 p-6 text-neutral-100">
    <div class="relative flex flex-col w-full p-8 gap-10">

        {{-- TOP: tag + title --}}
        <div class="flex items-baseline justify-between">
            <p class="text-gray-500 jetbrains-mono text-xs">[ 03 / 04 — COMPETÊNCIAS ]</p>
            <span class="syne text-[5rem] leading-none text-gray-900 select-none pointer-events-none">03</span>
        </div>

        {{-- MAIN: heading + grid --}}
        <div class="flex gap-16 items-start">

            {{-- Heading column --}}
            <div class="flex flex-col gap-4 shrink-0">
                <span class="jetbrains-mono text-red-700 text-xs tracking-widest">// Principais competências</span>
                <h2 class="syne text-[clamp(2rem,3.5vw,3rem)] leading-[0.9] uppercase">
                    Minhas<br>
                    <span class="text-red-700 syne">competências</span><br>
                </h2>
            </div>

            {{-- Competencies grid --}}
            <div class="grid grid-cols-1 gap-x-12 gap-y-6 items-start pt-1">
                @php
                    $competencias = [
                        [
                            'label' => '01',
                            'title' => 'Raciocínio Lógico',
                            'desc' => 'Decompor problemas complexos em partes tratáveis e encadeáveis.',
                        ],
                        [
                            'label' => '02',
                            'title' => 'Backend Development',
                            'desc' => 'Construção de APIs, sistemas e lógica de aplicações com Laravel e PHP.',
                        ],
                        [
                            'label' => '03',
                            'title' => 'Modelagem de Dados',
                            'desc' => 'Estruturar bancos relacionais com MySQL.',
                        ],
                        [
                            'label' => '04',
                            'title' => 'Coordenação em equipe',
                            'desc' => 'Coordenei equipes para realização de projetos.',
                        ],
                    ];
                @endphp

                @foreach ($competencias as $item)
                    <div class="flex flex-col gap-1 border-l border-gray-800 pl-4">
                        <span
                            class="jetbrains-mono text-red-700 text-[0.6rem] tracking-widest">{{ $item['label'] }}</span>
                        <p class="jetbrains-mono text-neutral-200 text-xs font-medium">{{ $item['title'] }}</p>
                        <p class="jetbrains-mono text-gray-600 text-[0.65rem] leading-relaxed">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="absolute left-0 bottom-0">
            <div class="border-b-2 border-l-2 rounded-bl-sm border-gray-300 size-10 opacity-50"></div>
        </div>
        <div class="absolute right-0 top-0">
            <div class="border-t-2 border-r-2 rounded-tr-sm border-gray-300 size-10 opacity-50"></div>
        </div>
    </div>
</div>
