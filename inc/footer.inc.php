<!-- Footer-->
<footer id="Footer" class="clearfix">
    <!-- Footer copyright-->
    <div class="footer_copy" style="border: 0px;">
        <div class="container">
            <div class="column one">
                <div class="copyright">
                     <a target="_blank" rel="nofollow" href=""></a>


                </div>
                <!--Social info area-->
                <ul class="social"></ul>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- JS -->

<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/js/angular.min.js"></script>
<script type="text/javascript">
  var $ = jQuery.noConflict();
</script>
<script type="text/javascript" src="/js/mfn.menu.js"></script>
<script type="text/javascript" src="/js/jquery.plugins.js"></script>
<script type="text/javascript" src="/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/js/animations/animations.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script type="text/javascript" src="/js/email.js"></script>
<script type="text/javascript" src="/js/cabinet.js"></script>
<script type="text/javascript" src="/js/dbgr.js"></script>
<script type="text/javascript" src="/js/lock.js"></script>
<script type="text/javascript" src="/js/moment.js"></script>
<script type="text/javascript" src="/js/export_excell.js"></script>
<script type="text/javascript" src="/js/printer.js"></script>
<script type="text/javascript" src="/js/app/classes.js"></script>

<script>
jQuery( function() {
   jQuery( "#slider" ).slider();
 } );
</script>
<script>
jQuery(window).load(function() {
    var retina = window.devicePixelRatio > 1 ? true : false;
    if (retina) {
        var retinaEl = jQuery("#logo img.logo-main");
        var retinaLogoW = retinaEl.width();
        var retinaLogoH = retinaEl.height();
        retinaEl.attr("src", "/images/retina-kravmaga.png").width(retinaLogoW).height(retinaLogoH);
        var stickyEl = jQuery("#logo img.logo-sticky");
        var stickyLogoW = stickyEl.width();
        var stickyLogoH = stickyEl.height();
        stickyEl.attr("src", "/images/retina-kravmaga.png").width(stickyLogoW).height(stickyLogoH);
    }
});
</script>
<?
include_once($_SERVER['DOCUMENT_ROOT']."/analytics/google-analytics.php");
?>
</body>

</html>
