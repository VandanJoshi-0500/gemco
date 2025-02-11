$(document).ready(function(){

  $(window).scroll(function(){

      $val = $(window).scrollTop();

      if($val > 150){

         $('header').addClass('fixed');

         $('.artha-header-logo').addClass('header-top');

      }else{

        $('header').removeClass('fixed');

        $('.artha-header-logo').removeClass('header-top');

      }

  })

})









jQuery('#artha-banner-slider').owlCarousel({

  loop: true,

  margin: 0,

  nav: false,

  dots: false,

  autoplay:true,

  mouseDrag: true,

  touchDrag: true,

  autoplayTimeout:7000,

  smartSpeed: 4000,

  navText: [

    '<i class="fas fa-angle-left"></i>',

    '<i class="fas fa-angle-right"></i>'

  ],

  responsive: {

    0: {

      items: 1

    },

    600: {

      items: 1

    },

    1000: {

      items: 1

    }

  }

});



$('#artha-collection-slider').owlCarousel({

  loop: true,

  margin: 0,

  nav: true,

  dots: false,

  autoplay:true,

  mouseDrag: true,

  touchDrag: true,

  autoplayTimeout:7000,

  smartSpeed: 4000,

  navText: [

    '<i class="fas fa-angle-left"></i>',

    '<i class="fas fa-angle-right"></i>'

  ],

  responsive: {

    0: {

      items: 1

    },

    600: {

      items: 3

    },

    1000: {

      items: 4

    }

  }

})



function toggleDropdown(e) {

  const _d = $(e.target).closest('.dropdown'),

    _m = $('.dropdown-menu', _d);

  setTimeout(function () {

    const shouldOpen = e.type !== 'click' && _d.is(':hover');

    _m.toggleClass('show', shouldOpen);

    _d.toggleClass('show', shouldOpen);

    $('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);

  }, e.type === 'mouseleave' ? 300 : 0);

}



$('body')

  .on('mouseenter mouseleave', '.dropdown', toggleDropdown)

  .on('click', '.dropdown-menu a', toggleDropdown);





$('a[href="#search"]').click(function () {

  event.preventDefault()

  $("#search-box").addClass("-open");

  $('body').css('overflow-y', 'hidden');

  setTimeout(function () {

    inputSearch.focus();

  }, 800);

});



$('a[href="#close"]').click(function () {

  event.preventDefault()

  $("#search-box").removeClass("-open");

  $('body').css('overflow-y', 'auto');

});



$(document).keyup(function (e) {

  if (e.keyCode == 27) { // escape key maps to keycode `27`

    $("#search-box").removeClass("-open");

  }

});



$('.product-img--main')

  // tile mouse actions

  .on('mouseover', function(){

    $(this).children('.product-img--main__image').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});

      })

    .on('mouseout', function(){

      $(this).children('.product-img--main__image').css({'transform': 'scale(1)'});

    })

    .on('mousemove', function(e){

      $(this).children('.product-img--main__image').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});

    })

    // tiles set up

    .each(function(){

      $(this)

      // add a image container

      .append('<div class="product-img--main__image"></div>')

      // set up a background image for each tile based on data-image attribute

      .children('.product-img--main__image').css({'background-image': 'url('+ $(this).attr('data-image') +')'});

    });



    /*jQuery(document).ready(function ($) {

      // Enable hover to show the tab

      $('#pills-tab[data-mouse="hover"] a').hover(function(){

        $(this).tab('show');

      });

    

      // Disable click event on tabs

      $('#pills-tab[data-mouse="hover"] a').click(function(event) {

        event.preventDefault();

      });

    

      $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {

        var target = $(e.relatedTarget).attr('href');

        $(".desktop-menu-slider").trigger('refresh.owl.carousel');

        $(target).removeClass('active');

      });

    });*/

    jQuery(document).ready(function ($) {

      // Enable hover to show the tab

      $('#pills-tab[data-mouse="hover"] a').hover(function(){

        //$(this).tab('show');
        var target = $(this).data('reference');  // Get the tab content reference from the data-reference attribute
          $('#pills-tabContent .tab-pane').removeClass('show active');  // Hide all tab content
          $('#pills-tabContent ' + target).addClass('show active');  // Show the content associated with the hovered tab
      });

      // Disable click event on tabs

      $('#pills-tab[data-mouse="hover"] a').click(function(event) {

       // event.preventDefault();

      });

      $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {

        var target = $(this).data('reference');  // Get the tab content reference from the data-reference attribute
        
        $(".desktop-menu-slider").trigger('refresh.owl.carousel');

        $(target).removeClass('active');

      });

    });





    $('.desktop-menu-slider').owlCarousel({

      loop:false,

      margin:10,

      nav:true,

      dots:false,

      responsive:{

          0:{

              items:1

          },

          600:{

              items:3

          },

          1000:{

              items:6

          }

      }

    });



    

   

  

 // ----------------------------sidebar-------------------

const pageHeader = document.querySelector(".page-header");

const toggleMenu = pageHeader.querySelector(".toggle-menu");

const menuWrapper = pageHeader.querySelector(".menu-wrapper");

const level1Links = pageHeader.querySelectorAll(".level-1 > li > a");

const listWrapper2 = pageHeader.querySelector(".list-wrapper:nth-child(2)");

const listWrapper3 = pageHeader.querySelector(".list-wrapper:nth-child(3)");

const subMenuWrapper2 = listWrapper2.querySelector(".sub-menu-wrapper");

const subMenuWrapper3 = listWrapper3.querySelector(".sub-menu-wrapper");

const backOneLevelBtns = pageHeader.querySelectorAll(".back-one-level");

const isVisibleClass = "is-visible";

const isActiveClass = "is-active";



toggleMenu.addEventListener("click", function () {

  menuWrapper.classList.toggle(isVisibleClass);

  if (!this.classList.contains(isVisibleClass)) {

    listWrapper2.classList.remove(isVisibleClass);

    listWrapper3.classList.remove(isVisibleClass);

    const menuLinks = menuWrapper.querySelectorAll("a");

    for (const menuLink of menuLinks) {

      menuLink.classList.remove(isActiveClass);

    }

  }

});



for (const level1Link of level1Links) {

  level1Link.addEventListener("click", function (e) {

    const siblingList = level1Link.nextElementSibling;

    if (siblingList) {

      // e.preventDefault();

      console.log(siblingList);

      

      this.classList.add(isActiveClass);

      const cloneSiblingList = siblingList.cloneNode(true);

      subMenuWrapper2.innerHTML = "";

      subMenuWrapper2.append(cloneSiblingList);

      listWrapper2.classList.add(isVisibleClass);

    }

  });

}



listWrapper2.addEventListener("click", function (e) {

  const target = e.target;

  if (target.tagName.toLowerCase() === "a" && target.nextElementSibling) {

    const siblingList = target.nextElementSibling;

    e.preventDefault();

    target.classList.add(isActiveClass);

    const cloneSiblingList = siblingList.cloneNode(true);

    subMenuWrapper3.innerHTML = "";

    subMenuWrapper3.append(cloneSiblingList);

    listWrapper3.classList.add(isVisibleClass);

  }

});



for (const backOneLevelBtn of backOneLevelBtns) {

  backOneLevelBtn.addEventListener("click", function () {

    const parent = this.closest(".list-wrapper");

    parent.classList.remove(isVisibleClass);

    parent.previousElementSibling

      .querySelector(".is-active")

      .classList.remove(isActiveClass);

  });

}



















    