</x-app-layout>
<div class="container mx-auto p-4 dark:bg-gray-800">
    <h1 class="text-2xl font-semibold mb-4 dark:text-white">Desasignar Teléfono</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded dark:bg-green-800 dark:text-green-200">
            {{ session('success') }}
        </div>
    @endif

    <p class="mb-4">Estás a punto de desasignar el teléfono con número: <strong>{{ $telefono->numero }}</strong> del usuario: <strong>{{ $telefono->usuario->name }}</strong>.</p>

    <form action="{{ route('desasignar-telefono', $telefono) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded dark:bg-red-700">Desasignar Teléfono</button>
    </form>
</div>
</x-app-layout>

