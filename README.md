# 🕹️ Tienda de Videojuegos - Sistema de E-commerce Completo

[![Build Status](https://img.shields.io/badge/build-passing-brightgreen)](https://github.com/[TU_USUARIO]/tienda-videojuegos/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Version](https://img.shields.io/badge/version-1.0.0-blue)](https://github.com/[TU_USUARIO]/tienda-videojuegos/releases)
[![Laravel](https://img.shields.io/badge/Laravel-10.x-red)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-purple)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange)](https://mysql.com)

**🎯 Sistema completo de e-commerce para videojuegos con panel administrativo y cliente**

Una plataforma robusta y moderna para la venta de videojuegos que incluye gestión completa de inventario, carrito de compras inteligente, sistema de transacciones, y paneles diferenciados para administradores y clientes. Desarrollado con tecnologías de vanguardia para una experiencia de usuario excepcional.

## Tabla de Contenidos

- [Características](#características)
- [Tecnologías](#tecnologías)
- [Requisitos Previos](#requisitos-previos)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Uso](#uso)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Despliegue](#despliegue)
- [Testing](#testing)
- [Contribuir](#contribuir)
- [Resolución de Problemas](#resolución-de-problemas)
- [Licencia](#licencia)
- [Contacto](#contacto)

## Características

### 🎯 Funcionalidades Principales

- **🛒 Carrito de Compras Inteligente**: Sistema de carrito persistente con actualizaciones AJAX en tiempo real, contador dinámico y gestión de cantidades.
- **📊 Dashboard Ejecutivo**: Panel administrativo con métricas en tiempo real (ventas mensuales, stock bajo, usuarios activos, etc.).
- **👤 Panel de Cliente Completo**: Dashboard personalizado con historial de compras, perfil editable y gestión de cuenta.
- **📦 Gestión de Inventario**: Control completo de stock, alertas de stock bajo y actualización automática en compras.
- **🎮 Catálogo de Productos**: Sistema avanzado de productos con imágenes, videos de YouTube, categorías y proveedores.
- **💳 Sistema de Transacciones**: Procesamiento completo de ventas con detalles de productos, PDFs de tickets y historial completo.
- **🔍 Búsqueda y Filtros**: Búsqueda por nombre, filtrado por categoría y proveedor con resultados en tiempo real.
- **📱 Diseño Responsivo**: Interfaz moderna con tema oscuro/claro, animaciones suaves y experiencia móvil optimizada.

### 👨‍💼 Panel Administrativo

**Gestión de Usuarios:**
- Crear, editar y eliminar usuarios
- Asignación de roles (admin/cliente)
- Gestión de perfiles y credenciales

**Gestión de Productos:**
- CRUD completo de productos
- Subida de imágenes y videos de YouTube
- Asociación con categorías y proveedores
- Control de estado (activo/inactivo)

**Gestión de Categorías:**
- Crear y organizar categorías de videojuegos
- Asociación con productos

**Gestión de Proveedores:**
- Administración completa de proveedores
- Vinculación con productos

**Gestión de Inventario:**
- Control de stock por producto
- Alertas de stock mínimo
- Actualización automática en transacciones

**Sistema de Transacciones:**
- Visualización de todas las transacciones
- Filtros por usuario, producto y fecha
- Generación de PDFs de tickets
- Detalles completos de cada venta

### 👤 Panel de Cliente

**Dashboard Personal:**
- Bienvenida personalizada
- Resumen de actividad reciente
- Acceso rápido a funciones principales

**Perfil de Usuario:**
- Edición de datos personales (nombre, apellidos, email, teléfono, dirección)
- Cambio de contraseña seguro
- Gestión de información de contacto

**Catálogo de Productos:**
- Exploración de productos disponibles
- Vista detallada con imágenes y videos
- Información completa de cada producto

**Carrito de Compras:**
- Agregar/eliminar productos
- Actualización de cantidades en tiempo real
- Cálculo automático de totales
- Persistencia de sesión

**Historial de Compras:**
- Lista completa de transacciones realizadas
- Detalles de cada compra
- Descarga de tickets en PDF
- Estado de pedidos

**Proceso de Compra:**
- Checkout simplificado
- Procesamiento seguro de transacciones
- Actualización automática de inventario
- Confirmación inmediata de compra

### 🔧 Características Técnicas

- **Autenticación Segura**: Sistema de login/registro con middleware de roles
- **API REST**: Endpoints para futuras integraciones
- **Gestión de Archivos**: Subida y almacenamiento seguro de imágenes
- **Sistema de Logs**: Registro completo de actividades y errores
- **Validación de Datos**: Validaciones robustas en frontend y backend
- **Gestión de Sesiones**: Carrito persistente durante la sesión
- **Optimización de Rendimiento**: Eager loading, caching y consultas optimizadas

## Tecnologías

- **Backend**: Laravel 10.x (PHP Framework)
- **Frontend**: Blade Templates, Tailwind CSS, JavaScript (ES6+)
- **Base de Datos**: MySQL 8.0+
- **Build Tool**: Vite (para assets)
- **Autenticación**: Laravel Sanctum
- **Testing**: PHPUnit
- **Gestión de Dependencias**: Composer (PHP), npm (JavaScript)

Estas tecnologías fueron elegidas por su robustez, comunidad activa y facilidad de desarrollo para aplicaciones web modernas.

## Requisitos Previos

- PHP 8.1 o superior
- Composer (gestor de dependencias PHP)
- Node.js 18+ y npm
- MySQL 8.0+
- Git

## Instalación

Sigue estos pasos para configurar el proyecto en tu entorno local:

1. **Clona el repositorio**:
   ```bash
   git clone https://github.com/[TU_USUARIO]/tienda-videojuegos.git
   cd tienda-videojuegos
   ```

2. **Instala dependencias PHP**:
   ```bash
   composer install
   ```

3. **Instala dependencias JavaScript**:
   ```bash
   npm install
   ```

4. **Configura el archivo de entorno**:
   ```bash
   cp .env.example .env
   ```
   Edita `.env` con tus configuraciones locales.

5. **Genera la clave de aplicación**:
   ```bash
   php artisan key:generate
   ```

6. **Ejecuta las migraciones y seeders**:
   ```bash
   php artisan migrate --seed
   ```

7. **Construye los assets**:
   ```bash
   npm run build
   ```

8. **Inicia el servidor de desarrollo**:
   ```bash
   php artisan serve
   ```

   En otra terminal, inicia Vite:
   ```bash
   npm run dev
   ```

   Accede a la aplicación en `http://localhost:8000`.

## Configuración

### Variables de Entorno

Crea un archivo `.env` en la raíz del proyecto con las siguientes variables importantes:

```env
APP_NAME="Tienda de Videojuegos"
APP_ENV=local
APP_KEY=[GENERADA_POR_ARTISAN]
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tienda_videojuegos
DB_USERNAME=[TU_USUARIO_DB]
DB_PASSWORD=[TU_PASSWORD_DB]

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=[TU_EMAIL]
MAIL_PASSWORD=[TU_APP_PASSWORD]
MAIL_ENCRYPTION=tls

# [RELLENAR_API_KEY_AQUI] - Si usas servicios externos como Stripe para pagos
STRIPE_KEY=pk_test_...
STRIPE_SECRET=sk_test_...
```

Para generar la `APP_KEY`, usa `php artisan key:generate`.

## Uso

### 🚀 Flujo de Uso para Clientes

#### Registro e Inicio de Sesión
```bash
# Accede a la aplicación
http://localhost:8000

# Regístrate como nuevo cliente o inicia sesión
# Roles disponibles: cliente, admin
```

#### Exploración de Productos
1. **Página Principal**: Visualiza el catálogo completo de videojuegos
2. **Filtros Disponibles**:
   - Por categoría (Acción, Aventura, RPG, etc.)
   - Por proveedor
   - Búsqueda por nombre de producto
3. **Vista Detallada**: Cada producto incluye:
   - Imágenes de alta calidad
   - Videos promocionales de YouTube
   - Descripción completa
   - Precio y disponibilidad
   - Información del proveedor

#### Carrito de Compras
```javascript
// Agregar producto al carrito (AJAX)
fetch('/cart/add/{producto}', {
  method: 'POST',
  headers: {
    'X-CSRF-TOKEN': csrfToken,
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({ cantidad: 1 })
})
.then(response => response.json())
.then(data => {
  if (data.success) {
    updateCartCounter(data.cartCount);
    showNotification(data.message);
  }
});
```

**Funcionalidades del Carrito:**
- Agregar/eliminar productos dinámicamente
- Actualización de cantidades en tiempo real
- Cálculo automático de subtotales y total
- Persistencia durante la sesión
- Contador de productos en el navbar

#### Proceso de Compra
1. **Revisar Carrito**: Verifica productos y cantidades
2. **Checkout**: Procesa la compra automáticamente
3. **Confirmación**: Recibe confirmación inmediata
4. **Actualización**: Inventario se reduce automáticamente

#### Panel de Cliente (`/cliente/dashboard`)
- **Dashboard Personal**: Bienvenida y resumen de actividad
- **Perfil**: Editar datos personales, email, teléfono, dirección
- **Historial de Compras**: Lista completa de transacciones realizadas
- **Descargas**: Tickets de compra en PDF
- **Gestión de Cuenta**: Cambio de contraseña y preferencias

### 👨‍💼 Flujo de Uso para Administradores

#### Acceso al Panel Admin (`/admin`)
```bash
# Credenciales de administrador (desde seeders)
Email: admin@tienda.com
Password: password
```

#### Dashboard Ejecutivo
**Métricas en Tiempo Real:**
- Total de usuarios activos
- Productos destacados
- Ingresos del mes actual
- Alertas de stock bajo
- Número total de transacciones

#### Gestión de Usuarios
```php
// Crear nuevo usuario
$user = new User();
$user->name = 'Nuevo Cliente';
$user->email = 'cliente@email.com';
$user->rol = 'cliente'; // o 'admin'
$user->save();
```

**Funciones:**
- CRUD completo de usuarios
- Asignación de roles
- Gestión de credenciales

#### Gestión de Productos
```php
// Crear nuevo producto
$producto = new Producto();
$producto->nombre = 'Nuevo Videojuego';
$producto->precio = 59.99;
$producto->id_categoria = 1;
$producto->id_proveedor = 1;
$producto->imagen = $request->file('imagen')->store('productos');
$producto->video_id = 'YOUTUBE_VIDEO_ID';
$producto->save();
```

**Funcionalidades:**
- Crear/editar/eliminar productos
- Subir imágenes (máx. 2MB, formatos: JPG, PNG, GIF)
- Integrar videos de YouTube
- Asociar con categorías y proveedores
- Control de estado (activo/inactivo)

#### Gestión de Inventario
```php
// Actualizar stock
$inventario = $producto->inventario;
$inventario->cantidad = 50;
$inventario->stock_minimo = 10;
$inventario->save();
```

**Características:**
- Control de stock por producto
- Alertas automáticas de stock bajo
- Actualización automática en ventas
- Reportes de inventario

#### Sistema de Transacciones
```php
// Ver transacciones con filtros
$transacciones = Transaccion::with(['usuario', 'detalleTransacciones.producto'])
    ->when($request->usuario_id, fn($q) => $q->where('id_usuario', $request->usuario_id))
    ->when($request->fecha_inicio, fn($q) => $q->whereDate('created_at', '>=', $request->fecha_inicio))
    ->paginate(10);
```

**Funcionalidades:**
- Visualización de todas las transacciones
- Filtros avanzados (usuario, producto, fecha)
- Detalles completos de cada venta
- Generación de PDFs de tickets
- Exportación de reportes

### 🔧 Ejemplos de Uso con API

#### Obtener Lista de Productos
```bash
curl -X GET "http://localhost:8000/api/productos" \
  -H "Accept: application/json" \
  -H "Authorization: Bearer {TOKEN}"
```

**Respuesta:**
```json
{
  "data": [
    {
      "id": 1,
      "nombre": "The Legend of Zelda: Breath of the Wild",
      "precio": 59990,
      "estado": "activo",
      "categoria": {
        "id_categoria": 1,
        "nombre_categoria": "Aventura"
      },
      "proveedor": {
        "id_proveedor": 1,
        "nombre_proveedor": "Nintendo"
      },
      "imagen": "productos/zelda.jpg",
      "video_id": "1rPxiXXxftE"
    }
  ],
  "links": {...},
  "meta": {...}
}
```

#### Agregar Producto al Carrito
```bash
curl -X POST "http://localhost:8000/cart/add/1" \
  -H "Content-Type: application/json" \
  -H "X-CSRF-TOKEN: {CSRF_TOKEN}" \
  --data '{"cantidad": 2}'
```

**Respuesta:**
```json
{
  "success": true,
  "message": "Producto agregado al carrito.",
  "cartCount": 3
}
```

#### Actualizar Cantidad en Carrito
```bash
curl -X PATCH "http://localhost:8000/cart/update/1" \
  -H "Content-Type: application/json" \
  -H "X-CSRF-TOKEN: {CSRF_TOKEN}" \
  --data '{"cantidad": 5}'
```

#### Procesar Compra (Checkout)
```bash
curl -X POST "http://localhost:8000/checkout/process" \
  -H "Content-Type: application/json" \
  -H "X-CSRF-TOKEN: {CSRF_TOKEN}"
```

**Respuesta:**
```json
{
  "success": true,
  "message": "Compra realizada con éxito. Gracias por su compra.",
  "transaction_id": 123
}
```

### 📊 Consultas de Base de Datos Comunes

#### Productos con Stock Bajo
```sql
SELECT p.nombre, i.cantidad, i.stock_minimo
FROM productos p
JOIN inventarios i ON p.id_producto = i.id_producto
WHERE i.cantidad <= i.stock_minimo;
```

#### Ventas del Mes Actual
```sql
SELECT SUM(total) as ingresos_mes
FROM transacciones
WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
AND YEAR(created_at) = YEAR(CURRENT_DATE());
```

#### Productos Más Vendidos
```sql
SELECT p.nombre, SUM(dt.cantidad) as total_vendido
FROM productos p
JOIN detalle_transacciones dt ON p.id_producto = dt.id_producto
JOIN transacciones t ON dt.id_transaccion = t.id_transaccion
WHERE t.tipo = 'venta'
GROUP BY p.id_producto, p.nombre
ORDER BY total_vendido DESC
LIMIT 10;
```

## Estructura del Proyecto

```
tienda-videojuegos/
├── app/                    # Lógica de aplicación Laravel
│   ├── Http/Controllers/   # Controladores
│   ├── Models/            # Modelos Eloquent
│   └── Providers/         # Proveedores de servicios
├── database/              # Migraciones y seeders
│   ├── migrations/        # Esquemas de base de datos
│   └── seeders/          # Datos de prueba
├── public/                # Assets públicos
├── resources/            # Vistas y assets no compilados
│   ├── css/              # Estilos CSS
│   ├── js/               # JavaScript
│   └── views/            # Plantillas Blade
├── routes/                # Definición de rutas
│   ├── web.php           # Rutas web
│   └── api.php           # Rutas API
├── storage/               # Archivos temporales y logs
├── tests/                 # Pruebas unitarias y de integración
├── vendor/                # Dependencias PHP (Composer)
├── node_modules/          # Dependencias JS (npm)
├── .env.example           # Plantilla de configuración
├── composer.json          # Dependencias PHP
├── package.json           # Dependencias JS
└── vite.config.js         # Configuración de Vite
```

## Despliegue

### En Producción (Ejemplo con Heroku)

1. **Prepara la aplicación**:
   ```bash
   npm run build
   ```

2. **Configura variables de entorno en Heroku**:
   - Ve a tu app en Heroku Dashboard > Settings > Config Vars
   - Agrega todas las variables del `.env`

3. **Despliega**:
   ```bash
   git push heroku main
   ```

4. **Ejecuta migraciones en producción**:
   ```bash
   heroku run php artisan migrate --force
   ```

### Con Docker

Si tienes un `Dockerfile` y `docker-compose.yml`:

```bash
docker-compose up -d
```

## Testing

Ejecuta las pruebas con PHPUnit:

```bash
# Todas las pruebas
php artisan test

# Pruebas específicas
php artisan test --filter TestProductoController

# Con coverage
php artisan test --coverage
```

Ejemplo de prueba unitaria (`tests/Unit/ProductoTest.php`):

```php
<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Producto;

class ProductoTest extends TestCase
{
    public function test_producto_tiene_precio()
    {
        $producto = Producto::factory()->create(['precio' => 49.99]);
        $this->assertEquals(49.99, $producto->precio);
    }
}
```

## Contribuir

¡Las contribuciones son bienvenidas! Sigue estos pasos:

1. **Forkea el repositorio**.
2. **Crea una rama para tu feature**:
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```
3. **Realiza tus cambios** siguiendo las convenciones de código.
4. **Ejecuta las pruebas**:
   ```bash
   php artisan test
   ```
5. **Commit con mensaje descriptivo**:
   ```bash
   git commit -m "feat: agrega funcionalidad de búsqueda avanzada"
   ```
6. **Push y crea un Pull Request**.

### Estilo de Commits

Usa [Conventional Commits](https://www.conventionalcommits.org/):
- `feat:` para nuevas funcionalidades
- `fix:` para correcciones
- `docs:` para documentación
- `style:` para cambios de estilo

## Resolución de Problemas

### 1. Error de conexión a base de datos
**Problema**: "SQLSTATE[HY000] [2002] Connection refused"
**Solución**: Verifica que MySQL esté corriendo y las credenciales en `.env` sean correctas.

### 2. Assets no se cargan
**Problema**: Estilos o JS no funcionan en producción.
**Solución**: Ejecuta `npm run build` y verifica que `public/build/` tenga los archivos.

### 3. Error 500 en rutas
**Problema**: Página muestra error interno del servidor.
**Solución**: Revisa logs en `storage/logs/laravel.log` y verifica permisos de carpetas.

### 4. Problemas con permisos de storage
**Problema**: No se pueden subir imágenes.
**Solución**:
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.

## Contacto

- **Autor**: [TU_NOMBRE] ([TU_EMAIL])
- **GitHub**: [https://github.com/[TU_USUARIO]/tienda-videojuegos](https://github.com/[TU_USUARIO]/tienda-videojuegos)
- **Issues**: [Reporta bugs aquí](https://github.com/[TU_USUARIO]/tienda-videojuegos/issues)

---

¡Gracias por usar Tienda de Videojuegos! 🎮
