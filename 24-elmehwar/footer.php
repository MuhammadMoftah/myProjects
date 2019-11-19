<footer>
    <p>&copy; 2019 almehwar. All rights reserved</p>
</footer>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/index.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 40,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        }, // init: false,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints: {
            1024: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10,
            }
        }

    });

</script>

</body>

</html>
