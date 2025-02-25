document.addEventListener('DOMContentLoaded', function () {
    let btn_pre = document.getElementById('btnPre');
    let btn_next = document.getElementById('btnNext');

    btn_pre.addEventListener('click', function () {
        let slide_list = document.querySelector('.Slide-List');

        if (slide_list.children.length > 5) {

            slide_list.style.transition = '0.35s ease';
            slide_list.style.transform = 'translateX(20%)';



            setTimeout(() => {
                slide_list.insertBefore(slide_list.lastElementChild, slide_list.firstElementChild);
                slide_list.style.transition = 'none'
                slide_list.style.transform = 'translateX(0)'

                let item1 = slide_list.firstElementChild;
                item1.style.opacity = '0';
                item1.style.transition = 'none';
                item1.style.height = '0';

                setTimeout(() => {
                    item1.style.opacity = '1';
                    item1.style.height = '100%';
                    item1.style.transition = '0.3s ease';
                }, 100)

            }, 300);
        }
    })

    btn_next.addEventListener('click', function () {
        let slide_list = document.querySelector('.Slide-List');

        if (slide_list.children.length > 5) {

            slide_list.style.transition = '0.35s ease'
            slide_list.style.transform = 'translateX(-20%)'

            setTimeout(() => {
                slide_list.appendChild(slide_list.firstElementChild);
                slide_list.style.transition = 'none'
                slide_list.style.transform = 'translateX(0)'

                let item5 = slide_list.children[4];
                item5.style.opacity = '0';
                item5.style.transition = 'none';
                item5.style.height = '0';

                setTimeout(() => {
                    item5.style.opacity = '1';
                    item5.style.height = '100%';
                    item5.style.transition = '0.2s ease';
                }, 100)

            }, 300);
        }
    })

})