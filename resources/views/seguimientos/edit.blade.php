<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200">
            {{ __('Editar Seguimiento') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center">
        <div class="max-w-4xl w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            <form action="{{ route('seguimientos.update', $seguimiento->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="rutina_id" class="block text-lg font-medium text-gray-700 dark:text-gray-300">ID Rutina</label>
                    <input type="text" id="rutina_id" name="rutina_id" value="{{ $seguimiento->rutina_id }}" required
                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                <div>
                    <label for="peso" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Peso (kg)</label>
                    <input type="number" step="0.01" id="peso" name="peso" value="{{ $seguimiento->peso }}" required
                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                <div>
                    <label for="altura" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Altura (cm)</label>
                    <input type="number" step="0.01" id="altura" name="altura" value="{{ $seguimiento->altura }}" required
                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                <div>
                    <label for="fecha" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Fecha</label>
                    <input type="datetime-local" id="fecha" name="fecha" value="{{ $seguimiento->fecha }}" required
                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                <div>
                    <label for="observacion" class="block text-lg font-medium text-gray-700 dark:text-gray-300">Observación</label>
                    <textarea id="observacion" name="observacion" rows="4"
                              class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">{{ $seguimiento->observacion }}</textarea>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('seguimientos.index') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition">
                        Cancelar
                    </a>
                    <button type="submit" class="px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition">
                        Actualizar Seguimiento
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
