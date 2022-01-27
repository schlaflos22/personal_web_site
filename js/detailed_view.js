let posterImages = document.getElementsByClassName('poster_image');


for (let posterImage of posterImages) {
    posterImage.addEventListener('click', openDetailedView) ;
  }
function openDetailedView(event) {
    console.log(event.target.id);
   //здесь получить id эвента и добавить его в адресную строку location
    document.location.href = `filmography_single.php?id=${event.target.id}`;
  
}