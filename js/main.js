// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);

// We listen to the resize event
window.addEventListener('resize', () => {
    // We execute the same script as before
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
});
$(document).ready(function () {
    $(".menu-toggler").click(function () {
        $(this).toggleClass("open");
        $(".navbar").toggleClass("open");
        $("body").toggleClass("open");
    });

    $(".nav-link").click(function () {
        $(".menu-toggler").removeClass("open");
        $(".navbar").removeClass("open");
        $("body").removeClass("open");
    });
    
    $(".js-input").keyup(function () {
        if ($(this).val()) {
            $(this).addClass("not-empty");
        } else {
            $(this).removeClass("not-empty");
        }
    });
});