const artistInput = document.querySelector('#artistName');
const songInput = document.querySelector('#songName');
const form = document.querySelector('#lyricsForm');
const output = document.querySelector('.lyrics-output pre'); 
const btn = document.querySelector('.fetchBtn');
const loading = document.querySelector('.loading');

btn.addEventListener('click', () => {
    // Verifica se os campos não estão vazios
    if(artistInput.value !== '' && songInput.value !== '') {
        // Mostra o elemento de carregamento
        loading.style.opacity = '1';

        // Busca os dados da API usando o nome do artista e da música dos campos de entrada
        fetch(`https://api.lyrics.ovh/v1/${artistInput.value}/${songInput.value}`)
        .then(response => response.json())
        .then(data => {
            // Se a resposta não for igual a 'undefined' as letras são encontradas
            if(data.lyrics !== undefined) {
                output.innerHTML = data.lyrics;
            } else {
                output.innerHTML = `Nenhuma letra encontrada para os dados inseridos.`;
            }
            // Oculta o elemento de carregamento
            loading.style.opacity = '0';
            document.querySelector('.lyrics-output').style.opacity = '1';
        })
        .catch(error => {
            console.error('Erro ao carregar as letras: ', error);
            output.innerHTML = 'Erro ao carregar as letras. Verifique sua conexão ou tente novamente mais tarde.';
            loading.style.opacity = '0';
            document.querySelector('.lyrics-output').style.opacity = '1';
        });
    }
});
