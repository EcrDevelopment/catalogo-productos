<div class="container p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Catálogo de Productos</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($productos as $producto)
            <div class="border rounded-md overflow-hidden shadow-lg bg-white text-center">
                <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}"
                    class="mt-4 w-full h-60 object-cover object-center">
                <div class="p-4">
                    <h2 class="text-lg font-semibold">{{ $producto->nombre }}</h2>
                    <p class="text-gray-600 text-sm">{{ $producto->descripcion }}</p>

                    @auth
                        <p class="text-green-600 font-bold mt-2">S/ {{ $producto->precio }}</p>
                        <a href="{{ route('descargar.ficha', $producto->id) }}"
                            class="mt-2 block text-center bg-indigo-500 text-white py-2 rounded-lg hover:bg-indigo-600 transition">
                            Descargar Ficha Técnica
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-red-500 underline font-semibold">Inicia sesión
                            para ver el precio</a>
                        <button wire:click="solicitarFicha({{ $producto->id }})"
                            class="mt-2 w-full block text-center bg-indigo-400 text-white py-2 rounded-lg hover:bg-indigo-600 transition">
                            Solicitar Ficha Técnica
                        </button>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-6">
        {{ $productos->links() }}
    </div>

    @if ($productoSeleccionado)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-lg font-bold">Solicitar Ficha Técnica</h2>
                <p class="text-sm text-gray-600">Ingresa tu correo para recibir la ficha técnica de
                    <strong>{{ $productoSeleccionado->nombre }}</strong>
                </p>

                <input type="email" wire:model="correo" class="w-full mt-3 px-3 py-2 border rounded-lg"
                    placeholder="tuemail@example.com">

                <div class="flex justify-end mt-4">
                    <button wire:click="enviarFicha"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 disabled:opacity-50"
                        wire:loading.attr="disabled" wire:target="enviarFicha">

                        <span wire:loading.remove wire:target="enviarFicha">Enviar</span>
                        <span wire:loading wire:target="enviarFicha" class="animate-pulse">Procesando...</span>
                    </button>

                    <button wire:click="cerrarModal"
                        class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600"
                        wire:loading.attr="disabled">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    @endif

    <script>
        window.addEventListener('cerrarModal', () => {
            @this.set('productoSeleccionado', null);
        });
    </script>


</div>
