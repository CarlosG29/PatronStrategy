<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Tarifa</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-md w-full">
        <h1 class="text-2xl font-bold mb-4 text-center">Calcular Tarifa</h1>
        
        <!-- Información de las tarifas -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Tarifas Disponibles:</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li><strong>Tarifa Fija:</strong> $50.00 (Tarifa estándar fija para cualquier viaje)</li>
                <li><strong>Tarifa por Distancia:</strong> $2.00 por kilómetro (Costo basado en la distancia del viaje)</li>
                <li><strong>Tarifa por Tiempo:</strong> $1.50 por minuto (Costo basado en la duración del viaje)</li>
            </ul>
        </div>

        <!-- Formulario para calcular la tarifa -->
        <form id="tarifaForm" action="{{ route('calcular.tarifa') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="strategy" class="block text-gray-700 text-sm font-bold mb-2">Selecciona el método de cálculo de tarifa:</label>
                <select name="strategy" id="strategy" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="fija">Tarifa Fija</option>
                    <option value="distancia">Tarifa por Distancia</option>
                    <option value="tiempo">Tarifa por Tiempo</option>
                </select>
            </div>

            <div id="inputFields" class="mb-4">
                <!-- Campos de entrada según la selección del usuario -->
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Calcular</button>
        </form>

        @if (isset($resultado))
            <h2 class="text-xl font-semibold text-center mt-4">Resultado $$$: {{ $resultado }}</h2>
        @endif
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('strategy').addEventListener('change', function () {
            const strategy = this.value;
            const inputFields = document.getElementById('inputFields');
            inputFields.innerHTML = ''; // Limpiar campos

            if (strategy === 'distancia') {
                inputFields.innerHTML += `
                    <label for="distancia" class="block text-gray-700 text-sm font-bold mb-2">Distancia (km):</label>
                    <input type="number" name="distancia" step="0.01" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
                `;
            } else if (strategy === 'tiempo') {
                inputFields.innerHTML += `
                    <label for="tiempo" class="block text-gray-700 text-sm font-bold mb-2">Tiempo (min):</label>
                    <input type="number" name="tiempo" step="0.01" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
                `;
            }
        });
    </script>
</body>
</html>
