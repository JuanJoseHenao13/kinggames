// SweetAlert2 functionality for admin panel
document.addEventListener('DOMContentLoaded', function() {
    // Handle delete form confirmations with SweetAlert2
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer. El producto será eliminado permanentemente.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    background: '#ffffff',  // Cambiado a color sólido blanco
                    color: '#000000',       // Texto negro para contraste
                    customClass: {
                        popup: 'rounded-2xl shadow-2xl',
                        confirmButton: 'px-6 py-3 rounded-xl font-bold',
                        cancelButton: 'px-6 py-3 rounded-xl font-bold'
                    }
                }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Eliminando...',
                        text: 'Por favor espera mientras se elimina el producto.',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit the form
                    form.submit();
                }
            });
        });
    });

    // Handle success messages
    const successMessage = document.querySelector('[data-success-message]');
    if (successMessage) {
        Swal.fire({
            title: '¡Éxito!',
            text: successMessage.dataset.successMessage,
            icon: 'success',
            confirmButtonColor: '#10b981',
            background: '#ffffff',  // Cambiado a color sólido blanco
            color: '#000000',       // Texto negro para contraste
            customClass: {
                popup: 'rounded-2xl shadow-2xl',
                confirmButton: 'px-6 py-3 rounded-xl font-bold'
            }
        });
    }

    // Handle error messages
    const errorMessage = document.querySelector('[data-error-message]');
    if (errorMessage) {
        Swal.fire({
            title: 'Error',
            text: errorMessage.dataset.errorMessage,
            icon: 'error',
            confirmButtonColor: '#ef4444',
            background: '#ffffff',  // Cambiado a color sólido blanco
            color: '#000000',       // Texto negro para contraste
            customClass: {
                popup: 'rounded-2xl shadow-2xl',
                confirmButton: 'px-6 py-3 rounded-xl font-bold'
            }
        });
    }
});
