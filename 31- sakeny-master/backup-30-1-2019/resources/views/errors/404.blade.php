<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>404 Page not found</title>
  <!--
today: be happy
tomorrow: be happy
everyday: be happy
-->


<script>
// Robots don't want to stop dancing !
// therefore decided to restore original RAF
// if (window.location.href.indexOf("fullcpgrid") > -1) {
    document.addEventListener('DOMContentLoaded', function() {
        const original = document.createElement('iframe');
        original.style.display = 'none';
        document.body.appendChild(original);
        window.requestAnimationFrame = original.contentWindow.requestAnimationFrame;
    }, true);
// }
</script>
      <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

<style type="text/css">

</style>

</head>

<body>
<div>
    <div><h1 style="color:white;font-family: cursive;text-align: center">This page made by LOVE.</h1></div>
    <div>
      <canvas></canvas>
    </div>

<div >
    <div class="fondo">
        <div class="reflector"></div>
        <div class="hair"></div>
        <div class="brazos"></div>
        <div class="brazos3"></div>
        <div class="dj">
          <div class="auri"></div>
          <div class="flequi"></div>
          <div class="boca"></div>
        </div>
        <div class="cuadrado"></div>
        <div class="cables"></div>
        <div class="disk"></div>
        <div class="disk3"></div>
         <div class="disk4"></div>
        <div class="disk5"></div>
        <div class="cuad"><div class="circ"></div><div class="circ3"></div></div>
        <div class="cuad3"><div class="circ"></div><div class="circ3"></div></div>
    </div>
  </div>
</div>

    <script  src="{{ url('assets/js/index.js') }}"></script>
<iframe style="display: none" width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/345879490&amp;color=%23161e4c&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></iframe>

</body>

</html>
