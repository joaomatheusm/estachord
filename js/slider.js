const allRadios = [...document.querySelectorAll('.radio')];

function moveSlide() {
    count++;

    if (count > 4) {
        count = 1;
    }

    allRadios[count - 1].checked = true;
}

allRadios[0].checked = true;

const interval = 6000;
let count = 1;
let sliderInterval = setInterval(moveSlide, interval);

allRadios.forEach((element, index) => {
    element.addEventListener('click', () => {
        count = index + 1;
        clearInterval(sliderInterval);

        sliderInterval = setInterval(moveSlide, interval);
    });
});
