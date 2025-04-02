<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-bold text-2xl text-gray-800 dark:text-gray-200">
            {{ __('Detalles de la Rutina') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center">
        <div class="max-w-lg w-full bg-white dark:bg-gray-800 shadow-md rounded-xl p-6">
            <div class="space-y-3 text-base text-gray-700 dark:text-gray-300">
                <p><strong>ID:</strong> {{ $rutina->id }}</p>
                <p><strong>Nombre:</strong> {{ $rutina->nombre }}</p>
                <p><strong>Descripción:</strong> {{ $rutina->descripcion }}</p>
                <p><strong>Fecha de Creación:</strong> {{ $rutina->created_at->format('d-m-Y H:i') }}</p>
                <p><strong>Última Actualización:</strong> {{ $rutina->updated_at->format('d-m-Y H:i') }}</p>
            </div>

            <!-- Lista de ejercicios -->
            <div class="mt-4">
                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">Ejercicios</h3>
                @if($rutina->ejercicios->count() > 0)
                    <ul class="mt-2 space-y-2">
                        @foreach($rutina->ejercicios as $ejercicio)
                            <li class="p-3 bg-gray-200 dark:bg-gray-700 rounded-md shadow-sm">
                                <p><strong>Ejercicio:</strong> {{ $ejercicio->nombre }}</p>
                                <p><strong>Repeticiones:</strong> {{ $ejercicio->pivot->repeticiones }}</p>
                                <p><strong>Series:</strong> {{ $ejercicio->pivot->series }}</p>
                                <p><strong>Descanso:</strong> {{ $ejercicio->pivot->descansos }} segundos</p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="mt-2 text-gray-500 dark:text-gray-400">No hay ejercicios asignados.</p>
                @endif
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('rutinas.index') }}" class="px-5 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition text-sm">
                    Volver
                </a>
                <a href="{{ route('rutinas.edit', $rutina->id) }}" class="px-5 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-blue-600 transition text-sm">
                    Editar
                </a>
                <form action="{{ route('rutinas.destroy', $rutina->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar esta rutina?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-5 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-red-600 transition text-sm">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
