let gallery = document.getElementById('backstage_gallery');
let slideActive = document.getElementsByClassName('slide');
let slidesContainer = document.getElementsByClassName('image_slides');
let trumbnailsImages = document.getElementsByClassName('trumbnail_image');

for(let trumbnail of trumbnailsImages) {
    trumbnail.addEventListener('click', showSlideImage);
}
function showSlideImage(event) {
    console.log(event.target.src);
    console.log(event.target.parentNode.parentNode.parentNode.children[0].children[0].children[0]);
   event.target.parentNode.parentNode.parentNode.children[0].children[0].children[0].src = event.target.src;
}