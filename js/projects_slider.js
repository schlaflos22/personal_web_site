let prevArrow = document.querySelector('#btn-prev');
        let nextArrow = document.querySelector('#btn-next');
        let slides = document.querySelectorAll('.slide');
        
        let index = 0;
        const activeSlide = n => {
            console.log(n);
            for(slide of slides){
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
                index = slides.length - 1;
                activeSlide(index);
            }else {
                index--;
                activeSlide(index);
            }
        }
        prevArrow.addEventListener('click',prevSlide, false);
        //let interval = setInterval(nextSlide,2500);