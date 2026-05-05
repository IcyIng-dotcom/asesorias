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
    <!-- Encabezado -->
    <div class="px-10 py-8 bg-slate-50 dark:bg-slate-900/50 border-b border-gray-100 dark:border-slate-700">
        <h2 class="text-2xl font-extrabold text-slate-800 dark:text-white tracking-tight">Crear Libros</h2>
        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Completa los campos para dar de alta un nuevo libro.</p>
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
    @if (session('error'))
        <div x-data="{ show: true }" x-show="show" 
            class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" 
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session('error') }}
            </div>
            <button type="button" @click="show = false" 
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" 
                    aria-label="Close">
                <span class="sr-only">Cerrar</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
    {{-- @dd(session()->all()) --}}
    {{-- session('mi_variable_sesion') --}}

    <form action="{{ route('libros.guardar') }}" method="POST" class="p-10" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
            
            <div class="space-y-2">
                <label for="titulo" class="block text-sm font-bold text-slate-700 dark:text-slate-300">Titulo</label>
                <input type="text" name="titulo" id="titulo" placeholder="Ej. Tumba de las luciernagas" 
                    class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none shadow-sm">
            </div>

           
            <div class="space-y-2">
                <label for="autor_id" class="block text-sm font-bold text-slate-700 dark:text-slate-300">Autor</label>
                <select name="autor_id" id="autor_id">
                     @foreach ($autores as $autor_id)
                      <option value= "{{ $autor_id->id }}">{{ $autor_id->nombre }}</option>
                    @endforeach
                </select>
            </div>


            <div class="space-y-2">
                <label for="isbn" class="block text-sm font-bold text-slate-700 dark:text-slate-300">Isbn</label>
                <input type="text" name="isbn" id="isbn" placeholder="Ej. 523461" 
                    class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none shadow-sm">
            </div>

            <div class="space-y-2">
                <label for="editorial" class="block text-sm font-bold text-slate-700 dark:text-slate-300">Editorial</label>
                <input type="text" name="editorial" id="editorial" placeholder="Ej. Almadía" 
                    class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none shadow-sm">
            </div>

            <div class="space-y-2">
                <label for="sinopsis" class="block text-sm font-bold text-slate-700 dark:text-slate-300">Sinopsis</label>
                <input type="text" name="sinopsis" id="sinopsis" placeholder="Escriba la sinopsis del libro" 
                    class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none shadow-sm">
            </div>

            <div class="space-y-2">
                <label for="portada" class="block text-sm font-bold text-slate-700 dark:text-slate-300">Portada</label>
                <input type="file" name="portada" id="portada" placeholder=""
                    class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none shadow-sm">
            </div>

            <div class="md:col-span-2 pt-4">
                <hr class="border-gray-100 dark:border-slate-700">
            </div>

            <div class="md:col-span-2 flex items-center justify-end space-x-4">
                <a href="" class="px-6 py-3 text-sm font-bold text-slate-500 hover:text-slate-700 transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                    class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none transform active:scale-95 transition-all">
                    Guardar Libro
                </button>
            </div>
        </div>
    </form>
</div>

</body>
</html>