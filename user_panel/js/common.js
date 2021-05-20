document.addEventListener("DOMContentLoaded", function(){
    //! Переменные для адаптива
    const htmlMain = $('.user-container-tablet').html();
    const htmlLeft  = $('.user-main-content').html();
    const htmlRight = $('.user-statistics').html(); 
    const newHtml = htmlLeft+htmlRight;
    
    //! Фильтрация елементов
    function filterBlock(){
        //! mixitup
        try {
            $(function () {
                $(".filter__blocks").mixItUp();
            });
        } catch (err) {
            console.log(err);
        };

        //! Активная кнопка
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
    }

    //! Выделение елементов
    function excretionElements(){
    
        let item = document.querySelectorAll(".user-header__item");
        
        for(i=0; i<item.length; i++){
            //! При нажатии мышкой
            item[i].addEventListener("click", function(e){
                //!Два елемента один скрываем другой наоборот
                this.querySelector(".user-header__image").classList.add('hide');
                this.querySelector(".user-header__focus").classList.remove('hide');
                
                //! Проверка что бы не выделялся весь список
                let newCollections = this.closest(".user-header__menu").querySelectorAll(".user-header__item")
                for(let a=0; a<newCollections.length; a++){
                    if (this != newCollections[a]) {
                        
                        newCollections[a].querySelector(".user-header__focus").classList.add('hide')
                        newCollections[a].querySelector(".user-header__image").classList.remove('hide')
                    };
                };
            });
            //! При наведении мышки
            item[i].addEventListener("mouseenter", function(e){
                // e.preventDefault()
                //!Два елемента один скрываем другой наоборот
                this.querySelector(".user-header__image").classList.add('hide');
                this.querySelector(".user-header__focus").classList.remove('hide');
                
                //! Проверка что бы не выделялся весь список
                let newCollections = this.closest(".user-header__menu").querySelectorAll(".user-header__item")
                for(let a=0; a<newCollections.length; a++){
                    if (this != newCollections[a]) {
                        
                        newCollections[a].querySelector(".user-header__focus").classList.add('hide')
                        newCollections[a].querySelector(".user-header__image").classList.remove('hide')
                    };
                };
            });
            //! Cобытие нажатие на пустое место
            document.body.addEventListener("click", function(e){
                //! если событие нажатия вне блока, то ...
                if (!e.target.closest('.user-header__menu')) {
                    let menuItemsCollections = document.querySelectorAll(".user-header__menu .user-header__item")
                    
                    for(let i=0; i<menuItemsCollections.length; i++){
                    
                        menuItemsCollections[i].querySelector(".user-header__focus").classList.add('hide')
                        menuItemsCollections[i].querySelector(".user-header__image").classList.remove('hide')
                    };
                };
            });      
        }; 
        
    };

    filterBlock();
    excretionElements();

    //! Адаптивность
    $(window).resize(function() {
        let windowWidth = $(window).width();
        if (windowWidth < 1060) {
            $('.user-container-tablet').empty().html(newHtml);
            filterBlock();
            //! Переменные для бургера
            let btnBurger = $(".user-search__burger-box");
            let burger = $(".user-header");
            let burgerClose = $(".user-header__close");
            //! Бургер
            btnBurger.on("click", function(){
                burger.addClass('open');
            });
            //! Закрытие окна
            burgerClose.on("click", function(){
                burger.removeClass('open');
            });

            excretionElements();
        }else{
            $('.user-container-tablet').html(htmlMain);
            filterBlock();
        } 
    });

});

