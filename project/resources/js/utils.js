const { default: axios } = require("axios");

$('.form-destroy').on('submit', function(e){

    e.preventDefault();
    
    let forms =  $(this);

    axios.delete($(this).attr('action'),{
        data: $(this).serialize(),
        method:'DELETE'
    }).then(response => response.json())
    .then(json => {
        alert('Registro removido')
        forms.parents('tr').remove();
    })
});