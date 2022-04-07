let menu_item = document.getElementsByClassName('link');
for( let i = 0;i< menu_item.length;i++){
    menu_item[i].onclick = activeLink();
} 
function activeLink(){
    for ( let j=0; j< menu_item.length;j++) {
        console.log(document.location.href);
        console.log(menu_item[j].href);
        if(document.location.href == menu_item[j].href) {
            menu_item[j].classList.add('active_link');
        }
    }
}       