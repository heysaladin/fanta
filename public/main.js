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
    });1
    var glideTestimony = new Glide('.testimony', {
        type: 'carousel',
        animationDuration: 1800,
        autoplay: 7500,
        perView: 1
    });

    glideHero.mount();
    glideTestimony.mount();

});

function openNav() {
    document.getElementById("mySidenav").style.width = "78%";
    if (window.CSS.supports('backdrop-filter', 'blur(25px)')) {
        // console.log("window.CSS support = "+window.CSS.supports('backdrop-filter', 'blur(25px)'));
        // document.getElementById("mySidenav").style.backgroundColor = "rgba(3,0,23,0.64)";
    } else {
        // console.log("window.CSS support = "+window.CSS.supports('backdrop-filter', 'blur(25px)'));
        // document.getElementById("mySidenav").style.backgroundColor = "rgba(3,0,23,0.64)";
        document.getElementById("main").style.filter = "blur(15px)";
    }
}
  
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    // document.getElementById("mySidenav").style.backgroundColor = "rgba(3,0,23,0.64)";
    document.getElementById("main").style.filter = "none";
}