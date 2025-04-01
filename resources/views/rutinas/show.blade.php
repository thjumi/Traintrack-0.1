<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200">
            {{ __('Detalles de la Rutina') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center">
        <div class="max-w-4xl w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            <div class="space-y-4 text-lg text-gray-700 dark:text-gray-300">
                <p><strong>ID:</strong> {{ $rutina->id }}</p>
                <p><strong>Nombre:</strong> {{ $rutina->nombre }}</p>
                <p><strong>Descripción:</strong> {{ $rutina->descripcion }}</p>
                <p><strong>Creado en:</strong> {{ $rutina->created_at }}</p>
                <p><strong>Actualizado en:</strong> {{ $rutina->updated_at }}</p>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('rutinas.index') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition">
                    Volver al Listado
                </a>
                <a href="{{ route('rutinas.edit', $rutina->id) }}" class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                    Editar
                </a>
                <form action="{{ route('rutinas.destroy', $rutina->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta rutina?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-3 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
