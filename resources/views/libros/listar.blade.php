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
        <h2 class="text-2xl font-extrabold text-slate-800 dark:text-white tracking-tight">Listado de libros</h2>
       
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
        <div class="md:col-span-2 pt-4">
            <hr class="border-gray-100 dark:border-slate-700">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 dark:bg-slate-900/20">
                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">id</th>
                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">titulo</th>
                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">autor_id</th>
                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">isbn</th>
                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">editorial</th>
                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">sinopsis</th>
                        <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">portada</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-slate-700">

                    @foreach ( $libros as $libro )

                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                            <td class="px-4 py-4 text-sm font-medium text-slate-400">{{ $libro->id }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-slate-400">{{ $libro->titulo }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-slate-400">{{ $libro->autor_id }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-slate-400">{{ $libro->isbn }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-slate-400">{{ $libro->editorial }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-slate-400">{{ $libro->sinopsis }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-slate-400">{{ $libro->portada }}</td>
                            <td class="px-4 py-4 text-center">
                                
                            <td class="px-3 py-3 text-center">
                                <a href="{{ route('libros.editar', ['idLibro'=>$libro->id]) }}" class="inline-flex items-center p-2 text-indigo-600 bg-indigo-50 rounded-xl hover:bg-indigo-600 hover:text-white transition-all duration-200 dark:bg-slate-700 dark:text-indigo-400 dark:hover:bg-indigo-500 dark:hover:text-white group"
                            title="Editar libro">
                                 <svg xmlns="http://www.w3.org" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>

                                    <td class="px-3 py-3 text-center">
                            <a href="{{ route('libros.eliminar', ['idLibro'=>$libro->id]) }}" class="inline-flex items-center p-2 text-indigo-600 bg-indigo-50 rounded-xl hover:bg-indigo-600 hover:text-white transition-all duration-200 dark:bg-slate-700 dark:text-indigo-400 dark:hover:bg-indigo-500 dark:hover:text-white group"
                            title="Eliminar libro">
                                <svg xmlns="http://www.w3.org" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        </td>

                                </a>
                            </td>

                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>