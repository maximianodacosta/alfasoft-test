<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Contato - Alfasoft</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white border-b border-gray-100 p-4 shadow-sm mb-8">
        <div class="max-w-7xl mx-auto flex justify-between">
            <span class="font-bold text-xl text-gray-800">Alfasoft Test</span>
            <a href="{{ route('contacts.index') }}" class="text-blue-500 hover:underline">Voltar para Lista</a>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="font-semibold text-xl text-gray-800 mb-6 border-b pb-2">Cadastrar Novo Contato</h2>
            
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nome Completo:</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                           class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           placeholder="Mínimo 6 caracteres">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Contato (9 dígitos):</label>
                    <input type="text" name="contact" value="{{ old('contact') }}" 
                           class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           placeholder="Ex: 999999999">
                    @error('contact') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">E-mail:</label>
                    <input type="email" name="email" value="{{ old('email') }}" 
                           class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           placeholder="email@exemplo.com">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('contacts.index') }}" class="text-gray-500 hover:text-gray-700 font-semibold">Cancelar</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition duration-200">
                        Salvar Contato
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
