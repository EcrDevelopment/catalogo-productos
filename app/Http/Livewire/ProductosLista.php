<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;
use App\Models\SolicitudFicha;
use Livewire\WithPagination;

class ProductosLista extends Component
{
    use WithPagination;

    public $productoSeleccionado = null;
    public $correo;
    public $cargando = false;
    public $descargandoFicha = [];

    protected $rules = [
        'correo' => 'required|email',
        'productoSeleccionado' => 'nullable',
    ];

    public function solicitarFicha($id)
    {
        $this->productoSeleccionado = Producto::findOrFail($id);
    }

    public function enviarFicha()
    {
        $this->cargando = true;

        if (filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
            Session::put('correo_solicitado', $this->correo);

            SolicitudFicha::create([
                'correo' => $this->correo,
                'producto_id' => $this->productoSeleccionado->id,
            ]);

            $productoId = $this->productoSeleccionado->id;
            $this->reset(['productoSeleccionado', 'correo', 'cargando']);
            $this->dispatchBrowserEvent('cerrarModal');


            return redirect()->route('descargar.ficha', $productoId);
        }

        $this->cargando = false;
    }

    public function cerrarModal()
    {
        $this->reset(['productoSeleccionado', 'correo', 'cargando']);
    }

    public function descargarFicha($id)
    {
        $this->descargandoFicha[$id] = true;

        return redirect()->route('descargar.ficha', $id)->with('descargando', $id);
    }

    public function render()
    {
        $productos = Producto::paginate(8);
        return view('livewire.productos-lista', compact('productos'));
    }
}
