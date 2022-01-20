let gallery = document.getElementById('backstage_gallery');
let slideActive = document.getElementsByClassName('slide');
let slidesContainer = document.getElementsByClassName('image_slides');
let trumbnailsImages = document.getElementsByClassName('trumbnail_image');
let images = ['img/image 1.png','img/image 2.png','img/image 3.png','img/image 4.png','img/image 5.png'];
let galleryContent =`<div class="image_slides">
<div class="slide active">
    <img src="${images[0]}"">
  </div>
</div>
<div class="trumbnails">
<div class="trumbnail">
    <img class="trumbnail_image" src="${images[0]}" alt="">
</div>
<div class="trumbnail">
    <img class="trumbnail_image" src="${images[1]}" alt="">
</div>
<div class="trumbnail">
    <img class="trumbnail_image" src="${images[2]}" alt="">
</div>
<div class="trumbnail">
    <img class="trumbnail_image" src="${images[3]}" alt="">
</div>
<div class="trumbnail">
    <img class="trumbnail_image" src="${images[4]}" alt="">
</div>    
</div>`;
gallery.insertAdjacentHTML('beforeend',galleryContent);
for(let trumbnail of trumbnailsImages) {
    trumbnail.addEventListener('click', showSlideImage);
}
function showSlideImage(event) {
    console.log(event.target.src);
    console.log(event.target.parentNode.parentNode.parentNode.children[0].children[0].children[0]);
    event.target.parentNode.parentNode.parentNode.children[0].children[0].children[0].src = event.target.src;
}