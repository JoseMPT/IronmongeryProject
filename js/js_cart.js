
    var formulario = document.getElementById('form_cart');

    document.getElementById('edit').addEventListener('click', (e) => {
    e.preventDefault()

    formulario.setAttribute('action', 'https://www.sandbox.paypal.com/cgi-bin/webscra');
    formulario.submit();
})

    document.getElementById('delete').addEventListener('click', (e) => {
    e.preventDefault();

    formulario.setAttribute('action', 'borrar.php');
    formulario.submit();
})
