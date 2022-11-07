<script src="public/assets/js/jQuery.js"></script>
<script src="public/assets/js/fatNav/jquery.fatNav.js"></script>
<script src="public/assets/js/pieTimer/jquery.pietimer.js"></script>
<script src="public/assets/js/lightSlider/lightslider.js"></script>
<script src="public/assets/js/resizeJS/ElementQueries.js"></script>
<script src="public/assets/js/resizeJS/ResizeSensor.js"></script>

<script src="public/assets/js/general-header.js"></script>
<script src="public/assets/js/home-accordion.js"></script>

<?php if(empty($currentPage)): ?>
    <script src="public/assets/js/home-swiper.js"></script>
<?php elseif($currentPage === 'about'): ?>
    <script src="public/assets/js/about-swiper.js"></script>
    <script src="public/assets/js/about-tabs.js"></script>
<?php elseif($currentPage === 'contacts'): ?>
    <script src="public/assets/js/contacts-map.js"></script>
    <script src="public/assets/js/contacts.js"></script>
<?php endif; ?>

<?php if($currentPage !== 'about'): ?>
    <script src="public/assets/js/home.js"></script>
<?php endif; ?>

<script src="public/assets/js/contactUsInputs.js"></script>
