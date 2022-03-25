window.addEventListener('load', function(){

    // new Glider(document.querySelector('.glider'), {
    //     slidesToShow: 1,
    //     dots: '#dots',
    //     draggable: true,
    //     arrows: {
    //       prev: '.glider-prev',
    //       next: '.glider-next'
    //     }
    // });

    var glideHero = new Glide('.hero', {
        // type: 'carousel',
        // animationDuration: 1800,
        // autoplay: 4500,
        // focusAt: '1',
        // startAt: 3,
        // perView: 1, 
        type: 'carousel',
        animationDuration: 1800,
        autoplay: 7500,
        perView: 1
    });
    var glideTestimony = new Glide('.testimony', {
        type: 'carousel',
        animationDuration: 1800,
        autoplay: 7500,
        perView: 1
    });

    glideHero.mount();
    glideTestimony.mount();

});