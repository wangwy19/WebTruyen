document.addEventListener('DOMContentLoaded', function () {
    let avatar = document.getElementById('avatar');
    let inputAvatar = document.getElementById('inputAvatar');
    avatar.addEventListener('click', function () {
        inputAvatar.click();
    })

    inputAvatar.addEventListener('change', function () {

        let submitAvatar = document.getElementById('submitAvatar');
        submitAvatar.classList.add('Appearance');

        if (this.files[0]) {

            avatar.src = URL.createObjectURL(this.files[0]);
        }
    })

});