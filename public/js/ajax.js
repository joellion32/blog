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


function guardarCarrousel(data){
var titulo = data.titulo;
var imagen = data.imagen;

$.post("http://127.0.0.1:8000/save/carrousel", {titulo, imagen},
    function (data, textStatus, jqXHR) {
        console.log(data);
    },
);
}
  



