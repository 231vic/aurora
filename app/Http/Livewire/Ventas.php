<?php

namespace App\Http\Livewire;
use Illuminate\Foundation\Validation\ValidatesRequests; 
use App\Models\Productos;
use App\Models\clientes;
use App\Models\Venta;
use Livewire\Component;

class Ventas extends Component
{
    
    public $producto;
    public $name;
    public $last_name;
    public $email;
    public $phone;

    protected $rules = [
        'producto' => 'required|numeric',
        'name' => 'required|max:50|min:3',
        'last_name' => 'required|min:3|max:100',
        'email' => 'required|min:3|max:45|email',
        'phone' => 'required|numeric|digits:10',
    ];

    protected $messages = [
        'producto.required' => 'El producto es obligatorio.',
        'producto.numeric' => 'El producto no es válido.',
        'name.required' => 'El nombre es obligatorio.',
        'last_name.required' => 'El apellido es obligatorio.',
        'email.required' => 'El email es obligatorio.',
        'phone.required' => 'El teléfono es obligatorio.',
    ];

    public function render()
    {        
        return view('livewire.ventas', [
                                        'ventas'=> Venta::all(), 
                                        'productos'=> Productos::all(), 
                                        'clientes'=> Clientes::all(), 
                                    ]);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveVenta(){
        $this->validate();
        $cliente = new Clientes();
        $cliente->name = $this->name;
        $cliente->last_name = $this->last_name;
        $cliente->email = $this->email;
        $cliente->phone = $this->phone;
        $cliente->save();

        $venta = new Venta();
        $venta->cliente_id = $cliente->id;
        $venta->producto_id = $this->producto;
        $venta->fecha = date('Y-m-d H:i:s');
        $venta->save();
        
    }
}
