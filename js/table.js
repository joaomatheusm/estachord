const input = document.querySelector('#table-search');
const table = document.querySelector('table');
const tr = table.querySelector('tr');
let td = [...tr.getElementsByTagName('td')];
const searchIcon = document.querySelector('#search-icon');

searchIcon.addEventListener('click', () => {
    td.forEach(element => {
        element.classList.remove('highlight');
    });
    
    for (let i = 0; i < td.length; i++) {
        if (td[i]) {
            const cellText = td[i].firstChild.nextSibling.childNodes[3].childNodes[1].innerHTML.toLowerCase();
            if (cellText === input.value) {
                td[i].classList.add('highlight');
            }
        }
    }
});
