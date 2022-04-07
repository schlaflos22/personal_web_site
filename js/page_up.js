'use strict';
function trackScroll() {
    let scrollY = window.pageYOffset;
    let pageHeight = document.documentElement.clientHeight;
    console.log(document.documentElement.clientHeight);
    console.log(window.pageYOffset);
    if (scrollY > pageHeight) {
      upBtn.classList.add('show');
      //elem.style.display = "block";
    }
    if (scrollY < pageHeight) {
     upBtn.classList.remove('show');
     // elem.style.display = "none";
    }
  }
function backUp() {
    if (scrollY > 0) {
      window.scrollBy(0, -80);
      setTimeout(backUp, 35);
    }
  }
var upBtn = document.querySelector('.up');
window.addEventListener('scroll', trackScroll);
upBtn.addEventListener('click', backUp);
