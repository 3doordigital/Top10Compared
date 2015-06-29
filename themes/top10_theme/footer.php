<div id="footerwrap">
    	<div id="footer" class="wrapper">
        	<div class="footbox foot1">
            	<?php dynamic_sidebar( 'footer-1' ); ?>
            </div>
            <div class="footbox foot2">
            	<?php dynamic_sidebar( 'footer-2' ); ?>
            </div>
            <div class="footbox foot3"> 
            	<?php top10_footer_table(); ?> 
            </div>
            <div class="footbox foot4 last">
            	<h4>Follow Us</h4>
           		<a href="https://www.facebook.com/top10compared" target="_blank" onClick="_gaq.push(['_trackEvent', 'FooterSocial', 'Facebook', 'Clicked',,  false]);"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook-footer-icon.jpg" width="40" height="39" alt=""/></a>
              	<a href="https://twitter.com/top10compared" target="_blank" onClick="_gaq.push(['_trackEvent', 'FooterSocial', 'Twitter', 'Clicked',,  false]);"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter-footer-icon.jpg" width="40" height="39" alt=""/></a>
              	 <a href="https://plus.google.com/u/0/b/103637390754582140885/103637390754582140885/posts" target="_blank" onClick="_gaq.push(['_trackEvent', 'FooterSocial', 'Google+', 'Clicked',,  false]);"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gplus-footer-icon.jpg" width="40" height="39" alt=""/></a>
             	 <a href="http://www.youtube.com/channel/UCXA-ov1HCkX07mFuf-hNxHQ" target="_blank" onClick="_gaq.push(['_trackEvent', 'FooterSocial', 'YouTube', 'Clicked',,  false]);"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube-footer-icon.jpg" width="40" height="39" alt=""/></a>
              	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss-footer-icon.jpg" width="40" height="39" alt=""/></a>
<h4 class="mailing">Join Our Mailing List</h4>
            	<form id="newsletter">
            	<p><input type="text" name="mailinglist" value="enter email here..." id="mailinglist" /> <input type="submit" name="mailsubmit" id="mailsubmit" value="send" /></p>
                <div class="newsletterinfo"></div>
            	</form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>
<!-- Place this tag after the last share tag. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'en-GB'};
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=551486421614479";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
 <script type="text/javascript">
        var _mfq = _mfq || [];
        (function () {
        var mf = document.createElement("script"); mf.type = "text/javascript"; mf.async = true;
        mf.src = "//cdn.mouseflow.com/projects/60d051f4-a7d6-489b-a4a4-268d0e354bb2.js";
        document.getElementsByTagName("head")[0].appendChild(mf);
      })();
    </script>
</body>
</html>