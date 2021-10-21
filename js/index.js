
function somar() {

    let iptUn = document.getElementById("valor_unitario");
    let inpQt = document.getElementById("quantidade");
    let inpTl = document.getElementById("total");

    if (inpQt.value != "" && iptUn.value != "") {
        let total = inpQt.value * iptUn.value
        inpTl.value = total
    }
}

$(document).ready(function() {
    $('#cpf-client').mask('000.000.000-00', {reverse: true});
    $('#cod').mask('0000000000000', {reverse: true});

    //validação form cliente
    $("#btn-client").on('click', function(){
        if( $("#name-client").val() == ""){
            alert('Preencha o nome do cliente');
            return false;
        } else if( $("#cpf-client").val() == ""){
            alert('Preencha o cpf');
            return false;
        } else if( $("#cpf-client").val().length < 14){
            alert('O cpf deve conter 11 números');
            return false;
        } else if( $("#email-client").val() == ""){
            alert('Preencha o email');
            return false;
        } 
    })

    //validação form produto
    $("#btn-product").on('click', function(){
        if( $("#product-name").val() == ""){
            alert('Preencha o nome do produto');
            return false;
        } else if( $("#cod").val() == ""){
            alert('Preencha o código de barras');
            return false;
        }else if( $("#cod").val().length < 13){
            alert('O código de barras deve conter 13 números');
            return false;
        } else if( $("#uni-valor").val() == ""){
            alert('Preencha o valor do produto');
            return false;
        } 
    })

    //validação form pedido
    $("#btn-order").on('click', function(){
        if( $("#select-client").val() == "Selecione"){
            alert('Selecione o cliente');
            return false;
        } else if( $("#select-product").val() == "Selecione"){
            alert('Selecione o produto');
            return false;
        } else if( $("#valor_unitario").val() == ""){
            alert('Preencha o valor do produto');
            return false;
        } else if( $("#quantidade").val() == ""){
            alert('A quantidade tem que ser maior que 0');
            return false;
        } else if( $("#total").val() == ""){
            alert('O total tem que ser maior que 0');
            return false;
        } 
    })

    $("#migration").on('click', function(){
        var aler = confirm("deseja realizar a migração?")

        if (aler){
            window.location.href = "./migration/migration.php"
        } else {
            console.log('deu tiuti')
        }
    })

});

$(function(){
    //Deletar cliente
    $( document ).delegate( ".delete_client",'click', function(event){
        event.preventDefault();
        var id = $(this).attr('data-id');
        $("#_deletar_client").attr('data-id', id);
    });

    $( document ).delegate( "#_deletar_client",'click', function(){
        var id  = $(this).attr('data-id');
        location.href="/client/deleteClient.php?id="+id;
    })

    //Deletar produto
    $( document ).delegate( ".delete_product",'click', function(event){
        event.preventDefault();
        var id = $(this).attr('data-id');
        $("#_deletar_product").attr('data-id', id);
    });

    $( document ).delegate( "#_deletar_product",'click', function(){
        var id  = $(this).attr('data-id');
        location.href="/products/deleteProduct.php?id="+id;
    })

      //Deletar pedido
      $( document ).delegate( ".delete_order",'click', function(event){
        event.preventDefault();
        var np = $(this).attr('data-id');
        $("#_deletar_order").attr('data-id', np);
    });

    $( document ).delegate( "#_deletar_order",'click', function(){
        var np  = $(this).attr('data-id');
        location.href="/orders/deleteOrder.php?numero_pedido="+np;
    })
});