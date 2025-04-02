<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-bold text-2xl text-gray-800 dark:text-gray-200">
            {{ __('Editar Rutina') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center">
        <div class="max-w-lg w-full bg-white dark:bg-gray-800 shadow-md rounded-xl p-6">
            <form action="{{ route('rutinas.update', $rutina->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-base font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{ $rutina->nombre }}" required
                           class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
                           placeholder="Ingrese el nombre de la rutina">
                </div>

                <!-- Descripción -->
                <div>
                    <label for="descripcion" class="block text-base font-medium text-gray-700 dark:text-gray-300">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required rows="3"
                              class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200"
                              placeholder="Describe la rutina...">{{ $rutina->descripcion }}</textarea>
                </div>

                <!-- Lista de ejercicios asociados con opción de eliminación -->
                <div>
                    <label class="block text-lg font-bold text-gray-800 dark:text-gray-200">Ejercicios en la Rutina</label>
                    @foreach ($rutina->ejercicios as $ejercicio)
                        <div class="mb-4 p-4 bg-gray-200 dark:bg-gray-700 rounded-md shadow-sm relative">
                            <button type="button" onclick="eliminarEjercicio(this)" class="absolute top-2 right-2 bg-red-500 text-white text-xs px-2 py-1 rounded-md">X</button>
                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $ejercicio->nombre }}</p>
                            <input type="hidden" name="ejercicios[{{ $ejercicio->id }}][id]" value="{{ $ejercicio->id }}">
                            <div class="grid grid-cols-3 gap-4 mt-2">
                                <div>
                                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Repeticiones:</label>
                                    <input type="number" name="ejercicios[{{ $ejercicio->id }}][repeticiones]" value="{{ $ejercicio->pivot->repeticiones }}" required
                                           class="w-full p-2 border rounded-md dark:bg-gray-600 dark:text-gray-200"
                                           placeholder="Ej: 10">
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Series:</label>
                                    <input type="number" name="ejercicios[{{ $ejercicio->id }}][series]" value="{{ $ejercicio->pivot->series }}" required
                                           class="w-full p-2 border rounded-md dark:bg-gray-600 dark:text-gray-200"
                                           placeholder="Ej: 3">
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Descanso (seg):</label>
                                    <input type="number" name="ejercicios[{{ $ejercicio->id }}][descansos]" value="{{ $ejercicio->pivot->descansos }}" required
                                           class="w-full p-2 border rounded-md dark:bg-gray-600 dark:text-gray-200"
                                           placeholder="Ej: 30">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Seleccionar nuevos ejercicios -->
                <div>
                    <label class="block text-lg font-bold text-gray-800 dark:text-gray-200">Añadir nuevos ejercicios</label>
                    <select name="nuevos_ejercicios[]" multiple
                            class="mt-1 block w-full px-4 py-2 border rounded-md dark:bg-gray-700 dark:text-gray-200">
                        @foreach ($ejercicios as $ejercicio)
                            <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('rutinas.index') }}"
                       class="px-5 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition text-sm">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-5 py-2 bg-green-500 text-black rounded-lg shadow hover:bg-green-600 transition text-sm">
                        Actualizar Rutina
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function eliminarEjercicio(button) {
            let div = button.parentElement;
            div.remove();
        }
    </script>
</x-app-layout>

