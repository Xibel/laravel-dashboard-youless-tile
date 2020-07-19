<x-dashboard-tile
    :position="$position"
    :refresh-interval="$refreshIntervalInSeconds"
>
    <div
            class="grid gap-2 justify-items-center h-full text-center"
            style="grid-template-rows: auto 1fr auto;"
    >

        <h1 class="font-medium text-dimmed text-sm uppercase tracking-wide tabular-nums">Energy usage</h1>

        <div class="self-center font-bold text-4xl tracking-wide leading-none"><a href="/youless" class="no-underline ...">{{ $youlessData[0]['power'] }} W</a></div>

        {{-- optional information to show:
         <div class="flex w-full justify-center space-x-4 items-center">
            <span>Energy consumption: {{ $youlessData[0]['netto'] }} KWh</span>
            <span>Gas consumption: {{ $youlessData[0]['gas'] }} m3</span>
        </div>
         --}}
    </div>
</x-dashboard-tile>