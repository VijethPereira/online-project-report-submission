
<!-- Dashboard js -->
<script src="<?= BASE_URL; ?>assets/user_login_home/ajax/libs/jquery/2.1.4/jquery.min.js">
</script>
    <script src="<?= BASE_URL; ?>assets/user_login_home/bootstrap.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/user_login_home/js/jquery.lwtCountdown-1.0.js"></script>
    <script src="<?= BASE_URL; ?>assets/user_login_home/js/notifyMe.js"></script>
    <script src="<?= BASE_URL; ?>assets/user_login_home/js/contact-me.js"></script>
    <script src="<?= BASE_URL; ?>assets/user_login_home/js/jquery.swipebox.js"></script>
    <script src="<?= BASE_URL; ?>assets/user_login_home/js/vegas.js"></script>
    <script>
        $('body').vegas({
            slides: [{
                src: '<?= BASE_URL; ?>assets/user_login_home/img/pict1-thumb.jpg'
            }, {
                src: '<?= BASE_URL; ?>assets/user_login_home/img/pict2-thumb.jpg'
            }, {
                src: '<?= BASE_URL; ?>assets/user_login_home/img/pict3-thumb.jpg'
            }],
            delay: 5000,
            transition: 'fade'
        });
    </script>
    <script src="<?= BASE_URL; ?>assets/user_login_home/js/main.js"></script>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '<?= BASE_URL; ?>assets/user_login_home/analytics.js', 'ga');
        ga('create', 'UA-60503361-1', 'auto');
        ga('send', 'pageview');
    </script>