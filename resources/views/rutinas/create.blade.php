<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200">
            {{ __('Crear Nueva Rutina') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center">
        <div class="max-w-xl w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            <form action="{{ route('rutinas.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="nombre" class="block text-lg font-medium text-gray-700 dark:text-gray-300">
                        Nombre:
                    </label>
                    <input type="text" id="nombre" name="nombre" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-gray-200"
                           placeholder="Nombre de la rutina">
                </div>

                <div>
                    <label for="descripcion" class="block text-lg font-medium text-gray-700 dark:text-gray-300">
                        Descripción:
                    </label>
                    <textarea id="descripcion" name="descripcion" required rows="4"
                              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-gray-200"
                              placeholder="Describe los objetivos y detalles de la rutina"></textarea>
                </div>

                <div>
                    <label for="fechaCreacion" class="block text-lg font-medium text-gray-700 dark:text-gray-300">
                        Fecha de Creación:
                    </label>
                    <input type="date" id="fechaCreacion" name="fechaCreacion" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-gray-200">
                </div>

                <div>
                    <label for="ejercicios" class="block text-lg font-medium text-gray-700 dark:text-gray-300">
                        Selecciona Ejercicios:
                    </label>
                    <select id="ejercicios" name="ejercicios[]" multiple required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-gray-200">
                        @foreach ($ejercicios as $ejercicio)
                            <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('rutinas.index') }}"
                       class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition">
                        Guardar Rutina
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
