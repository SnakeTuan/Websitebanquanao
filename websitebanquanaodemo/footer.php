<section class="apps">
    <p>Tải ứng dụng</p>
    <div class="showApps">
        <img src="images/play-store.png">
        <img src="images/app-store.png">
    </div>
    <p>Nhận tin mới của chúng tôi</p>
    <input type="text" placeholder="Email của bạn">
</section>

<div class="footer-top">
    <li><a href="">Liên hệ</a></li>
    <li><a href="">Giới thiệu</a></li>
    <li>
        <a href="" class="fa-brands fa-facebook-f"></a>
        <a href="" class="fa-brands fa-tiktok"></a>
        <a href="" class="fa-brands fa-instagram-square"></a>
    </li>
</div>
<div class="footer-center">
    <p>Địa chỉ: ------------------------------ 012 345 6789<br>
    Đặt hàng online: 987 654 3210</p>
</div>
<div class="footer-bottom">
    @--------------------@
</div>
</body>

<!---------------------- JS ---------------------->
<script>
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

    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector(".aspect-ratio-169")
    const dotTraverse = document.querySelectorAll(".dot")
    imgPosition.forEach(function(image, index){
        //console.log(image, index)
        image.style.left = index*100 + "%"
        dotTraverse[index].addEventListener("click", function(){
            slider(index)
        })
    })
    let index = 0
    function slider (index) {
        imgContainer.style.left = "-" + index*100 + "%"
        const activatedDot = document.querySelector(".activate")
        activatedDot.classList.remove("activate")
        dotTraverse[index].classList.add("activate")
    }
    function sildeImage() {
        index ++;
        if( index == imgPosition.length ) index = 0;
        slider(index)
    }
    setInterval(sildeImage, 5000)
</script>
<script src="js/script.js"></script>
</html>