<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 text-center">
            {{ __('Crear Nueva Rutina') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center">
        <div class="max-w-2xl w-full bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6">
            <form action="{{ route('rutinas.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="nombre" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required
                           class="mt-1 block w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-300">
                </div>

                <div>
                    <label for="descripcion" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required rows="4"
                              class="mt-1 block w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-300"></textarea>
                </div>

                <div>
                    <label for="fechaCreacion" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Fecha de Creación:</label>
                    <input type="date" id="fechaCreacion" name="fechaCreacion" required
                           class="mt-1 block w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200 focus:ring focus:ring-blue-300">
                </div>

                <div>
                    <label class="block text-lg font-medium text-gray-700 dark:text-gray-300">Ejercicios:</label>
                    <div id="ejercicios-container" class="space-y-4">
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition" onclick="agregarEjercicio()">+ Agregar Ejercicio</button>
                    </div>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('rutinas.index') }}"
                       class="px-6 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition text-lg">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-green-600 transition text-lg">
                        Guardar Rutina
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('fechaCreacion').valueAsDate = new Date();

        function agregarEjercicio() {
            let container = document.getElementById('ejercicios-container');
            let index = document.querySelectorAll('.ejercicio-group').length;

            let div = document.createElement('div');
            div.classList.add('ejercicio-group', 'mt-4', 'p-4', 'border', 'rounded-lg', 'bg-gray-200');
            div.innerHTML = `
                <label class="block text-base font-medium text-gray-700">Ejercicio:</label>
                <select name="ejercicios[${index}][id]" required class="mt-1 block w-full px-3 py-2 border rounded-lg">
                    @foreach ($ejercicios as $ejercicio)
                        <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                    @endforeach
                </select>

                <div class="grid grid-cols-3 gap-4 mt-3">
                    <div>
                        <label class="block text-base font-medium text-gray-700">Repeticiones:</label>
                        <input type="number" name="ejercicios[${index}][repeticiones]" required min="1"
                               class="mt-1 block w-full px-3 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-base font-medium text-gray-700">Series:</label>
                        <input type="number" name="ejercicios[${index}][series]" required min="1"
                               class="mt-1 block w-full px-3 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-base font-medium text-gray-700">Descansos (segundos):</label>
                        <input type="number" name="ejercicios[${index}][descansos]" required min="0"
                               class="mt-1 block w-full px-3 py-2 border rounded-lg">
                    </div>
                </div>

                <button type="button" class="mt-3 text-red-500 text-sm hover:underline" onclick="this.parentElement.remove()">Eliminar</button>
            `;
            container.appendChild(div);
        }
    </script>
</x-app-layout>
