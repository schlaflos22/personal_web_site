let posterImages = document.getElementsByClassName('poster_image');


for (let posterImage of posterImages) {
    posterImage.addEventListener('click', openDetailedView) ;
  }
function openDetailedView(event) {
    console.log(event.target);
    document.location.href = "filmography_single.php";
}
  