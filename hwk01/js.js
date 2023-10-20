let collect_img = document.querySelectorAll(".collect_img")

for(let i = 0; i < collect_img.length; i++){
    collect_img[i].addEventListener('click',function () {
        if(this.src.indexOf('icon3') != -1){
            this.src = 'image/icon4.png'
        }else {
            this.src = 'image/icon3.png'
        }
    })
}
