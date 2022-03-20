window.onscroll = function(){
    if (document.documentElement.scrollTop > 100) {
        document.querySelector('.botoncito-container')
        .classList.add('show');
    } else {
        document.querySelector('.botoncito-container')
        .classList.remove('show');
    }

    document.querySelector('.botoncito-container')
    .addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    })
}