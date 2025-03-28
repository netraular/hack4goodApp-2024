import $ from 'jquery';
import './bootstrap';
import '../css/app.css'; 
import 'datatables.net';
import AOS from 'aos';

window.$ = window.jQuery = $;

// console.log('jQuery loaded:', $);
// console.log('jQuery global:', window.jQuery);

AOS.init({
    duration: 800, // Duración de las animaciones
    once: true, // Animar solo una vez
});

$(document).ready(function() {
    // Inicialización de DataTables
    $('table').DataTable();

    // Inicialización de AOS
});