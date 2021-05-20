const menu = document.querySelector(".hamburger");
const mobile = document.querySelector(".mobile__menu-list");
const subtitle = document.querySelector(".content__subtitle");
const field = document.querySelectorAll(".field");

/*
    Проверка на наличие класса is-active.
*/
function menuMobile(){
    if(menu.classList.contains('is-active')) {
        mobile.style.right = 0;
        subtitle.style.paddingTop = "120px";
    }else{
        mobile.style.right = "-100%";
        subtitle.style.paddingTop = "60px";
    }
}

//  событие на кнопку мобильного меню
menu.addEventListener("click", function(){
    menu.classList.toggle("is-active");
    menuMobile();
});


