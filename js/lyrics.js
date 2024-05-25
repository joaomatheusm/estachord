const artistInput = document.querySelector('#artistName');
const songInput = document.querySelector('#songName');
const form = document.querySelector('#lyricsForm');
const output = document.querySelector('.lyrics-output pre');
const btn = document.querySelector('.fetchBtn');
const loading = document.querySelector('.loading');
const lyricsOutput = document.querySelector('.lyrics-output');

function checkSongFound(data) {
    if (data.lyrics) {
        output.innerHTML = data.lyrics.replace('Paroles de la chanson', 'Letra da música').replace('par', 'de');
    } else {
        output.innerHTML = `Nenhuma letra encontrada para os dados inseridos.`;
    }
}

btn.addEventListener('click', () => {
    if (artistInput.value !== '' && songInput.value !== '') {
        loading.style.opacity = '1';

        fetch(`https://api.lyrics.ovh/v1/${artistInput.value}/${songInput.value}`)
            .then(response => response.json())
            .then(data => {
                checkSongFound(data);
                loading.style.opacity = '0';
                lyricsOutput.style.opacity = '1';
            })
            .catch(error => {
                console.error('Erro ao carregar as letras: ', error);
                output.innerHTML = 'Erro ao carregar as letras. Verifique sua conexão ou tente novamente mais tarde.';
                loading.style.opacity = '0';
                lyricsOutput.style.opacity = '1';
            });
    }
});
