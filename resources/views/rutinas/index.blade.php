<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200">
                {{ __('Rutinas Disponibles') }}
            </h2>
            <a href="{{ route('rutinas.create') }}"
               class="inline-block bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white text-lg font-semibold px-6 py-3 rounded-lg shadow-md transition">
                + Crear Nueva Rutina
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl overflow-hidden">
                <div class="p-8">
                    @if ($rutinas->isEmpty())
                        <p class="text-center text-gray-500 text-white -200 text-lg font-semibold">
                            No hay rutinas disponibles. ¡Crea tu primera rutina ahora!
                        </p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300 rounded-lg shadow-md">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-lg">
                                        <th class="border border-gray-300 px-4 py-3">ID</th>
                                        <th class="border border-gray-300 px-4 py-3">Nombre</th>
                                        <th class="border border-gray-300 px-4 py-3">Descripción</th>
                                        <th class="border border-gray-300 px-4 py-3">Creado</th>
                                        <th class="border border-gray-300 px-4 py-3">Actualizado</th>
                                        <th class="border border-gray-300 px-4 py-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center text-gray-800 dark:text-gray-100">
                                    @foreach ($rutinas as $rutina)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                            <td class="border border-gray-300 px-4 py-3">{{ $rutina->id }}</td>
                                            <td class="border border-gray-300 px-4 py-3">{{ $rutina->nombre }}</td>
                                            <td class="border border-gray-300 px-4 py-3">{{ Str::limit($rutina->descripcion, 50) }}</td>
                                            <td class="border border-gray-300 px-4 py-3">{{ $rutina->created_at->format('d-m-Y H:i') }}</td>
                                            <td class="border border-gray-300 px-4 py-3">{{ $rutina->updated_at->format('d-m-Y H:i') }}</td>
                                            <td class="border border-gray-300 px-4 py-3 space-x-2">
                                                <a href="{{ route('rutinas.show', $rutina->id) }}"
                                                   class="px-3 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                                                    Ver
                                                </a>
                                                <a href="{{ route('rutinas.edit', $rutina->id) }}"
                                                   class="px-3 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-yellow-600 transition">
                                                    Editar
                                                </a>
                                                <form action="{{ route('rutinas.destroy', $rutina->id) }}" method="POST"
                                                      class="inline-block"
                                                      onsubmit="return confirmarEliminacion(event, '{{ $rutina->nombre }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="px-3 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-red-600 transition">
                                                        Eliminar
                                                    </button>
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

    <script>
        function confirmarEliminacion(event, nombre) {
            event.preventDefault();
            if (confirm(`¿Estás seguro de que deseas eliminar la rutina "${nombre}"?`)) {
                event.target.submit();
            }
        }
    </script>
</x-app-layout>

