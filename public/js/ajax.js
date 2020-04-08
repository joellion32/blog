
// para el primer carrousel
function carrousel(id){
    console.log(id);
    $.ajax({
        type: "GET",
        url: `http://127.0.0.1:8000/carrousel/${id}`,
        dataType: "JSON",
        success: function (response) {
            Swal.fire('Portada actualizada correctamente');

            // para guardar la data
            var data = response;
            guardarCarrousel(data);
        }
    });
}


// para el segundo carrousel
function carrousel2(id){
    console.log(id);
    $.ajax({
        type: "GET",
        url: `http://127.0.0.1:8000/carrousel/${id}`,
        dataType: "JSON",
        success: function (response) {
            Swal.fire('Portada actualizada correctamente');

            // para guardar la data
            var data = response;
            guardarCarrouse2(data);
        }
    });
}


function guardarCarrousel(data){
var titulo = data.titulo;
var imagen = data.imagen;

$.post("http://127.0.0.1:8000/save/carrousel", {titulo, imagen},
    function (data, textStatus, jqXHR) {
        console.log(data);
    },
);
}



function guardarCarrouse2(data){
var titulo = data.titulo;
var imagen = data.imagen;

$.post("http://127.0.0.1:8000/save/carrousel2", {titulo, imagen},
    function (data, textStatus, jqXHR) {
        console.log(data);
    },
);
}
  


// pintar corrousel en pantalla
// carrousel
$.ajax({
    type: "GET",
    url: "http://127.0.0.1:8000/carrousel2",
    dataType: "JSON",
    success: function (response) {
        console.log(response);
        var data = response.data;
        if (data[0].imagen) {
        $("#slide").append(`<div class="carousel-item active">
        <div class="carousel-caption">
            <h3>${data[0].titulo}
            </h3>
        </div>
    </div>

    <style>
    .carousel-item {
       background: -webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/uploads/${data[0].imagen}) no-repeat;
       background: -moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/uploads/${data[0].imagen}) no-repeat;
       background: -ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/uploads/${data[0].imagen}) no-repeat;
       background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/uploads/${data[0].imagen}) no-repeat;
       background-size: cover;
   }
    </style>
    `);
    } else {
        $("#slide").append(`<div class="carousel-item active">
        <div class="carousel-caption">
            <h3>${data[0].titulo}
            </h3>
        </div>
    </div>

    <style>
    .carousel-item {
       background: -webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/images/noimagen.png) no-repeat;
       background: -moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/images/noimagen.png) no-repeat;
       background: -ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/images/noimagen.png) no-repeat;
       background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/images/noimagen.png) no-repeat;
       background-size: cover;
   }
    </style>
    `);
    }
    }
});

