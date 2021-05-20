document.addEventListener("DOMContentLoaded",function(){

    // mobile-menu
    try {
        mobBtnOpen = document.querySelector(".mobile-open");
        menu = document.querySelector(".mobile-menu");
        mobBtnClose = document.querySelector(".mobile-menu__btn");

        mobBtnOpen.addEventListener("click", function () {
            menu.className += " mobile-menu--active";
        });
        mobBtnClose.addEventListener("click", function () {
            console.log(menu.className);
            menu.className = "mobile-menu";
        });
        
        
    } catch (err) {
        console.log(err);
    };

// mixitup
    try {
        $(function () {
            $(".filter__blocks").mixItUp();
        });
    } catch (err) {
        console.log(err);
    };
    


    // Активная кнопка
    try {
    let btnContainer = document.querySelector(".filter__controls");
    let btns = btnContainer.getElementsByClassName("filter__button");

    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            let current = document.getElementsByClassName("filter__button--active");
            current[0].className = current[0].className.replace(" filter__button--active", "");
            this.className += " filter__button--active";
            });
        };
    } catch (err) {
        console.log(err);
    };

});