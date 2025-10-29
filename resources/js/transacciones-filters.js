document.addEventListener('DOMContentLoaded', function () {
    const usuarioSearch = document.getElementById('usuario_search');
    const usuarioSelect = document.getElementById('usuario_id');
    const productoSearch = document.getElementById('producto_search');
    const productoSelect = document.getElementById('producto_id');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let usuarioTimeout;
    let productoTimeout;

    function debounce(func, wait) {
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(window[func.name + 'Timeout']);
                func(...args);
            };
            clearTimeout(window[func.name + 'Timeout']);
            window[func.name + 'Timeout'] = setTimeout(later, wait);
        };
    }

    const searchUsuarios = debounce(function(query) {
        if (query.length < 2) {
            Array.from(usuarioSelect.options).forEach(option => {
                option.style.display = '';
            });
            return;
        }
        fetch(`/transacciones/search-usuarios?q=${encodeURIComponent(query)}`, {
            headers: {
                'Accept': 'application/json'
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                usuarioSelect.innerHTML = '<option value="">Todos los usuarios</option>';
                data.forEach(usuario => {
                    const option = document.createElement('option');
                    option.value = usuario.id_usuario;
                    option.textContent = usuario.nombre;
                    usuarioSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching usuarios:', error);
            });
    }, 300);

    const searchProductos = debounce(function(query) {
        if (query.length < 2) {
            Array.from(productoSelect.options).forEach(option => {
                option.style.display = '';
            });
            return;
        }
        fetch(`/transacciones/search-productos?q=${encodeURIComponent(query)}`, {
            headers: {
                'Accept': 'application/json'
            }
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                productoSelect.innerHTML = '<option value="">Todos los productos</option>';
                data.forEach(producto => {
                    const option = document.createElement('option');
                    option.value = producto.id_producto;
                    option.textContent = producto.nombre;
                    productoSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching productos:', error);
            });
    }, 300);

    if (usuarioSearch) {
        usuarioSearch.addEventListener('input', function () {
            const query = usuarioSearch.value.trim();
            searchUsuarios(query);
        });
    }

    if (productoSearch) {
        productoSearch.addEventListener('input', function () {
            const query = productoSearch.value.trim();
            searchProductos(query);
        });
    }
});
