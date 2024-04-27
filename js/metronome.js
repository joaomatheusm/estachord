const btn = document.querySelector('#metronome-btn');
const bpm_input = document.querySelector('#bpm');

const ctx = new AudioContext();
let audio;

fetch('/sounds/drum-stick.mp3')
    .then(data => data.arrayBuffer())
    .then(arrayBuffer => ctx.decodeAudioData(arrayBuffer))
    .then(decodedAudio => {
        audio = decodedAudio;
    })

function playback() {
    const playSound = ctx.createBufferSource();
    playSound.buffer = audio;
    playSound.connect(ctx.destination);
    playSound.start(ctx.currentTime);
}

function calcInterval(bpm) {
    const bps = bpm / 60;
    const secondsInterval = 1 / bps;
    const millisecondsInterval = secondsInterval * 1000;

    return millisecondsInterval;
}

let metronomeInterval;

btn.addEventListener('click', () => {
    clearInterval(metronomeInterval);
    metronomeInterval = setInterval(playback, calcInterval(bpm_input.value));
});