$(document).ready(function(){
    $('.slider').slick({
        dots:true,
        adaptiveHeight:false,
        slidesToScroll: 1,
        infinite: true,
        speed: 600,
        centerMode: true,
        variableWidth: true,
        slidesToShow: 1,
        responsive: [
            {
            breakpoint: 768,
            settings: {
                centerPadding: '40px',
                slidesToShow: 1
            }
            },
            {
            breakpoint: 480,
            settings: {
                centerPadding: '40px',
                slidesToShow: 1
            }
            }
        ]

    });
});
$(document).ready(function() {
    $('.example2').hide().before('<a href="#" id="toggle-example2" class="button">Показать еще</a>');
    $('a#toggle-example2').click(function() {
        $('.example2').slideToggle("fast");
        return false;
        
        });
});
$(document).ready(function() {
    document.getElementById('toggle-example2').onclick = function() {
        document.getElementById('toggle-example2').hidden = true;
      }
});
$(document).ready(function() {
    $('.example3').hide().before('<a href="#" id="toggle-example3" class="button">Показать еще</a>');
    $('a#toggle-example3').click(function() {
        $('.example3').slideToggle("fast");
        return false;
        
        });
});
$(document).ready(function() {
    document.getElementById('toggle-example3').onclick = function() {
        document.getElementById('toggle-example3').hidden = true;
      }
});
$(document).ready(function(){
    const navOffset = $("#nav").offset().top;
    $(window).scroll(function(){
        const scrolled = $(this).scrollTop();
        if (scrolled > navOffset) {
            $("#wrapper").addClass("nav-fixed");
        } else if (scrolled < navOffset) {
            $("#wrapper").removeClass("nav-fixed");
        }
    })
})

/* МЕНЮ БУРГЕР */

const iconMenu = document.querySelector('.menu__icon');
const headerRow = document.querySelector('.header__row');
if (iconMenu) {
    iconMenu.addEventListener("click", function(e) {
        document.body.classList.toggle('_lock')
        iconSearch.classList.toggle('_disable');
        iconMenu.classList.toggle('_active');
        headerRow.classList.toggle('_active');
    })
}
const iconSearch = document.querySelector('.fa');
const searchFa = document.querySelector('.header__search');
if (iconSearch) {
    iconSearch.addEventListener("click", function(e) {
        document.body.classList.toggle('_lock')
        iconMenu.classList.toggle('_disable');
        iconSearch.classList.toggle('_active');
        searchFa.classList.toggle('_active');
    })
}

/* NAVIGATION */

const menuLinks = document.querySelectorAll('.menu__link[data-goto]');
if (menuLinks.length > 0){
    menuLinks.forEach(menuLink => {
        menuLink.addEventListener("click",onMenuLinkClick);
    });

    
    function onMenuLinkClick(e) {
        const menuLink = e.target;
        if (menuLink.dataset.goto && document.querySelector(menuLink.dataset.goto)){
            const gotoBlock = document.querySelector(menuLink.dataset.goto);
            const gotoBlockValue = gotoBlock.getBoundingClientRect().top + pageYOffset - document.querySelector('header').offsetHeight;

            if(iconMenu.classList.contains('_active')) {
                document.body.classList.remove('_lock');
                iconMenu.classList.remove('_active');
                headerRow.classList.remove('_active');
                iconSearch.classList.remove('_disable');
            }

            window.scrollTo({
                top: gotoBlockValue
            });
            e.preventDefault();
        }
    }
}