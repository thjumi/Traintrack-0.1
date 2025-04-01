<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200">
            {{ __('Detalles del Seguimiento') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center">
        <div class="max-w-4xl w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            <div class="grid grid-cols-2 gap-4 text-lg text-gray-700 dark:text-gray-300">
                <p><strong>ID:</strong> {{ $seguimiento->id }}</p>
                <p><strong>ID Usuario:</strong> {{ $seguimiento->usuario_id }}</p>
                <p><strong>ID Rutina:</strong> {{ $seguimiento->rutina_id }}</p>
                <p><strong>Peso:</strong> {{ $seguimiento->peso }} kg</p>
                <p><strong>Altura:</strong> {{ $seguimiento->altura }} cm</p>
                <p><strong>Fecha:</strong> {{ $seguimiento->fecha }}</p>
                <p class="col-span-2"><strong>Observación:</strong> {{ $seguimiento->observacion }}</p>
                <p><strong>Creado en:</strong> {{ $seguimiento->created_at }}</p>
                <p><strong>Actualizado en:</strong> {{ $seguimiento->updated_at }}</p>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('seguimientos.index') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition">
                    Volver al Listado
                </a>
                <a href="{{ route('seguimientos.edit', $seguimiento->id) }}" class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                    Editar
                </a>
                <form action="{{ route('seguimientos.destroy', $seguimiento->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-3 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar este seguimiento?')">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
