<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ListaSeguimiento;
use Illuminate\Support\Facades\Auth;

class ListaDeSeguimiento extends Component
{
    public $contenidoId;
    public $tipoContenido;
    public $estado = null;
    public $enLista = false;

    public function mount($contenidoId, $tipoContenido)
    {
        $this->contenidoId = $contenidoId;
        $this->tipoContenido = $tipoContenido;
        $this->checklista();
    }

    public function checklista() {
        $registro = ListaSeguimiento::where('user_id', Auth::id())
            ->where('contenido_id', $this->contenidoId)
            ->where('tipo_contenido', $this->tipoContenido)
            ->first();

        if ($registro) {
            $this->enLista = true;
            $this->estado = $registro->estado;
        } else {
            $this->enLista = false;
            $this->estado = null;
        }
    }

    public function toggleLista($nuevoEstado)
    {
        $registro = ListaSeguimiento::where('user_id', Auth::id())
            ->where('contenido_id', $this->contenidoId)
            ->where('tipo_contenido', $this->tipoContenido)
            ->first();

        if ($registro) {
            if ($registro->estado === $nuevoEstado) {
                // Si el estado es el mismo, eliminar el registro
                $registro->delete();
                $this->enLista = false;
                $this->estado = null;
            } else {
                // Si el estado es diferente, actualizarlo
                $registro->update(['estado' => $nuevoEstado]);
                $this->estado = $nuevoEstado;
            }
        } else {
            // Si no existe en la lista, crearlo
            ListaSeguimiento::create([
                'user_id' => Auth::id(),
                'contenido_id' => $this->contenidoId,
                'tipo_contenido' => $this->tipoContenido,
                'estado' => $nuevoEstado
            ]);

            $this->enLista = true;
            $this->estado = $nuevoEstado;
        }
    }

    public function render()
    {
        return view('livewire.lista-de-seguimiento');
    }
}
