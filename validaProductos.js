function validarProducto(){

    let nombre=document.getElementById("nombre").value.trim();
    let descripcion=document.getElementById("descripcion").value.trim();
    let precio=document.getElementById("precio").value;
    let stock=document.getElementById("stock").value;

    if(nombre=="" || descripcion==""){

        alert("Todos los campos son obligatorios.");

        return false;

    }

    if(precio<=0){

        alert("El precio debe ser mayor que cero.");

        return false;

    }

    if(stock<0){

        alert("El stock no puede ser negativo.");

        return false;

    }

    return true;

}