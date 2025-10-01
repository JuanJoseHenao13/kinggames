<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = \Cart::getContent();
        $total = \Cart::getTotal();

        if (auth()->check() && auth()->user()->rol === 'cliente' && request()->route()->getPrefix() == '/cliente') {
            return view('cliente.cart.index', compact('cartItems', 'total'));
        }

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, Producto $producto)
    {
        \Cart::add([
            'id' => $producto->id_producto,
            'name' => $producto->nombre,
            'price' => $producto->precio,
            'quantity' => $request->cantidad ?? 1,
            'attributes' => [
                'imagen' => $producto->imagen,
            ],
            'associatedModel' => $producto
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Producto agregado al carrito.',
                'cartCount' => \Cart::getTotalQuantity()
            ]);
        }

        return back()->with('success', 'Producto agregado al carrito.');
    }

    public function update(Request $request, Producto $producto)
    {
        try {
            \Cart::update($producto->id_producto, [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->cantidad
                ],
            ]);

            $item = \Cart::get($producto->id_producto);
            $subtotal = $item->price * $item->quantity;
            $total = \Cart::getTotal();

            return response()->json([
                'success' => true,
                'subtotal' => number_format($subtotal, 2),
                'total' => number_format($total, 2),
                'cartCount' => \Cart::getTotalQuantity()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el carrito.'
            ], 500);
        }
    }

    public function remove(Request $request, Producto $producto)
    {
        \Cart::remove($producto->id_producto);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success'   => true,
                'message'   => 'Producto eliminado del carrito.',
                'cartCount' => \Cart::getTotalQuantity(),
                'total'     => number_format(\Cart::getTotal(), 2)
            ]);
        }

        return back()->with('success', 'Producto eliminado del carrito.');
    }

    public function getCartCount()
    {
        return response()->json(['count' => \Cart::getTotalQuantity()]);
    }
}
