<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200">
                {{ __('Ejercicios Disponibles') }}
            </h2>
            <a href="{{ route('ejercicios.create') }}"
               class="inline-block bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white text-lg font-semibold px-6 py-3 rounded-lg shadow transition duration-200">
                Crear Nuevo Ejercicio
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="p-8">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700">
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">ID</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Nombre</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Descripción</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Grupo Muscular</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Dificultad</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ejercicios as $ejercicio)
                                    <tr class="text-center hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $ejercicio->id }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $ejercicio->nombre }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $ejercicio->descripcion }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $ejercicio->grupoMuscular }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $ejercicio->dificultad }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <a href="{{ route('ejercicios.show', $ejercicio->id) }}" class="text-white-500 text-white hover:underline mx-1">Ver</a>
                                            <a href="{{ route('ejercicios.edit', $ejercicio->id) }}" class="text-white hover:underline mx-1">Editar</a>
                                            <form action="{{ route('ejercicios.destroy', $ejercicio->id) }}" method="POST" class="inline-block text-white" onsubmit="return confirm('¿Estás seguro de eliminar este ejercicio?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline mx-1">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
