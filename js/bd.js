
const table = document.getElementById('select');
const nameTable = document.getElementById('name');
const price = document.getElementById('price');

if (table.value == 'null') {
    nameTable.setAttribute('readonly', '');
    price.setAttribute('readonly', '');
    nameTable.setAttribute('placeholder', 'Недоступно');
    price.setAttribute('placeholder', 'Недоступно');
    nameTable.value = price.value = '';
}

table.addEventListener('change', (e) => {
    if (e.target.value == 'teacher_rank') {
        nameTable.setAttribute('readonly', '');
        price.setAttribute('readonly', '');
        nameTable.setAttribute('placeholder', 'Недоступно');
        price.setAttribute('placeholder', 'Недоступно');
        nameTable.value = price.value = '';
    } else if (e.target.value == 'student_course') {
        nameTable.setAttribute('readonly', '');
        price.setAttribute('readonly', '');
        nameTable.setAttribute('placeholder', 'Недоступно');
        price.setAttribute('placeholder', 'Недоступно');
        nameTable.value = price.value = '';
    } else if (e.target.value == 'teacher_rank') {
        nameTable.setAttribute('readonly', '');
        price.setAttribute('readonly', '');
        nameTable.setAttribute('placeholder', 'Недоступно');
        price.setAttribute('placeholder', 'Недоступно');
        nameTable.value = price.value = '';
    } else if (e.target.value == 'null') {
        nameTable.setAttribute('readonly', '');
        price.setAttribute('readonly', '');
        nameTable.setAttribute('placeholder', 'Недоступно');
        price.setAttribute('placeholder', 'Недоступно');
        nameTable.value = price.value = '';
    }  else if (e.target.value == 'courses') {
        nameTable.removeAttribute('readonly', '');
        nameTable.setAttribute('placeholder', 'Введите имя');
        price.removeAttribute('readonly', '');
        price.setAttribute('placeholder', 'Введите число');
    } 
    else {
        nameTable.removeAttribute('readonly', '');
        nameTable.setAttribute('placeholder', 'Введите имя');
        price.setAttribute('readonly', '');
        price.setAttribute('placeholder', 'Недоступно');
        nameTable.value = price.value = '';
    }
})