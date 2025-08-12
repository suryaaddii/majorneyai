</body>

<!--ANIMASI-->
<script>
    AOS.init();
</script>
<!--ANIMASI-->

<script>
    document.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 10) {
            navbar.querySelector('div').classList.add('bg-white');
        } else {
            navbar.querySelector('div').classList.remove('bg-white');
        }
    });
</script>

</html
