<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura #{{ $transaccion->id_transaccion }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 13px;
            color: #000000;
            background: #f8f9fa;
            padding: 40px 20px;
            line-height: 1.6;
        }

        .factura-container {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
            border-radius: 8px;
            overflow: hidden;
            color: #000000;
        }

        /* Header profesional */
        .header {
            background: linear-gradient(135deg, #000000 0%, #3b82f6 50%, #1e40af 100%);
            padding: 40px;
            color: #000000;
            position: relative;
            overflow: hidden;
        }

        .header::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: relative;
            z-index: 1;
        }

        .factura-info {
            text-align: left;
            background: rgba(97, 161, 159, 0.9);
            padding: 20px;
            border-radius: 6px;
            backdrop-filter: blur(10px);
        }

        .logo-section h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 5px;
            letter-spacing: 1px;
            color: #000000;
        }

        .logo-section p {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 300;
        }

        .factura-info h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #000000;
        }

        .factura-info p {
            margin: 5px 0;
            font-size: 13px;
            color: #000000;
        }

        .factura-info strong {
            display: inline-block;
            min-width: 80px;
            color: #000000;
        }

        /* Contenido principal */
        .main-content {
            padding: 40px;
        }

        /* Sección de información */
        .info-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .info-box {
            background: #ffffff;
            padding: 25px;
            border-radius: 6px;
            border-left: 4px solid #3498db;
        }

        .info-box h3 {
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }



        .info-box p {
            margin: 8px 0;
            color: #000000;
            font-size: 13px;
        }

        .info-box strong {
            color: #000000;
            font-weight: 600;
            display: inline-block;
            min-width: 90px;
        }

        /* Sección de proveedores */
        .proveedor-section {
            margin-bottom: 40px;
        }

        .proveedor-section h3 {
            font-size: 14px;
            font-weight: 600;
            color: #000000;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0e0e0;
        }

        .proveedor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .proveedor-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            border-left: 4px solid #27ae60;
        }

        .proveedor-box p {
            margin: 6px 0;
            color: #000000;
            font-size: 13px;
        }

        .proveedor-box strong {
            color: #000000;
            font-weight: 600;
        }

        /* Tabla de productos */
        .productos-section {
            margin-bottom: 30px;
        }

        .productos-section h3 {
            font-size: 14px;
            font-weight: 600;
            color: #000000;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0e0e0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background: #ffffff;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        thead {
            background: #446e97;
            color: #ffffff;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        th:nth-child(3),
        th:nth-child(4),
        th:nth-child(5) {
            text-align: right;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ecf0f1;
            color: #b7b7b7;
            font-size: 13px;
        }

        td:nth-child(3),
        td:nth-child(4),
        td:nth-child(5) {
            text-align: right;
        }

        tbody tr:hover {
            background: #f8f9fa;
            transition: background 0.2s ease;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Resumen de totales */
        .totales-section {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .totales-box {
            width: 350px;
            background: #f8f9fa;
            border-radius: 6px;
            overflow: hidden;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 15px 25px;
            border-bottom: 1px solid #e0e0e0;
        }

        .total-row:last-child {
            border-bottom: none;
        }

        .total-row.final {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: #ffffff;
            font-size: 18px;
            font-weight: 700;
            padding: 20px 25px;
        }

        .total-label {
            font-weight: 600;
            color: #000000;
        }

        .total-row.final .total-label {
            color: #000000;
        }

        .total-value {
            font-weight: 700;
            color: #27ae60;
        }

        .total-row.final .total-value {
            color: #000000;
            font-size: 24px;
        }

        /* Footer */
        .footer {
            background: #f8f9fa;
            padding: 30px 40px;
            text-align: center;
            border-top: 3px solid #3498db;
        }

        .footer p {
            margin: 5px 0;
            color: #000000;
            font-size: 13px;
        }

        .footer strong {
            color: #000000;
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }

        /* Notas adicionales */
        .notas-section {
            background: #fff8e1;
            padding: 20px;
            border-radius: 6px;
            border-left: 4px solid #ffc107;
            margin-top: 30px;
        }

        .notas-section h4 {
            font-size: 13px;
            font-weight: 600;
            color: #000000;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .notas-section p {
            font-size: 12px;
            color: #000000;
            line-height: 1.6;
        }

        /* Estilos de impresión */
        @media print {
            body {
                background: #ffffff;
                padding: 0;
            }

            .factura-container {
                box-shadow: none;
                border-radius: 0;
            }

            .header::after {
                display: none;
            }

            @page {
                margin: 1cm;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 20px;
            }

            .factura-info {
                text-align: left;
                width: 100%;
            }

            .info-section {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .main-content {
                padding: 20px;
            }

            .totales-box {
                width: 100%;
            }

            table {
                font-size: 11px;
            }

            th, td {
                padding: 10px 8px;
            }
        }
    </style>
</head>
<body>
    <div class="factura-container">
        <!-- Header -->
        <div class="header">
            <div class="header-content">
                <div class="factura-info">
                    <h2>TU FACTURA</h2>
                    <p><strong>Nº:</strong> {{ $transaccion->id_transaccion }}</p>
                    <p><strong>Fecha:</strong> @if($transaccion->fecha_transaccion) {{ $transaccion->fecha_transaccion->format('d/m/Y') }} @else N/A @endif</p>
                    <p><strong>Hora:</strong> @if($transaccion->fecha_transaccion) {{ $transaccion->fecha_transaccion->format('H:i:s') }} @else N/A @endif</p>
                </div>
                <div class="logo-section">
                    <h3>Bienvenido a </h3>
                    <br>
                    <p>Tu tienda de videojuegos de confianza</p>
                </div>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="main-content">
            <!-- Información Cliente y Empresa -->
            <div class="info-section">
                <div class="info-box">
                    <h3>DATOS DEL CLIENTE</h3>
                    <p><strong>Nombre:</strong> {{ $transaccion->usuario->nombre . ' ' . $transaccion->usuario->apellidos }}</p>
                    <p><strong>Email:</strong> {{ $transaccion->usuario->email }}</p>
                    <p><strong>Teléfono:</strong> {{ $transaccion->usuario->telefono }}</p>
                    <p><strong>Dirección:</strong> {{ $transaccion->usuario->direccion }}</p>
                </div>

                <div class="info-box" style="border-left-color: #e74c3c;">
                    <h3>DATOS DE LA EMPRESA</h3>
                    <p><strong>Razón Social:</strong> KinGGameS S.A.S</p>
                    <p><strong>NIT:</strong> 900.XXX.XXX-X</p>
                    <p><strong>Dirección:</strong> Calle Principal #123</p>
                    <p><strong>Teléfono:</strong> +57 300 XXX XXXX</p>
                </div>
            </div>

            <!-- Proveedores -->
            <div class="proveedor-section">
                <h3>INFORMACIÓN DE PROVEEDORES</h3>
                @php
                    $proveedores = $transaccion->detalleTransacciones->map(function($detalle) {
                        return $detalle->producto->proveedor;
                    })->unique('id_proveedor');
                @endphp
                <div class="proveedor-grid">
                    @foreach($proveedores as $proveedor)
                        <div class="proveedor-box">
                            <p><strong>Proveedor:</strong> {{ $proveedor->nombre }}</p>
                            <p><strong>Contacto:</strong> {{ $proveedor->telefono }}</p>
                            <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Tabla de Productos -->
            <div class="productos-section">
                <h3>DETALLE DE PRODUCTOS</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Proveedor</th>
                            <th>Cantidad</th>
                            <th>Precio Unit.</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaccion->detalleTransacciones as $detalle)
                            @if($detalle->producto)
                                <tr>
                                    <td><strong>{{ $detalle->producto->nombre }}</strong></td>
                                    <td>{{ $detalle->producto->proveedor->nombre }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>${{ number_format($detalle->precio_unitario, 2) }}</td>
                                    <td><strong>${{ number_format($detalle->cantidad * $detalle->precio_unitario, 2) }}</strong></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Totales -->
            <div class="totales-section">
                <div class="totales-box">
                    <div class="total-row">
                        <span class="total-label">Subtotal:</span>
                        <span class="total-value">${{ number_format($transaccion->total, 2) }}</span>
                    </div>
                    <div class="total-row">
                        <span class="total-label">IVA (0%):</span>
                        <span class="total-value">$0.00</span>
                    </div>
                    <div class="total-row final">
                        <span class="total-label">TOTAL A PAGAR:</span>
                        <span class="total-value">${{ number_format($transaccion->total, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Notas -->
            <div class="notas-section">
                <h4> INFORMACIÓN IMPORTANTE</h4>
                <p>Esta factura es un comprobante de compra válido. Conserve este documento para cualquier reclamación o garantía. Los productos adquiridos tienen garantía según las políticas del fabricante. Para devoluciones o cambios, por favor contacte nuestro servicio al cliente dentro de los próximos 30 días.</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <strong>¡Gracias por su compra!</strong>
            <p>Dirigete al punto fisico y muestra este ticket para reclamar tu compra.</p>
            <p>Síguenos en redes sociales:</p>
            <p style="margin-top: 15px; font-size: 11px;">Este documento ha sido generado electrónicamente y es válido sin firma o sello.</p>
        </div>
    </div>
</body>
</html>
