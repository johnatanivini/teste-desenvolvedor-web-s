const { default: axios } = require("axios");

$('.form-destroy').on('submit', function(e){

    e.preventDefault();
    
    let forms =  $(this);

    axios.delete($(this).attr('action'),{
        data: $(this).serialize(),
        method: 'DELETE'
    }).then( res =>  {
        if(res.status == 200){
            alert('Registro removido')
            forms.parents('tr').remove();
        }
    })
});

$('#salvar-pedido').on('submit', function(e) {
    e.preventDefault();

    const action = $(this).attr('action')
    let serialize = $(this).serialize()
    let redirect = $('#btn-salvar-form-pedido').data('redirect');

    axios.post(action,serialize).then(res => {

        if(res.status == 200) {
            alert('Pedido salvo!')
            location.href = redirect
            return;
        }

        alert(`Não foi possível salvar o pedido: ${JSON.stringify(res.data)}`);

    })

});

$(document).on('blur', '.buscar-cpf', function(e){
    e.preventDefault();

    const route = $(this).data('route')+'/'+$(this).val()

    axios.get(route).then(res => {

        if(res.status == 200){
            $('#people_id').val(res.data.id);
        }

        if(res.status == 400 || res.status > 400){
            alert('Cpf não encontrado, faça o cadastro do Cliente')
        }
    })

});

$(document).on('click', '.remove-tr', function(e){
    e.preventDefault();

    $(this).parents('tr').remove();

});

const item = [];

$('#add_order_item').on('click', function(e){

    e.preventDefault();

    const barcode = $('#barcode').val();
    const quantity = $('#quantity').val();
    const orders_itens = $('#orders_itens');

    if(barcode == '' || quantity == '') {
        alert('digite o codigo de barras e a quantidade');
        return;
    }

    const route = $(this).data('route')+'/'+barcode

    axios.get(route).then(res => {
        if(res.status == 200){
            
            console.log(res.data)
            const data = res.data
            const htmls = [];
    

            item[data.id] = {
                name: data.name,
                id: data.id,
                unit_price: data.unit_price,
                quantity: quantity
            };

            item.forEach( data => {

                htmls.push(`
                <tr>
                    <td>
                        <input type="hidden" name="orders_itens[${data.id}][product_id]"  value="${data.id}">
                        ${data.name}
                    </td>
                    <td>
                        <input type="text" class="form-control col-sm-1" name="orders_itens[${data.id}][quantity]"  value="${data.quantity}">
                    </td>
                    <td>
                        ${data.unit_price}
                        <input type="hidden" name="orders_itens[${data.id}][unit_price]" value="${data.unit_price}">
                    </td>
                    <td>
                        <button  class="btn btn-sm btn-primary text-light remove-tr">x</button>
                    </td>
                </tr>
            `)
        });
            

            orders_itens.html(htmls.join(''));

        }
    });

});