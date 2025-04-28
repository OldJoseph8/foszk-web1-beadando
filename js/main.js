const responsive = {
    0: {
        items: 1
    },
    320: {
        items: 1
    },
    560: {
        items: 2
    },
    960: {
        items: 3
    }
}

$(document).ready(function () {

    $nav = $('.nav');
    $toggleCollapse = $('.toggle-collapse');

    /** click event on toggle menu */
    $toggleCollapse.click(function () {
        $nav.toggleClass('collapse');
    })

    // owl-crousel for blog
    $('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 3000,
        dots: false,
        nav: true,
        navText: [$('.owl-navigation .owl-nav-prev'), $('.owl-navigation .owl-nav-next')],
        responsive: responsive
    });


    // click to scroll top
    $('.move-up span').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    })

    // AOS Instance
    AOS.init();

});

//modal működése
let modal = document.getElementById("myModal");
let btn = document.getElementById("openModal");
let span = document.getElementsByClassName("close")[0];
let iframe = document.querySelector('iframe');

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
    stopVideo();
  }
  
onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
      stopVideo();
    }
  }
  
function stopVideo() {
    let iframeSrc = iframe.src;
    iframe.src = iframeSrc;
  }


  onclick = function(event) {
    if (event.target == modal) {
      closeModal(); 
    }
  }

function closeModal() {
    modal.style.display = "none";
}

// api hívás
function searchTest() {
    fetch('https://dog.ceo/api/breeds/image/random')
      .then(response => response.json())
      .then(data => {
        displayDogImage(data.message);
      })
      .catch(error => console.error('Hiba történt:', error));
  }
  
 // kép megjelenítése modalban
function displayDogImage(imageUrl) {
    let modal = document.getElementById("modal");
    let dogImage = document.getElementById("dogImage");
    dogImage.src = imageUrl;
    modal.style.display = "block";
  
    // Kilépőgomb  hozzáadása
    let closeButton = document.querySelector(".close");
    closeButton.addEventListener("click", closeModal);


    modal.onclick = function(event) {
      if (event.target == modal) {
        closeModal(); 
      }
    }
  
    function closeModal() {
      modal.style.display = "none";
  }
  }
  

