let select = document.getElementById('tables');
select.addEventListener('change', function() {
    let value = this.options[select.selectedIndex].value;
    window.location.replace(window.location.href.split('?')[0] + '?table=' + value);
});

