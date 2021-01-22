const bAlta = $('#b_alta')
const bModificar = $('#b_modificar')
const formModificar = $('#form-modificar')
const formAlta = $('#form_alta')



bAlta.click(function () { 
    mostrarAlta(300)
});

bModificar.click(function () { 
    mostrarModificar(300)
});

const mostrarAlta = (ms)=>{
    if(formAlta.hide()){
        formAlta.show(ms)
        formModificar.hide(ms)
    }
}


const mostrarModificar = (ms)=>{
    if(formModificar.hide()){
        formModificar.show(ms)
        formAlta.hide(ms)
    }
}

const setCliente = objeto => {
    let obj = objeto.querySelectorAll('td')

    $('#mod-id').val(obj[0].textContent)
    $('#mod-nombre').val(obj[1].textContent) 
    $('#mod-nombre').removeAttr("disabled")
    $('#mod-dni').val(obj[2].textContent)
    $('#mod-dni').removeAttr("disabled")
    $('#mod_localidades').val(obj[3].dataset.id)
    $('#mod_localidades').removeAttr("disabled")
    if($('#sub_modif').show()){
        $('#sub_modif').hide()
    }

    mostrarModificar()
}
//Metodo que toma los botones para borrar o eliminar

const actionCliente = e => {
    let parent = e.target.parentElement
    setCliente(parent.parentElement)
}

$(".btn-modificar").click(function(e){
    actionCliente(e)
})


$(document).ready(function(){ 


    $(".btn-borrar").click(function(){
        dataid = $(this).data("id")
        if(confirm("Estas seguro de eliminar a cliente ?")){
            $.post("ABM.php", {elimID : dataid},
            function () {
                location.reload()
            });
        }
    })
  
  });





