const del = document.querySelectorAll('.delete')

del.forEach(element => {
    element.addEventListener('click', () => {
        let check = confirm("Estas seguro que quieres eliminar?")
        if (check) {
            let url = element.getAttribute('attr-url')
            location.href = url
        }
    });
});
