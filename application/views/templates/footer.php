<footer class="footer-area">
    <div class="footer-widget section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-widget single-widget1">
                        <a href="index.html"><img src="<?= base_url('assets'); ?>/img/logo/logo_mw.png" width="300" height="250" alt=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-widget single-widget2 my-5 my-md-0">
                        <h5 class="mb-4">contact us</h5>
                        <div class="d-flex">
                            <div class="info-text">
                                <p>Jalan Umban Sari Rumbai, Pekanbaru</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="info-text">
                                <p>(123) 456 78 90</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="info-text">
                                <p>fahturrahman18ti@mahasiswa.pcr.ac.id</p>
                                <p>ryvaldo18ti@mahasiswa.pcr.ac.id</p>
                                <p>wina18ti@mahasiswa.pcr.ac.id</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-widget single-widget3">
                        <h5 class="mb-4">opening hours</h5>
                        <p>Mon-Fri .............. 10 am - 12 pm</p>
                        <p>Sat-Sun ...................... Closed</p>
                        <p>Holidays ............. 10 am - 12 pm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->


<!-- Javascript -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>

<script src="<?= base_url('assets'); ?>/js/jquery-2.2.4.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/bootstrap-4.1.3.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/wow.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/owl-carousel.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery.datetimepicker.full.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/main.js"></script>
</body>

</html>