<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Youless') }}</title>

        <!-- Tailwind CSS only for demo purposes. Please install Tailwind with npm to your Laravel site -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    </head>

    <body onclick="location.href='{{ url()->previous() }}';">
        <div id="app">
            <div class="grid grid-rows-5 grid-flow-col gap-4 justify-center h-screen bg-gray-400">
                <div>
                    <h1 class="text-2xl uppercase tracking-wide tabular-nums text-center">Energy Details</h1>
                </div>
                
                <div>
                    <span class="block self-center font-bold text-5xl tracking-wide leading-none text-center">{{ $youlessData[0]['power'] }} Watt</span>
                    <span class="block self-center text-sm text-center">Actual energy consumption</span>
                </div>
                <div>
                    <table class="table-auto  bg-blue-200 text-1xl text-right">
                        <thead>
                            <tr class="text-center">
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2">Low</th>
                                <th class="px-4 py-2">High</th>
                                <th class="px-4 py-2">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">Consumption</td>
                                <td class="border px-4 py-2">{{ $youlessData[0]['cons_low'] }} KWh</td>
                                <td class="border px-4 py-2">{{ $youlessData[0]['cons_high'] }} KWh</td>
                                <td class="border px-4 py-2">{{ $youlessData[0]['cons_low'] + $youlessData[0]['cons_high'] }} KWh</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">Production</td>
                                <td class="border px-4 py-2">{{ $youlessData[0]['prod_low'] }} KWh</td>
                                <td class="border px-4 py-2">{{ $youlessData[0]['prod_high'] }} KWh</td>
                                <td class="border px-4 py-2">{{ $youlessData[0]['prod_low'] + $youlessData[0]['prod_high'] }} KWh</td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="border px-4 py-2">Totals</td>
                                <td class="border px-4 py-2">{{ $youlessData[0]['cons_low'] - $youlessData[0]['prod_low'] }} KWh</td>
                                <td class="border px-4 py-2">{{ $youlessData[0]['cons_high'] - $youlessData[0]['prod_high'] }} KWh</td>
                                <td class="border px-4 py-2 bg-red-300 font-bold">{{ $youlessData[0]['netto'] }} KWh</td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="border px-4 py-2">Gas</td>
                                <td class="border px-4 py-2"></td>
                                <td class="border px-4 py-2"></td>
                                <td class="border px-4 py-2 bg-red-300 font-bold">{{ $youlessData[0]['gas'] }} m3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        setTimeout(function(){history.back();}, 60000);
    </script>
</html>




    
    