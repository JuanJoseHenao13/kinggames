import './bootstrap';
import '../css/app.css';
import Swal from 'sweetalert2';
import './sweetalert';
import './transacciones-filters';

// 🌀 Swiper (bundle ya incluye todos los módulos: Navigation, Pagination, Autoplay, etc.)
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// Hacer disponibles globalmente
window.Swal = Swal;
window.Swiper = Swiper;
