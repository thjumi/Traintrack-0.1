<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200">
                {{ __('¡Bienvenido!') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="p-8">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Panel de Control</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                      
                        <!-- Botón Rutinas -->
                        <a href="{{ route('rutinas.index') }}" class="block text-center py-4 px-6 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold rounded-lg shadow transition duration-200">
                            <i class="fas fa-dumbbell fa-2x mb-3"></i>
                            <span>Rutinas</span>
                        </a>
                        <!-- Botón Ejercicios -->
                        <a href="{{ route('ejercicios.index') }}" class="block text-center py-4 px-6 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-semibold rounded-lg shadow transition duration-200">
                            <i class="fas fa-running fa-2x mb-3"></i>
                            <span>Ejercicios</span>
                        </a>
                        <!-- Botón Seguimientos -->
                        <a href="{{ route('seguimientos.index') }}" class="block text-center py-4 px-6 bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 text-white font-semibold rounded-lg shadow transition duration-200">
                            <i class="fas fa-chart-line fa-2x mb-3"></i>
                            <span>Seguimientos</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
