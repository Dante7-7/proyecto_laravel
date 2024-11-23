<?php

namespace App\Http\Controllers;

use App\Models\exitproduct;
use App\Models\facturas;
use App\Models\Personas;
use App\Models\productos;
use App\Models\salidainventario;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    // Mostrar listado de facturas
    public function index()
    {
        // Obtener todas las facturas con la relación de personas (clientes)
        $facturas = facturas::with('personas')->get();
        return view('facturas.index', compact('facturas'));
    }

    // Mostrar formulario para crear una nueva factura
    public function create()
    {
        // Obtener todos los clientes y productos
        $clientes = Personas::all();
        $productos = productos::all();
        $productosJson = $productos->toJson(); // Convertir productos a formato JSON para JS
        return view('facturas.create', compact('clientes', 'productos', 'productosJson'));
    }

    // Guardar una nueva factura
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'cliente_id' => 'required|exists:personas,id', // Validar que el cliente exista
            'precio_neto' => 'required|numeric',
            'iva' => 'required|numeric',
            'descuento' => 'required|numeric',
            'precio_total' => 'required|numeric',
            'productos' => 'required|array', // Validar que los productos sean un array
            'productos.*.producto' => 'required|exists:productos,id', // Validar que los productos existan
            'productos.*.cantidad' => 'required|integer|min:1', // Validar cantidad
        ]);

        try {
            // Guardar la nueva factura
            $factura = new facturas();
            $factura->cliente_id = $request->cliente_id;
            $factura->precio_neto = $request->precio_neto;
            $factura->iva = $request->iva;
            $factura->descuento = $request->descuento;
            $factura->precio_total = $request->precio_total;
            $factura->save();

            // Registrar las salidas de inventario
            foreach ($request->productos as $producto) {
                salidainventario::create([
                    'factura_id' => $factura->id,
                    'producto_id' => $producto['producto'],
                    'cantidad' => $producto['cantidad'],
                ]);
            }

            // Retornar un mensaje de éxito como JSON
            return response()->json([
                'status' => 'success',
                'message' => 'Factura creada exitosamente',
                'factura_id' => $factura->id
            ], 200);

        } catch (\Exception $e) {
            // Registrar el error en los logs
            \Log::error('Error al guardar la factura: ' . $e->getMessage());

            // Retornar un mensaje de error como JSON
            return response()->json([
                'status' => 'error',
                'message' => 'No se pudo guardar la factura. Por favor, inténtalo de nuevo.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Editar factura
    public function edit(facturas $facturas)
    {
        return view('facturas.edit', compact('facturas'));
    }

    // Actualizar factura
    public function update(Request $request, facturas $facturas)
    {
        // Validar los datos antes de actualizar
        $request->validate([
            'cliente_id' => 'required|exists:personas,id',
            'precio_neto' => 'required|numeric',
            'iva' => 'required|numeric',
            'descuento' => 'required|numeric',
            'precio_total' => 'required|numeric',
        ]);

        // Actualizar la factura
        $facturas->update([
            'cliente_id' => $request->cliente_id,
            'precio_neto' => $request->precio_neto,
            'iva' => $request->iva,
            'descuento' => $request->descuento,
            'precio_total' => $request->precio_total,
        ]);

        return redirect()->route('facturas.index')->with('success_message_update', 'Factura actualizada correctamente');
    }

    // Eliminar factura
    public function destroy(facturas $factura)
    {
        // Eliminar la factura de la base de datos
        $factura->delete();
        return back()->with('success', 'Factura eliminada correctamente');
    }
}
