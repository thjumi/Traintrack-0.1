<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200">
            {{ __('Editar Rutina') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center">
        <div class="max-w-xl w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            <form action="{{ route('rutinas.update', $rutina->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nombre" class="block text-lg font-medium text-gray-700 dark:text-gray-300">
                        Nombre:
                    </label>
                    <input type="text" id="nombre" name="nombre" value="{{ $rutina->nombre }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200">
                </div>

                <div>
                    <label for="descripcion" class="block text-lg font-medium text-gray-700 dark:text-gray-300">
                        Descripción:
                    </label>
                    <textarea id="descripcion" name="descripcion" required rows="4"
                              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200">{{ $rutina->descripcion }}</textarea>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('rutinas.index') }}"
                       class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition">
                        Actualizar Rutina
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
