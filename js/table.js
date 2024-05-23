const input = document.querySelector('#table-search');
const searchIcon = document.querySelector('#search-icon');
const td = document.querySelectorAll('td');

searchIcon.addEventListener('click', () => {
    td.forEach(element => {
        element.classList.remove('highlight');

        const songName = element.firstChild.nextSibling.childNodes[3].childNodes[1].innerHTML.toLowerCase();
        if (songName === input.value) {
            element.classList.add('highlight');
        }
    });
});
