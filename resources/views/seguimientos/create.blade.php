<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200">
            {{ __('Crear Nuevo Seguimiento') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center">
        <div class="max-w-2xl w-full bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <form action="{{ route('seguimientos.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label for="rutina_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Selecciona Rutina:
                    </label>
                    <select id="rutina_id" name="rutina_id" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-gray-200">
                        <option value="" disabled selected>Elige una rutina</option>
                        @foreach ($rutinas as $rutina)
                            <option value="{{ $rutina->id }}">{{ $rutina->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="peso" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Peso (kg):
                        </label>
                        <input type="number" step="0.01" id="peso" name="peso" required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-gray-200">
                    </div>

                    <div>
                        <label for="altura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Altura (cm):
                        </label>
                        <input type="number" step="0.01" id="altura" name="altura" required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-gray-200">
                    </div>
                </div>

                <div>
                    <label for="fecha" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Fecha:
                    </label>
                    <input type="datetime-local" id="fecha" name="fecha" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-gray-200">
                </div>

                <div>
                    <label for="progreso" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Progreso (%):
                    </label>
                    <input type="number" step="1" id="progreso" name="progreso" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-gray-200">
                </div>

                <div>
                    <label for="notas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Notas:
                    </label>
                    <textarea id="notas" name="notas" rows="4"
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:text-gray-200"></textarea>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('seguimientos.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-md shadow hover:bg-gray-600">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-md shadow hover:bg-green-600">
                        Guardar Seguimiento
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

