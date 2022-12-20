document.addEventListener('DOMContentLoaded', (e) => {
    checkNavScroll();

    document.addEventListener('scroll', (e) => {
        checkNavScroll();
    })

    function checkNavScroll() {
        let screenWidth = document.querySelector('body').clientWidth;
        if (screenWidth > 976) {
            if(window.scrollY > 30){
                document.getElementById('nav-general').classList.add('nav-bg');
            } else {
                document.getElementById('nav-general').classList.remove('nav-bg');
            }
        }
    }


})