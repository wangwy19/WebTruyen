document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.Btn-Reset').addEventListener('click', function () {
        document.querySelectorAll('.Filter-Comic input[type="checkbox"]').forEach(function (checkbox) {
            checkbox.checked = false;
        });

        document.querySelectorAll('.Filter-Comic input[type="radio"]').forEach(function (radio) {
            radio.checked = false;
        });
        const defaultRadio = document.querySelector('#newComics');
        if (defaultRadio) {
            defaultRadio.checked = true;
        }

        const textInput = document.querySelector('#comicName');
        if (textInput) {
            textInput.value = '';
        }
    });
});
