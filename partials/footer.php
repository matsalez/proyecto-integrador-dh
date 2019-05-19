<!-- INICIO Script utilizado para el desplegue del menu, primero se ejecuta el código HTML arriba y luego este script -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.submenu').click(function(){
      $(this).children('ul').slideToggle();
})
})
      $(document).ready(function(){
        $('ul').click(function(i){
          i.stopPropagation();

  })
  })
</script>

<!-- FIN Jquery Script utilizado para el desplegue del menu -->

<footer class="main-footer">
  <br class="brfooter">
  <hr class="hrfooter">
  <ul class="social-media">
    <li><a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a></li>
    <li><a href="https://www.Twitter.com"><i class="fab fa-twitter-square"></i></a></li>
    <li><a href="https://www.Instagram.com"><i class="fab fa-instagram"></i></a></li>
  </ul>
  <br>
  <br>
  <ul class="sections-faq">
    <li><a href="faq-index.php#pr1">¿Cómo comprar?</a></li>
    <li><a href="faq-index.php#pr12">Envíos</a>
    <li><a href="faq-index.php#pr24">Devoluciones</a></li>
    <li><a href="faq-index.php#pr4">Talles y locales</a>
    <li><a href="#trabaja-con-nosotros">Trabajá con nosotros</a></li>
    <li><a href="#quienes-somos">Quienés somos </a>
    <li><a href="#contacto">Contacto</a></li>

</footer>
</body>
</html>
