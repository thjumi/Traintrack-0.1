<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200">
                {{ __('Seguimientos') }}
            </h2>
            <a href="{{ route('seguimientos.create') }}"
               class="inline-block bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white text-lg font-semibold px-6 py-3 rounded-lg shadow transition duration-200">
                Crear Nuevo Seguimiento
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
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Usuario</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Rutina</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Peso</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Altura</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Fecha</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Observación</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Creado en</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Actualizado en</th>
                                    <th class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-200">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seguimientos as $seguimiento)
                                    <tr class="text-center hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $seguimiento->id }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $seguimiento->usuario_id }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $seguimiento->rutina_id }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $seguimiento->peso }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $seguimiento->altura }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $seguimiento->fecha }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $seguimiento->observacion }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $seguimiento->created_at }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-gray-800 dark:text-gray-100">{{ $seguimiento->updated_at }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <a href="{{ route('seguimientos.show', $seguimiento->id) }}" class="text-blue-500 hover:underline mx-1">Ver</a>
                                            <a href="{{ route('seguimientos.edit', $seguimiento->id) }}" class="text-yellow-500 hover:underline mx-1">Editar</a>
                                            <form action="{{ route('seguimientos.destroy', $seguimiento->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este seguimiento?')">
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
