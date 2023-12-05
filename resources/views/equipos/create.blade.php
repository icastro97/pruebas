<x-app-layout>
    <div class="container mx-auto p-4 dark:bg-gray-800">
        <h1 class="text-2xl font-semibold mb-4 dark:text-white">Crear Nuevo Equipo de Cómputo</h1>

        @if($errors->any())
            <div class="bg-red-200 text-red-800 p-2 mb-4 rounded dark:bg-red-800 dark:text-red-200">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 mb-4 rounded dark:bg-green-800 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf

            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-white">Nombre del Equipo:</label>
                <input type="text" name="nombre" id="nombre" class="block w-full mt-1 p-2 border border-gray-300 rounded dark:bg-gray-700 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-white">Descripción del Equipo:</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="block w-full mt-1 p-2 border border-gray-300 rounded dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <div class="mb-4">
                <label for="imagenes" class="block text-sm font-medium text-gray-700 dark:text-white">Imágenes de Perspectiva:</label>
                <input type="file" name="imagenes[]" id="imagenes" multiple accept="image/*" class="block w-full mt-1 dark:bg-gray-700 dark:text-white">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:bg-blue-700">Crear Equipo</button>
        </form>
    </div>
</x-app-layout>
