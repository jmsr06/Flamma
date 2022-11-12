const selectall = document.getElementById('selectall');
const cases = document.querySelectorAll('.case');
selectall.addEventListener('click', () => {
    if (selectall.checked) {
        cases.forEach(caso => {
            caso.checked = true;
        })

    } else {
        cases.forEach(caso => {
            caso.checked = false;
        })
    }
})
cases.forEach(caso => {
    caso.addEventListener('click', () => {
        if (caso.checked) {
            if (document.querySelectorAll('.case').length == document.querySelectorAll('.case:checked').length) {
                selectall.checked = true;
            }
        } else {
            selectall.checked = false;
        }
    })
})