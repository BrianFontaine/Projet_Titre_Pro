let parents = document.querySelector('.SB-elements-require-add');
var i = 1;
function add_block(){
    i++;
    var element = `
        <div class="row ml-1 delete" data-number="${i}" id="div_${i}">
            <input type="text" name="element[${i}][name]" class="form-control col-md-8 rounder disabled_element mb-2 SB-element-phone" placeholder="Elément réstant">
            <input type="number" name="element[${i}][quantity]" class="form-control col-md-2 rounder disabled_element mb-2 mr-2 ml-4 SB-quantity-phone" placeholder="Quantité">
            <input type="button" class="form-control col-md-1 rounder disabled_element mb-2 ml-2 btn-danger SB-button-phone" onclick="delete_block();" Value="Moin">
        </div>`;
    parents.innerHTML+=element;

    document.querySelector('.SB-elements-require-add').insertAdjacentElement("afterend",parents);
}

function delete_block()
{
    let remove = document.querySelector('.delete');
    remove.remove(remove);
    i--;
}