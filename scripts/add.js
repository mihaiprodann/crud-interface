let select = document.getElementById('tables');
select.addEventListener('change', function() {
    let value = this.options[select.selectedIndex].value;
    window.location.replace(window.location.href.split('?')[0] + '?table=' + value);
});

$('select').change(function(){
    var text = $(this).find('option:selected').text()
    var $aux = $('<select/>').append($('<option/>').text(text))
    $(this).after($aux)
    $(this).width($aux.width()+10)
    $aux.remove()
}).change()

