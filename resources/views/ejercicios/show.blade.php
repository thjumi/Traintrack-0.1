<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalles del Ejercicio
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <p class="text-lg"><strong>ID:</strong> {{ $ejercicio->id }}</p>
                    <p class="text-lg"><strong>Nombre:</strong> {{ $ejercicio->nombre }}</p>
                    <p class="text-lg"><strong>Descripción:</strong> {{ $ejercicio->descripcion }}</p>
                    <p class="text-lg"><strong>Grupo Muscular:</strong> {{ $ejercicio->grupoMuscular }}</p>
                    <p class="text-lg"><strong>Dificultad:</strong> {{ $ejercicio->dificultad }}</p>
                </div>

                <div class="flex space-x-2">
                    <a href="{{ route('ejercicios.edit', $ejercicio->id) }}" class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-md hover:bg-yellow-600 transition">Editar</a>
                    
                    <form action="{{ route('ejercicios.destroy', $ejercicio->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este ejercicio?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md shadow-md hover:bg-red-700 transition">Eliminar</button>
                    </form>

                    <a href="{{ route('ejercicios.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-md hover:bg-gray-600 transition">Volver al Listado</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
