<?php
use App\Models\Productos;
use App\Models\clientes;
use App\Models\Venta;
?>
<div>

    <div class="table-responsive">
        <table class="table table-bordered ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th>Cliente</th>
                    <th>Seguro</th>
                    <th>Fecha de contratación</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <?php
                        $cliente = Clientes::find($venta['cliente_id']);
                        $producto = Productos::find($venta['producto_id']);
                        ?>
                        <td><?= $cliente['name'] . ' ' . $cliente['last_name'] ?></td>
                        <td><?= $producto['name'] ?></td>
                        <td><?= $venta['fecha'] ?></td>
                        <td>
                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
    
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    
    </div>
    <div class="col-md-6">
        <h1>Añadir Venta</h1>
        <form class="form-inline" wire:submit.prevent="saveVenta" autocomplete="off">
            <div class="mb-3 form-group">
                <label for="producto" class="form-label">Seguro</label>
                <select class="form-control custom-select" wire:model="producto">
                    <option value="null" selected disabled>{{ __('Seleccione un seguro') }}</option>
                    @foreach ($productos as $producto)
                        <option selected value="{{$producto['id']}}"  wire:key="producto-{{ $producto->id }}">{{$producto['name']}}</option>
                    @endforeach
                </select>
                @error('producto') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3 form-group">
                <label for="name" class="form-label">Nombre</label>
                <input class="form-control" autocomplete="ÑÖcompletes" wire:model="name" placeholder="Escriba el nombre del cliente" minlength="3" maxlength="50" type="text" >
                @error('name') <span class="error">{{ $message }}</span> @enderror
    
            </div>
            <div class="mb-3 form-group">
                <label for="last_name" class="form-label">Apellido</label>
                <input class="form-control" autocomplete="ÑÖcompletes" wire:model="last_name" placeholder="Escriba el apellido del cliente" minlength="3" maxlength="100" type="text">
                @error('last_name') <span class="error">{{ $message }}</span> @enderror
    
            </div>
            <div class="mb-3 form-group">
                <label for="email" class="form-label">Correo electrónico</label>
                <input class="form-control" autocomplete="ÑÖcompletes" wire:model="email" type="email" minlength="10" maxlength="45" placeholder="Escriba el correo electrónico del cliente">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3 form-group">
                <label for="phone" class="form-label">Teléfono</label>
                <input class="form-control" autocomplete="ÑÖcompletes" wire:model="phone" type="text" maxlength="10" minlength="10" placeholder="Escriba el teléfono del cliente">
                @error('phone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-sm w-50">Añadir venta</button>
            </div>
        </form>
    </div>
</div>
