<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200">
                {{ __('Rutinas Disponibles') }}
            </h2>
            <a href="{{ route('rutinas.create') }}"
               class="inline-block bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white text-lg font-semibold px-6 py-3 rounded-lg shadow transition duration-200">
                Crear Nueva Rutina
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="p-8">
                    @if ($rutinas->isEmpty())
                        <p class="text-center text-gray-800 dark:text-gray-200">No hay rutinas disponibles. ¡Crea tu primera rutina ahora!</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-gray-700">
                                        <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">ID</th>
                                        <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Nombre</th>
                                        <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Descripción</th>
                                        <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Creado en</th>
                                        <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Actualizado en</th>
                                        <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rutinas as $rutina)
                                        <tr class="text-center hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $rutina->id }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $rutina->nombre }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $rutina->descripcion }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $rutina->created_at->format('d-m-Y H:i') }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $rutina->updated_at->format('d-m-Y H:i') }}</td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                <a href="{{ route('rutinas.show', $rutina->id) }}" class="text-blue-500 hover:underline mx-1">Ver</a>
                                                <a href="{{ route('rutinas.edit', $rutina->id) }}" class="text-yellow-500 hover:underline mx-1">Editar</a>
                                                <form action="{{ route('rutinas.destroy', $rutina->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta rutina?')">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
