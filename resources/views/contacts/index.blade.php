<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white border-b border-gray-100 p-4 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between">
            <span class="font-bold text-xl text-gray-800">Alfasoft Test</span>
            @if(auth()->check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500">Sair</button>
                </form>
            @else
                <a href="/login" class="text-blue-500">Login</a>
            @endif
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Lista de Contatos</h2>
                
                @if(auth()->check())
                    <a href="{{ route('contacts.create') }}" class="mb-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                        Novo Contato
                    </a>
                @endif

                <table class="min-w-full mt-4 border border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2 text-left">Nome</th>
                            <th class="border px-4 py-2 text-left">Contato</th>
                            <th class="border px-4 py-2 text-left">E-mail</th>
                            <th class="border px-4 py-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $contact->name }}</td>
                                <td class="border px-4 py-2">{{ $contact->contact }}</td>
                                <td class="border px-4 py-2">{{ $contact->email }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('contacts.show', $contact) }}" class="text-blue-500 hover:underline">Ver</a>
                                    @if(auth()->check())
                                        <span class="mx-1 text-gray-300">|</span>
                                        <a href="{{ route('contacts.edit', $contact) }}" class="text-green-500 hover:underline">Editar</a>
                                        <span class="mx-1 text-gray-300">|</span>
                                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Excluir</button>
                                        </form>
                                    @endif
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
