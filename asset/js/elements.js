let parents = document.querySelector('.SB-elements-require-add');
var i = 1;
function add_block(){
    i++;
    //     var childDiv = document.createElement('div');
    //     childDiv.className="row justify-content-center col-md-12 child";
    //     parents.appendChild(childDiv);

    //     let inputElementsNames = document.createElement('input');
    //     inputElementsNames.className="form-control col-md-8 rounder disabled_element mb-2";
    //     inputElementsNames.setAttribute('name','element[i][name]);
    //     inputElementsNames.placeholder=('Elements Restants...');
    //     childDiv.appendChild(inputElementsNames);

    //     let inputElementsQte = document.createElement('input');
    //     inputElementsQte.className="form-control col-md-2 rounder disabled_element mb-2 ml-3";
    //     inputElementsQte.setAttribute('name','element[i][quantity]');
    //     inputElementsQte.setAttribute('type','number');
    //     inputElementsQte.placeholder=('Qté');
    //     childDiv.appendChild(inputElementsQte);

    //     let inputElementsQte2 = document.createElement('input');
    //     inputElementsQte2.className="form-control col-md-1 rounder disabled_element mb-2 ml-2 btn btn-danger";
    //     inputElementsQte2.setAttribute('onclick','delete_block();')
    //     inputElementsQte2.setAttribute('type','button');
    //     inputElementsQte2.value='X';
    //     childDiv.appendChild(inputElementsQte2);
    var element = `
        <div class="row ml-1 delete" data-number="${i}" id="div_${i}">
            <input type="text" name="element[${i}][name]" class="form-control col-md-8 rounder disabled_element mb-2" placeholder="Elément réstant">
            <input type="number" name="element[${i}][quantity]" class="form-control col-md-2 rounder disabled_element mb-2 mr-2 ml-4" placeholder="Quantité">
            <input type="button" class="form-control col-md-1 rounder disabled_element mb-2 ml-2 btn-danger" onclick="delete_block();" Value="Moin">
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