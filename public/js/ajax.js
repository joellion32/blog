function carrousel(id){
    console.log(id);
    $.ajax({
        type: "GET",
        url: `http://127.0.0.1:8000/carrousel/${id}`,
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            localStorage.setItem('lista', JSON.stringify(response));
            Swal.fire('Portada actualizada correctamente');
        }
    });
}