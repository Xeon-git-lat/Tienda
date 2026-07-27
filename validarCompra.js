function validarCompra(){

    let cliente = document.getElementById("cliente").value;
    let producto = document.getElementById("producto").value;
    let cantidad = document.getElementById("cantidad").value;

    if(cliente==""){

        alert("Debe seleccionar un cliente.");

        return false;

    }

    if(producto==""){

        alert("Debe seleccionar un producto.");

        return false;

    }

    if(cantidad<=0){

        alert("La cantidad debe ser mayor que cero.");

        return false;

    }

    return true;

}