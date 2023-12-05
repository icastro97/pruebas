<x-app-layout>

    <div class="container mx-auto p-4 dark:bg-gray-800">
        <h1 class="text-2xl font-semibold mb-4 dark:text-white">Asignar Teléfono</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 mb-4 rounded dark:bg-green-800 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('guardar-asignacion-telefono') }}" method="POST" class="mb-4">
            @csrf

            <div class="mb-4">
                <label for="telefono_id" class="block text-sm font-medium text-gray-700 dark:text-white">Selecciona un teléfono:</label>
                <select name="telefono_id" id="telefono_id" class="block w-full mt-1 p-2 border border-gray-300 rounded dark:bg-gray-700 dark:text-white">
                    <option value="" disabled selected>Selecciona un teléfono</option>
                    @foreach($telefonosDisponibles as $telefono)
                        <option value="{{ $telefono->id }}">{{ $telefono->numero }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="usuario_id" class="block text-sm font-medium text-gray-700 dark:text-white">Selecciona un usuario:</label>
                <select name="usuario_id" id="usuario_id" class="block w-full mt-1 p-2 border border-gray-300 rounded dark:bg-gray-700 dark:text-white">
                    <option value="" disabled selected>Selecciona un usuario</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:bg-blue-700">Asignar Teléfono</button>
        </form>
    </div>
</x-app-layout>
