<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased">
    <div class="max-w-4xl mx-auto mt-12 bg-white dark:bg-slate-800 shadow-2xl rounded-3xl overflow-hidden border border-gray-100 dark:border-slate-700">
    {{-- TODO. Encabezado --}}
    <div class="px-10 py-8 bg-slate-50 dark:bg-slate-900/50 border-b border-gray-100 dark:border-slate-700">
        <h2 class="text-2xl font-extrabold text-slate-800 dark:text-white tracking-tight">{{ $libro->titulo }}</h2>
        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Publicado por: {{ $libro->autor_id }}</p>
        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">{{ $libro->created_at }}</p>
        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Actualizacion: {{ $libro->updated_at }}</p>
    </div>
    @if (session('success'))
    <div x-data="{ show: true }" x-show="show"
        class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button" @click="show = false"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                aria-label="Close">
            <span class="sr-only">Cerrar</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif
    <form action="{{ route('libros.guardar') }}" method="POST" class="p-10">
        <input type="text" name="idLibro" id="idLibro" value="{{ $libro->id }}" hidden>
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
          
            <div class="space-y-2">
                <input type="text" name="comentador" id="comentador" placeholder="Nombre..."
                    class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none shadow-sm">
            </div>
            <br>
            <textarea name="comentario" id="comentario" placeholder="Agregar comentario..." rows="4" class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none shadow-sm"></textarea>
            <div class="md:col-span-2 pt-4">
                <hr class="border-gray-100 dark:border-slate-700">
            </div>
            <div class="md:col-span-2 flex items-center justify-end space-x-4">
                <a href="" class="px-6 py-3 text-sm font-bold text-slate-500 hover:text-slate-700 transition-colors">
                    Cancelar
                </a>
                <button type="submit"
                    class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none transform active:scale-95 transition-all">
                    Guardar libro
                </button>
            </div>
        </div>
        <br>
        <a href="{{ route('libros.listar_libros') }}" class="inline-flex items-center p-2 text-indigo-600 bg-indigo-50 rounded-xl hover:bg-indigo-600 hover:text-white transition-all duration-200 dark:bg-slate-700 dark:text-indigo-400 dark:hover:bg-indigo-500 dark:hover:text-white group"
            title="Regresar">Regresar
        </a>
    </form>
</div>
</body>
</html>