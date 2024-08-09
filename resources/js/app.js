import $ from 'jquery';
import './bootstrap';
import '../css/app.css'; 

window.$ = window.jQuery = $;

// console.log('jQuery loaded:', $);
// console.log('jQuery global:', window.jQuery);

import 'datatables.net';
import 'bootstrap';

$(document).ready(function() {
    // Inicialización de DataTables
    $('table').DataTable();

    // Inicialización de AOS
    AOS.init();
});