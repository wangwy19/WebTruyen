

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('chapterNumber').addEventListener('click', function () {
        let select_chapters = document.getElementById('selectChapters');
        if (select_chapters.style.height != '200px') {

            select_chapters.style.height = '200px';
            for (let child of select_chapters.children) {
                child.style.display = 'block';
            }
        } else {

            for (let child of select_chapters.children) {
                child.style.display = 'none';
            }
            select_chapters.style.height = '0px';
        }
    });


    //cuon ngang tu dong
    let scroll_by_right = document.getElementById('scrollByRight');
    let scroll_by_left = document.getElementById('scrollByLeft');
    let scroll_by_right2 = document.getElementById('scrollByRight2');
    let scroll_by_left2 = document.getElementById('scrollByLeft2');
    let select_options = document.getElementById('selectOptions');

    scroll_by_right.addEventListener('click', function () {

        smoothScrollBy(select_options, select_options.scrollLeft + select_options.clientWidth, 0, 500)


        // select_options.scrollBy({
        //     left: select_options.clientWidth,
        //     behavior: 'smooth',
        // });
    });
    scroll_by_left.addEventListener('click', function () {

        smoothScrollBy(select_options, select_options.scrollLeft - select_options.clientWidth, 0, 500)

        // select_options.scrollBy({
        //     left: -select_options.clientWidth,
        //     behavior: 'smooth',
        // });
    });
    scroll_by_right2.addEventListener('click', function () {
        smoothScrollBy(select_options, (select_options.scrollLeft + select_options.clientWidth * 2), 0, 500)



    });
    scroll_by_left2.addEventListener('click', function () {
        smoothScrollBy(select_options, (select_options.scrollLeft - 2 * select_options.clientWidth), 0, 500)



    });


    let lastScroll = 0;
    function StickyScroll() {

        let section_root = document.getElementById('stickySection');
        let sticky_section = document.getElementById('controlChapter');

        let rect = section_root.getBoundingClientRect();

        console.log(rect.top)

        if (rect.top > 0) {
            sticky_section.classList.remove('Sticky-Section');
        }
        else {
            sticky_section.classList.add('Sticky-Section');

            if (rect.top > lastScroll) {
                sticky_section.classList.add('Opacity-Section');
            }
            else {
                sticky_section.classList.remove('Opacity-Section');
            }


            lastScroll = rect.top;



        }
    }
    window.addEventListener('scroll', StickyScroll);

    let sticky_section = document.getElementById('controlChapter');
    sticky_section.addEventListener('mouseover', function () {
        sticky_section.classList.add('Opacity-Section');
    })


});