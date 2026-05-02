<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Contato</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6 border-b pb-4">
                    <h2 class="font-semibold text-xl text-gray-800">Detalhes do Contato</h2>
                    <a href="{{ route('contacts.index') }}" class="text-blue-500 hover:underline">Voltar para a lista</a>
                </div>

                <div class="space-y-4 mb-8">
                    <p><strong class="text-gray-600 w-24 inline-block">ID:</strong> {{ $contact->id }}</p>
                    <p><strong class="text-gray-600 w-24 inline-block">Nome:</strong> {{ $contact->name }}</p>
                    <p><strong class="text-gray-600 w-24 inline-block">Contato:</strong> {{ $contact->contact }}</p>
                    <p><strong class="text-gray-600 w-24 inline-block">E-mail:</strong> {{ $contact->email }}</p>
                </div>

                @if(auth()->check())
                <div class="flex gap-4 border-t pt-6">
                    <a href="{{ route('contacts.edit', $contact) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded">
                        Editar
                    </a>
                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded">
                            Excluir
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
