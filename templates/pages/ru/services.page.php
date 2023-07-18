<main class="main main-services">
    <header class="header-page services-header-page bgc-red">
        <div class="header-page-top">
            <a href="/services" class="header-page-link fz-20-px color-white">
                <p class="fz-20-px">/</p>
                <p class="fz-20-px">услуги</p>
            </a>

            <div class="header-page-module">
                <img src="/public/assets/images/servicespage3.webp" alt="" class="header-page-img">
            </div>
        </div>

        <div class="header-page-bottom">
            <p class="font-arolse-serif color-white fz-6-7-rem">услуги</p>
        </div>
    </header>

    <section class="services-section section section-first">
        <p class="services-section-greeting font-raleway-light">Even if you are not going to invest in<br>real estate we can help you</p>
    </section>

    <section class="services-section section section-second pr-296-px">
        <?php require RU_MOD_PATH . 'services.module.php' ?>
    </section>

    <div class="services-section section section-third">
        <?php require RU_MOD_PATH . 'contactus.module.php'?>
    </div>

    <?php require RU_MOD_PATH . 'map.module.php'?>
</main>