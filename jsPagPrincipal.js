const carrito = document.getElementById('carrito');
const elementos1 = document.getElementById('lista-1');
const lista = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');

cargarEventListeners();

function cargarEventListeners() {
    elementos1.addEventListener('click', comprarElemento);
    carrito.addEventListener('click', eliminarElemento);
    vaciarCarritoBtn.addEventListener('click', vaciarCarrito);
}

function comprarElemento(e) {
    e.preventDefault();
    if (e.target.classList.contains('agregar_Carrito')) {
        const elemento = e.target.parentElement.parentElement;
        leerDatosElemento(elemento);
    }
}

function leerDatosElemento(elemento) {
    const infoElemento = {
        imagen: elemento.querySelector('img').src,
        titulo: elemento.querySelector('h3').textContent,
        precio: elemento.querySelector('.precio').textContent,
        id: elemento.querySelector('.agregar_Carrito').getAttribute('data-id')
    }
    insertarCarrito(infoElemento);
}

function insertarCarrito(elemento) {
    const row = document.createElement('tr');
    row.innerHTML = `
    <td>
        <img src="${elemento.imagen}" width="100" />
    </td>
    <td>
        ${elemento.titulo}
    </td>
    <td>
        ${elemento.precio}
    </td>
    <td>
        <a href="#" class="borrar" data-id="${elemento.id}">X</a>
    </td>
    `;
    lista.appendChild(row);
    enviarDatosCarrito(elemento, calcularTotalCarrito(), obtenerFormaEntrega());
}


function enviarDatosCarrito(elemento, montoTotal, formaEntrega) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'guardar_compra.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status === 200) {
            console.log('Producto añadido al carrito');
        }
    }
    const params = `imagen=${encodeURIComponent(elemento.imagen)}&titulo=${encodeURIComponent(elemento.titulo)}&precio=${encodeURIComponent(elemento.precio)}&monto_total=${encodeURIComponent(montoTotal)}&forma_entrega=${encodeURIComponent(formaEntrega)}`;
    xhr.send(params);
}


function eliminarElemento(e) {
    e.preventDefault();
    let elemento,
        elementoId;
    if (e.target.classList.contains('borrar')) {
        e.target.parentElement.parentElement.remove();
        elemento = e.target.parentElement.parentElement;
        elementoId = e.target.getAttribute('data-id');
    }
}

function vaciarCarrito() {
    while (lista.firstChild) {
        lista.removeChild(lista.firstChild);
    }
    return false;
}
// Agrega esta función en tu archivo jsPagPrincipal.js
function verCarrito() {
    // Obtener todos los elementos del carrito
    const elementosCarrito = lista.querySelectorAll('tr');

    // Crear un array para almacenar la información de cada producto
    const productos = [];

    // Iterar sobre cada elemento del carrito y obtener la información del producto
    elementosCarrito.forEach(elemento => {
        const producto = {
            imagen: elemento.querySelector('img').src,
            titulo: elemento.querySelectorAll('td')[1].textContent,
            precio: elemento.querySelectorAll('td')[2].textContent
        };
        productos.push(producto);
    });

    // Calcular el monto total de la compra
    let montoTotal = 0;
    elementosCarrito.forEach(elemento => {
        const precioString = elemento.querySelectorAll('td')[2].textContent;
        const precio = parseFloat(precioString.replace('$', '').replace(',', ''));
        montoTotal += precio;
    });

    // Redireccionar a carrito.php enviando los datos del carrito y el monto total
    window.location.href = `carrito.php?productos=${JSON.stringify(productos)}&monto_total=${montoTotal}`;
}

// Modifica el evento click del enlace "Ver Carrito" para llamar a la función verCarrito
document.querySelector('#carrito a[href="carrito.php"]').addEventListener('click', function(event) {
    event.preventDefault();
    verCarrito();
});

function enviarDatosCarrito(montoTotal, formaEntrega) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'guardar_compra.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status === 200) {
            console.log('Compra guardada exitosamente');
        }
    }
    const params = `monto_total=${encodeURIComponent(montoTotal)}&forma_entrega=${encodeURIComponent(formaEntrega)}`;
    xhr.send(params);
}
document.addEventListener('DOMContentLoaded', function() {
    var openPopupBtn = document.getElementById('openPopup');
    var closePopupBtn = document.getElementById('closePopup');
    var popup = document.getElementById('popup');
  
    openPopupBtn.addEventListener('click', function() {
      popup.style.display = 'block';
    });
  
    closePopupBtn.addEventListener('click', function() {
      popup.style.display = 'none';
    });
  
    var form = document.getElementById('subcategoryForm');
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      var selectedSubcategory = document.querySelector('input[name="subcategory"]:checked').value;
      // Aquí puedes hacer lo que quieras con la subcategoría seleccionada, como enviarla a un servidor o mostrar un mensaje.
      alert('Has seleccionado la subcategoría: ' + selectedSubcategory);
      popup.style.display = 'none'; // Oculta el popup después de enviar el formulario
    });
  });

function enviarDatosProductoAccion(accion, datosProducto) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'proceso_productos.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status === 200) {
            // Después de recibir una respuesta exitosa del servidor, actualizar la lista de productos
            actualizarListaProductos();
        }
    }
    // Enviar la acción y los datos del producto al servidor
    const params = `accion=${encodeURIComponent(accion)}&datosProducto=${JSON.stringify(datosProducto)}`;
    xhr.send(params);
}

// Función para actualizar dinámicamente la lista de productos en la página principal
function actualizarListaProductos() {
    // Realizar una solicitud al servidor para obtener la lista actualizada de productos
    // y actualizar la interfaz de usuario con los nuevos datos
    // Esto implica obtener los datos actualizados de los productos y actualizar la lista en tu página HTML
    // Por ejemplo:
    fetch('obtener_productos.php')
        .then(response => response.json())
        .then(data => {
            // Actualizar la lista de productos en la página HTML con los datos recibidos del servidor
            const listaProductos = document.getElementById('lista-1');
            // Limpiar la lista existente de productos
            listaProductos.innerHTML = '';
            // Iterar sobre los datos recibidos y agregar cada producto a la lista
            data.forEach(producto => {
                const productoHTML = `
                    <div class="product">
                        <img src="${producto.imagen}" alt="${producto.titulo}">
                        <div class="product-txt">
                            <h3>${producto.titulo}</h3>
                            <p>${producto.descripcion}</p>
                            <p class="precio">${producto.precio}</p>
                            <a href="#" class="agregar_Carrito btn-2" data-id="${producto.id}">Agregar al carrito</a>
                        </div>
                    </div>
                `;
                listaProductos.innerHTML += productoHTML;
            });
        })
        .catch(error => console.error('Error al obtener los datos de los productos:', error));
}
