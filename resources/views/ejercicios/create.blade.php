<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Nuevo Ejercicio
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('ejercicios.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="nombre" class="block font-medium text-gray-700">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 p-2">
                    </div>

                    <div>
                        <label for="descripcion" class="block font-medium text-gray-700">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 p-2"></textarea>
                    </div>

                    <div>
                    <label for="descripcion" class="block font-medium text-gray-700">Fecha:</label>
                    <input type="datetime-local" id="fecha" name="fecha" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 p-2"></textarea>                    </div>

                    <div>
                        <label for="grupoMuscular" class="block font-medium text-gray-700">Grupo Muscular:</label>
                        <textarea id="grupoMuscular" name="grupoMuscular" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 p-2"></textarea>
                    </div>

                    <div>
                        <label for="dificultad" class="block font-medium text-gray-700">Dificultad:</label>
                        <input type="number" id="dificultad" name="dificultad" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 p-2">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-black rounded-md shadow-md hover:bg-blue-700 transition">Guardar
                            Ejercicio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
