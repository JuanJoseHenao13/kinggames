<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class CartComposer
{
    public function __construct()
    {
        // El constructor puede estar vacío por ahora.
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Usamos el paquete darryldecode/cart para obtener la cantidad total de artículos.
        $cartCount = \Cart::getTotalQuantity();
        
        $view->with('cartCount', $cartCount);
    }
}