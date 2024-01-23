//scroll
/* -------------------- Change header's background when scroll (all) -------------------- */
const header = document.querySelector("header")
    window.addEventListener("scroll", function(){
        x = window.pageYOffset
        if( x>0 ){
            header.classList.add("change")
        }
        else{
            header.classList.remove("change")
        }
    })

/* -------------------- Slide left list when click on (category) -------------------- */
const itemstraverse = document.querySelectorAll(".left-list")
itemstraverse.forEach(function(menu){
    menu.addEventListener("click", function(){
        menu.classList.toggle("block")
    })
})

/* -------------------- for swapping img (product) -------------------- */
const mainImg = document.querySelector(".big-img img")
const altImg = document.querySelectorAll(".small-img img")

altImg.forEach(function(item, x){
    item.addEventListener("click", function(){
        mainImg.src = item.src
    })
})


/* -------------------- show information when click on (product) -------------------- */
const baoquan = document.querySelector(".baoquan")
const chitiet = document.querySelector(".chitiet")
const gioithieu = document.querySelector(".gioithieu")

if(gioithieu){
    gioithieu.addEventListener("click", function(){
        document.querySelector(".mid-content-gioithieu").style.display = 'block'
        document.querySelector(".mid-content-chitiet").style.display = 'none'
        document.querySelector(".mid-content-baoquan").style.display = 'none'
    })
}
if(chitiet){
    chitiet.addEventListener("click", function(){
        document.querySelector(".mid-content-gioithieu").style.display = 'none'
        document.querySelector(".mid-content-chitiet").style.display = 'block'
        document.querySelector(".mid-content-baoquan").style.display = 'none'
    })
}
if(baoquan){
    baoquan.addEventListener("click", function(){
        document.querySelector(".mid-content-gioithieu").style.display = 'none'
        document.querySelector(".mid-content-chitiet").style.display = 'none'
        document.querySelector(".mid-content-baoquan").style.display = 'block'
    })
}

/* -------------------- for sliding discription (product) -------------------- */
const button = document.querySelector(".discription-top")

if(button){
    button.addEventListener("click", function(){
        document.querySelector(".discription-mid").classList.toggle("slide-down")
    })
}