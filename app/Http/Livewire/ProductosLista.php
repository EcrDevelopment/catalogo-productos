<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;
use App\Models\SolicitudFicha;

class ProductosLista extends Component
{
    public $productoSeleccionado = null;
    public $correo;
    public $cargando = false;

    protected $rules = [
        'correo' => 'required|email', // Validamos el correo
        'productoSeleccionado' => 'nullable', // Permitimos que sea null sin error
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

            // Guardamos el correo en la base de datos
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
        $this->reset(['productoSeleccionado', 'correo', 'cargando']); // Aseguramos que se cierre el modal
    }

    public function render()
    {
        $productos = Producto::paginate(9);
        return view('livewire.productos-lista', compact('productos'));
    }
}
