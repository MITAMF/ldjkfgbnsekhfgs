// Función para ordenar la tabla por una columna específica
$(document).ready(function() {
    // Cuando el documento esté completamente cargado, se ejecuta esta función
    $("th").click(function() {
        // Cuando se hace clic en un encabezado de columna , se ejecuta esta función
        var columna = $(this).data("columna"); // Obtiene el nombre de la columna desde el atributo de datos "data-columna"
        var tabla = $(this).closest("table"); // Encuentra la tabla más cercana al encabezado de columna (this)
        var filas = tabla.find("tbody > tr").toArray().sort(compararFilas($(this).index())); // Obtiene todas las filas de la tabla, las convierte en un array y las ordena según la columna clicada
        this.asc = !this.asc; // Cambia el estado de orden ascendente/descendente de la columna clicada
        if (!this.asc) { // Si es orden descendente
            filas = filas.reverse(); // Invierte el orden de las filas
        }
        tabla.children("tbody").empty().append(filas); // Vacía el cuerpo de la tabla y añade las filas ordenadas
    });
});

// Función para comparar filas basada en el contenido de una columna
function compararFilas(index) {
    // Devuelve una función de comparación personalizada para las filas, basada en el índice de la columna
    return function(a, b) {
        var valA = obtenerValorCelda(a, index); // Obtiene el valor de la celda de la fila a comparar (a)
        var valB = obtenerValorCelda(b, index); // Obtiene el valor de la celda de la fila a comparar (b)
        // Compara los valores de las celdas y devuelve el resultado de la comparación
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB);
    };
}

// Función para obtener el valor de una celda en una fila
function obtenerValorCelda(row, index) {
    // Obtiene el valor de la celda en la posición dada (index) de la fila especificada (row)
    return $(row).children("td").eq(index).text();
}
