        <!-- BEGIN: lt_ie9 --><p class="chromeframe">{LANG.chromeframe}</p><!-- END: lt_ie9 -->
        <!-- BEGIN: cookie_notice --><div class="cookie-notice"><div><button onclick="cookie_notice_hide();">&times;</button>{COOKIE_NOTICE}</div></div><!-- END: cookie_notice -->
        
        <div id="openidResult" class="nv-alert" style="display:none"></div>
        <div id="openidBt" data-result="" data-redirect=""></div>
        <!-- BEGIN: crossdomain_listener -->
        <script type="text/javascript">
        function nvgSSOReciver(event) {
            if (event.origin !== '{SSO_REGISTER_ORIGIN}') {
                return false;
            }
            if (
                event.data !== null && typeof event.data == 'object' && event.data.code == 'oauthback' &&
                typeof event.data.redirect != 'undefined' && typeof event.data.status != 'undefined' && typeof event.data.mess != 'undefined'
            ) {
                $('#openidResult').data('redirect', event.data.redirect);
                $('#openidResult').data('result', event.data.status);
                $('#openidResult').html(event.data.mess + (event.data.status == 'success' ? ' <span class="load-bar"></span>' : ''));
                $('#openidResult').addClass('nv-info ' + event.data.status);
                $('#openidBt').trigger('click');
            }
        }
        window.addEventListener('message', nvgSSOReciver, false);
        </script>
        <!-- END: crossdomain_listener -->
		
	<script type="rocketlazyloadscript" data-rocket-type='text/javascript' src='{JS}/jquery.min.js' id='jquery-js' defer></script>
	<script type="rocketlazyloadscript" data-rocket-type='text/javascript' src='{JS}/owl.carousel.min.js' id='owl-carousel-js' defer></script>
	<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' src='{JS}/main-home.js' id='main-home-script-js' defer></script>
	<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' src='{JS}/main-category-single.js' id='main-category-single-js' defer></script>

        <script src="{NV_STATIC_URL}themes/{TEMPLATE}/js/bootstrap.min.js"></script>
div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0&appId=757714801747560&autoLogAppEvents=1" nonce="Sd2oa2g6"></script>

    </body>
</html>
