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

    document.addEventListener('touchstart', onTouchStart, {passive: true});

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


    // getVh();


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

// ---

function getVh() {
    var mainHeader = document.getElementById("main-header");
    var vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
    console.log("mainHeader="+mainHeader);
    console.log("vh="+vh);
    if(vh<=800){
        mainHeader.style.marginTop = "-100px";
    } else {
        mainHeader.style.marginTop = "0";
    }
}