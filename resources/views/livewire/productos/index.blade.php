<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-4">
        <input type="text" wire:model="search" placeholder="Buscar productos..."
            class="w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        <button wire:click="create"
            class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">Agregar Producto</button>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 text-green-600">{{ session('message') }}</div>
    @endif

    <table class="min-w-full bg-white border rounded-lg text-sm">
        <thead>
            <tr class="bg-indigo-300">
                <th class="py-2 px-4 border">Nombre</th>
                <th class="py-2 px-4 border">Descripción</th>
                <th class="py-2 px-4 border">Precio</th>
                <th class="py-2 px-4 border">Imagen</th>
                <th class="py-2 px-4 border">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td class="py-2 px-4 border">{{ $producto->nombre }}</td>
                    <td class="py-2 px-4 border">{{ $producto->descripcion }}</td>
                    <td class="py-2 px-4 border"> {{ 'S/ '.$producto->precio }}</td>
                    <td class="py-2 px-4 border">
                        @if ($producto->imagen)
                            <img src="{{ $producto->imagen }}" class="h-12 w-12 object-cover rounded-full">
                        @endif
                    </td>
                    <td class="py-2 px-4 border">
                        <button wire:click="edit({{ $producto->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar</button>
                        <button wire:click="delete({{ $producto->id }})"
                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                            onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $productos->links() }}

    @if ($isOpen)
    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            {{ $producto_id ? 'Editar Producto' : 'Nuevo Producto' }}
        </x-slot>

        <x-slot name="content">
            <div class="space-y-4">
                <input type="text" wire:model="nombre" placeholder="Nombre"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">

                <textarea wire:model="descripcion" placeholder="Descripción"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"></textarea>

                <input type="number" wire:model="precio" placeholder="Precio"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">

                <input type="text" wire:model="imagen" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300" placeholder="URL de la imagen">

                @if ($imagen)
                    <img src="{{ is_string($imagen) ? $imagen : $imagen->temporaryUrl() }}" class="h-16 w-16 object-cover mb-2">
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('isOpen', false)">
                Cancelar
            </x-secondary-button>

            <x-button wire:click="save" wire:loading.attr="disabled" class="ml-2">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>

    @endif
</div>
