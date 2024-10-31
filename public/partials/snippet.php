<!-- Facebook -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '241552976400218',
            autoLogAppEvents: true,
            xfbml: true,
            version: 'v3.2'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- Chat widget -->
<div class="fb-customerchat" page_id="<?php echo get_option('pbd_cs_faq_chatbot')['page_id'] ?>">
</div>