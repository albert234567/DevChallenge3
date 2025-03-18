{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvingut</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-300 to-blue-500 dark:bg-gradient-to-r dark:from-red-700 dark:to-red-800">

    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center text-white p-6 bg-opacity-75 rounded-lg shadow-lg">
            <h1 class="text-5xl font-bold mb-6 drop-shadow-lg">Benvingut a la llista de la compra!</h1>

            <div class="space-x-4">
                <!-- Si l'usuari està autenticat, mostrar el botó de Log Out i un botó de Dashboard -->
                @auth
                    <!-- Botó per a Dashboard o pàgina inicial -->
                    <a href="{{ route('llistas.index') }}" class="px-8 py-3 text-white bg-green-700 hover:bg-green-800 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Veure Llistes
                    </a>

                    <!-- Botó de Tancar Sessió -->
                    <form method="POST" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button type="submit" class="px-8 py-3 text-white bg-red-700 hover:bg-red-800 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                            Tancar Sessió
                        </button>
                    </form>
                @else
                    <!-- Botó de Login -->
                    <a href="{{ route('login') }}" class="px-8 py-3 text-white bg-blue-700 hover:bg-blue-800 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Iniciar Sessió
                    </a>

                    <!-- Botó de Register -->
                    <a href="{{ route('register') }}" class="px-8 py-3 text-white bg-blue-700 hover:bg-blue-800 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Registrar-se
                    </a>
                @endauth
            </div>
        </div>
    </div>

</body>
</html>
