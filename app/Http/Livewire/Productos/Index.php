<?php

namespace App\Http\Livewire\Productos;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Producto;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $producto_id, $nombre, $descripcion, $imagen, $precio, $imagen_nueva;
    public $isOpen = false;

    protected $paginationTheme = 'tailwind';
    protected $rules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric|min:0',
        'imagen' => 'nullable|string',
        'imagen_nueva' => 'nullable|string'
    ];

    public function render()
    {
        $productos = Producto::where('nombre', 'like', "%{$this->search}%")->paginate(10);
        return view('livewire.productos.index', compact('productos'));
    }

    public function create()
    {
        $this->reset(['producto_id', 'nombre', 'descripcion', 'precio', 'imagen', 'imagen_nueva']);
        $this->isOpen = true;
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $this->producto_id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->imagen = $producto->imagen;
        $this->isOpen = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->imagen_nueva) {
            $this->imagen = $this->imagen_nueva;
        }

        Producto::updateOrCreate(
            ['id' => $this->producto_id],
            [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'imagen' => $this->imagen,
                'precio' => $this->precio,
            ]
        );

        session()->flash('message', 'Producto guardado correctamente.');

        $this->reset(['isOpen', 'producto_id', 'nombre', 'descripcion', 'precio', 'imagen', 'imagen_nueva']);

        // 🔥 Emite evento para actualizar la tabla en la vista
        $this->emit('refreshProductos');
    }

    public function delete($id)
    {
        Producto::findOrFail($id)->delete();
        session()->flash('message', 'Producto eliminado correctamente.');
    }
}
