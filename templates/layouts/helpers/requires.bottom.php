<script src="public/assets/js/jQuery.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="public/assets/js/fatNav/jquery.fatNav.js"></script>
<script src="public/assets/js/pieTimer/jquery.pietimer.js"></script>
<script src="public/assets/js/lightSlider/lightslider.js"></script>
<script src="public/assets/js/resizeJS/ElementQueries.js"></script>
<script src="public/assets/js/resizeJS/ResizeSensor.js"></script>
<script src="public/assets/js/amodal/amodal.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>



<script src="public/assets/js/build/js/utils.js"></script>
<script src="public/assets/js/build/js/intlTelInput-jquery.js"></script>


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
<?php elseif($currentPage === 'catalog'): ?>
    <script src="public/assets/js/forms/jquery.formstyler.js"></script>
    <script src="public/assets/js/rangeSlider/ion.rangeSlider.js"></script>
    <script src="public/assets/js/catalog-filter.js"></script>
    <script src="public/assets/js/catalog-global-filter.js"></script>
    <script src="public/assets/js/catalog.js"></script>
<?php endif; ?>

<?php if($currentPage !== 'about'): ?>
    <script src="public/assets/js/home.js"></script>
<?php endif; ?>


<script src="public/assets/js/inputCountryTel.js"></script>
<script src="public/assets/js/catalog-objects.js"></script>
<script src="public/assets/js/contactUsInputs.js"></script>
<script src="public/assets/js/loaded-imgs.js"></script>
