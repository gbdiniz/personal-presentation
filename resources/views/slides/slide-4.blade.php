<div class="flex justify-center h-dvh w-dvw bg-gray-950 p-6 text-neutral-100">
    <div class="relative flex w-full p-8 gap-16">

        {{-- LEFT: tag + heading --}}
        <div class="flex flex-col justify-between shrink-0 w-72">
            <p class="text-gray-500 jetbrains-mono text-xs">[ 04 / 04 — OBJETIVOS ]</p>

            <div class="flex flex-col gap-4">
                <span class="jetbrains-mono text-red-700 text-xs tracking-widest">// Para onde quero ir?</span>
                <h2 class="syne text-[clamp(2.8rem,4.5vw,4rem)] leading-[0.9] uppercase">
                    Desenvolvedor<br>
                    de <span class="text-red-700 syne">Software</span><br>
                </h2>
                <p class="jetbrains-mono text-gray-500 text-xs leading-relaxed max-w-xs">
                    Dentro de área de tecnologia, quero me profissionalizar na área Full-Stack de sistemas, desde o planejamento do projeto, até o deploy. Atualmente uso PHP, mas quero aprender outras linguagens.
                </p>
            </div>

            <span class="syne text-[8rem] leading-none text-gray-900 select-none pointer-events-none">04</span>
        </div>

        {{-- RIGHT: path / areas of interest --}}
        {{-- <div class="flex-1 flex flex-col justify-center gap-2">
            <span class="jetbrains-mono text-gray-700 text-xs tracking-widest mb-4">// Áreas de interesse</span>

            @php
            $areas = [
                ['num' => '→ 01', 'title' => 'Desenvolvimento Backend',    'detail' => 'APIs RESTful, microserviços, autenticação, filas'],
                ['num' => '→ 02', 'title' => 'Arquitetura de Software',     'detail' => 'Padrões de projeto, clean architecture, DDD'],
                ['num' => '→ 03', 'title' => 'Banco de Dados & Performance','detail' => 'Query optimization, índices, cache estratégico'],
                ['num' => '→ 04', 'title' => 'DevOps & Infraestrutura',     'detail' => 'CI/CD, Docker, deploy em cloud'],
            ];
            @endphp

            @foreach($areas as $i => $area)
            <div class="flex items-start gap-6 py-5 {{ $i < count($areas) - 1 ? 'border-b border-gray-900' : '' }}">
                <span class="jetbrains-mono text-red-700 text-xs shrink-0 w-10 mt-0.5">{{ $area['num'] }}</span>
                <div class="flex flex-col gap-1">
                    <p class="jetbrains-mono text-neutral-200 text-sm">{{ $area['title'] }}</p>
                    <p class="jetbrains-mono text-gray-600 text-xs">{{ $area['detail'] }}</p>
                </div>
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
