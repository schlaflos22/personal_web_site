let prevArrow = document.querySelector('#btn-prev');
let nextArrow = document.querySelector('#btn-next');
let slides = document.querySelectorAll('.slide');

slides[0].classList.add('active');

let index = 0;
const activeSlide = n => {
    console.log(n);
    for (let slide of slides){
        slide.classList.remove('active');
    }
    slides[n].classList.add('active');
    
}
const nextSlide  = () =>  {
    if(index == slides.length - 1){
        index = 0;
        activeSlide(index);
    }else{
        index++;
        activeSlide(index);
    }
}
nextArrow.addEventListener('click',nextSlide, false);

const prevSlide  = () =>  {
    //clearInterval(interval);
    if(index == 0){
        index == slides.length - 1;
        activeSlide(index);
    }else {
        index--;
        activeSlide(index);
    }
}
prevArrow.addEventListener('click',prevSlide, false);
//let interval = setInterval(nextSlide,2500);


//swipe for mobile version


let touchstartX = 0
let touchendX = 0

let slider = document.getElementsByClassName('images')

function handleGesture() {
  if (touchendX < touchstartX) 
  if(index == slides.length - 1){
    index = 0;
    activeSlide(index);
    }else{
        index++;
        activeSlide(index);
    }
  if (touchendX > touchstartX) 
  if(index == 0){
    index == slides.length - 1;
    activeSlide(index);
    }else {
        index--;
        activeSlide(index);
    }
}
for (let slideImg of slider){
    slideImg.addEventListener('touchstart', e => {
  touchstartX = e.changedTouches[0].screenX
})

slideImg.addEventListener('touchend', e => {
  touchendX = e.changedTouches[0].screenX
  handleGesture()
})
}