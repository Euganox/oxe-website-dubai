<main class="main main-home">
    <section class="home-section section section-first" style="background-size: cover;">
        <p class="section-first-text fz-20-px color-white"><?= t("Billion worth real estate in") ?></p>
        <p class="section-first-text-big fz-128-px color-white font-arolse-serif"><?= t('Dubai') ?></p>

        <a href="/catalog" class="btn btn-white-textred btn-text-bold"><?= t('see options') ?>
            <svg class="svg-arrow-i" width="49" height="14" viewBox="0 0 49 13" xmlns="http://www.w3.org/2000/svg">
                <path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z" />
            </svg>
        </a>
    </section>

    <section class="home-section section section-second pl-296-px">
        <p class="section-second-author beauty-text-words font-arolse-script fz-40-px color-red"><?= t("Ermishina Oxana") ?></p>
        <p class="section-second-text fz-4-rem font-arolse-serif">
            <?= t("we love big houses, big deals and big money. And we've made that love our job. Buying, renting, selling, investing -") ?>
        </p>
        <p class="section-second-text section-second-text-gradient fz-4-5-rem font-arolse-serif">
            <?= t("NO PROBLEM.") ?>
        </p>
    </section>

    <section class="home-section section section-third flex-default-sb-c pl-296-px">
        <div class="section-third-left">
            <ul class="accordion-list">
                <li class="accordion-el">
                    <h3 class="accordion-title flex-default-fs-c"><?= t('About company') ?></h3>
                    <div class="accordion-answer">
                        <p class="accordion-text">
                            <?= t("We do not need complicated wording, and our objects - unnecessary epithets. The best doesn't need any epithets. We are young, energetic and ambitious, which means that you are the first to have access to the best. We value our time and yours, we value ours and your reputation, we count our money and yours. We work as if we plan to live forever, and we live as if we don't work at all.") ?>
                        </p>
                    </div>
                </li>
                <li class="accordion-el">
                    <h3 class="accordion-title flex-default-fs-c"><?= t("The mission") ?></h3>
                    <div class="accordion-answer">
                        <p class="accordion-text">
                            <?= t("OXE GROUP's mission is helping people to find the best properties available on the elite real estate market to live in, to invest in or to use for business development. We make your billions work for your benefit.") ?>
                        </p>
                    </div>
                </li>
                <li class="accordion-el">
                    <h3 class="accordion-title flex-default-fs-c"><?= t('The team') ?></h3>
                    <div class="accordion-answer">
                        <p class="accordion-text">
                            <?= t("As of today, the company staff numbers 115 persons. The OXE team often takes perceived risks looking at all potential risk scenarios and therefore achieves what most people find impossible. The OXE GROUP team are young, outstanding, daring professionals.") ?>
                        </p>
                    </div>
                </li>
                <li class="accordion-el">
                    <h3 class="accordion-title flex-default-fs-c"><?= t('Services') ?></h3>
                    <div class="accordion-answer">
                        <p class="accordion-text">
                            <?= t("The OXE GROUP brand means high standard of service that ensures maximal loyalty of its partners and clients.") ?>
                        </p>
                    </div>
                </li>
                <li class="accordion-el">
                    <h3 class="accordion-title flex-default-fs-c"><?= t("Advantages") ?></h3>
                    <div class="accordion-answer">
                        <p class="accordion-text">
                         <?= t("Our mane focus is investments. We do pre-sales at the most famous projects in Dubai and give an opportunity for your millions become billions. We work as if we expect to live forever, and live the way as if we do not work.") ?>
                        </p>
                    </div>
                </li>
            </ul>

            <a href="/about" class="btn btn-red-textwhite">
                <?= t("learn more") ?>
                <svg class="svg-arrow-i" width="49" height="14" viewBox="0 0 49 13" xmlns="http://www.w3.org/2000/svg">
                    <path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z" />
                </svg>
            </a>
        </div>
        <img src="/public/assets/images/oxana.webp" alt="" class="section-third-right">
    </section>

    <section class="home-section section section-fourth pl-296-px">
        <?php require MOD_PATH . 'topOffers.module.php'?>
    </section>

    <section id="ideology" class="home-section section section-fifth">
        <img id="ideology_img1" src="/public/assets/images/dubai_view1.webp" alt="">

        <div id="ideology_text" class="section-fifth-block">
            <p class="section-fifth-title beauty-text-words font-arolse-script fz-40-px color-red">
                <?= t("Our ideology") ?>
            </p>
            <p class="section-fifth-text beauty-body-words fz-4-rem font-arolse-serif">
                <?= t('We are <span class="beauty-body-words fz-4-rem font-arolse-serif text-color-red">young, energetic and ambitious,</span> which means you are the first to get access to the best') ?>
            </p>
        </div>

        <img id="ideology_img2" src="/public/assets/images/dubai_view2.webp" alt="">
    </section>

    <?php require MOD_PATH . 'contactus.module.php'?>
    <?php require MOD_PATH . 'map.module.php'?>

</main>