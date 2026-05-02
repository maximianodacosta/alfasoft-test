<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contato</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 mb-4">Editar Contato</h2>
                <form action="{{ route('contacts.update', $contact) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                        <input type="text" name="name" value="{{ old('name', $contact->name) }}" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Contato:</label>
                        <input type="text" name="contact" value="{{ old('contact', $contact->contact) }}" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        @error('contact') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">E-mail:</label>
                        <input type="email" name="email" value="{{ old('email', $contact->email) }}" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Atualizar</button>
                        <a href="{{ route('contacts.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
