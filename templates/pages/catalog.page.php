<main class="main main-catalog">

    <section class="catalog-section section section-first pl-296-px pr-296-px">
        <div class="section-first-top">
            <p class="section-first-text fz-20-px color-white">Billion worth real estate in</p>
            <p class="section-first-text-big fz-128-px color-white font-arolse-serif">Dubai</p>
        </div>


        <div class="section-first-bottom">
            <p class="section-first-bottom-title color-white">Choose characteristics for your real estate</p>

            <div class="catalog-filter-group">
                <div class="catalog-filter-titles">
                    <p id="price" class="catalog-filter-accord">Price (m2)</p>
                    <p id="district" class="catalog-filter-accord">Select or enter the district</p>
                    <p id="type" class="catalog-filter-accord">Type of object</p>
                </div>

                <form method="get" class="catalog-filter">
                    <div id="price_block" class="catalog-filter-block">
                        <input class="js-range-slider" name="price" id="price" type="text">
                    </div>

                    <div id="district_block" class="catalog-filter-block">
                        <?php foreach ($districts as $district): ?>
                            <div>
                                <label class="filter-checkbox" for="<?= $district['value'] ?>">
                                    <input class="filter-checkbox-input" <?= isset($_GET['district'][$district['value']]) ? 'checked' : '' ?> id="<?= $district['value'] ?>" type="checkbox" name="district[<?= $district['value'] ?>]">
                                    <?= $district['text'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div id="type_block" class="catalog-filter-block">
                        <?php foreach ($typesOfAparts as $apart): ?>
                            <div>
                                <label class="filter-checkbox" for="<?= $apart['value'] ?>">
                                    <input class="filter-checkbox-input" <?= isset($_GET['type'][$apart['value']]) ? 'checked' : '' ?> id="<?= $apart['value'] ?>" type="checkbox" name="type[<?= $apart['value'] ?>]">
                                    <?= $apart['text'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button type="submit" id="btn_filter" class="catalog-btn-filter btn btn-white-textred btn-text-bold">
                        filter
                        <svg class="svg-arrow-i" width="49" height="14" viewBox="0 0 49 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section class="catalog-section section section-second" id="tabs">
        <header class="catalog-section-header pl-296-px pr-296-px">
            <h1 class="catalog-section-header-title font-arolse-serif fz-40-px">we found: <?= count($objects) ?> objects</h1>
            <select name="sort_by" class="sort">
                <option disabled selected>Sort by</option>
                <option value="from_price_m2">price</option>
                <option value="year">year</option>
            </select>

            <ul class="catalog-section-header-tabs">
                <li class="catalog-section-header-tab" id="tab-one"><a href="#tabs-1">table</a></li>
                <li class="catalog-section-header-tab" id="tab-two"><a href="#tabs-2">map</a></li>
            </ul>
        </header>
        <div id="toInsertModal"></div>
        <div class="catalog-second-block catalog-second-table" id="tabs-1">

            <?php foreach ($objects as $object): ?>
                <?php if(isset($object['type']) && $object['type'] === 'text'): ?>
                    <div class="font-arolse-serif <?= $object['class'] ?>">
                        <?= $object['text'] ?>
                    </div>
                <?php else: ?>
                    <div onclick="openObject(<?= $object['id'] ?>);" class="catalog-item <?= isset($object['class']) ? $object['class'] : '' ?>" style="background-image: url('./public/images/<?= $object['img'] ?>');">

                        <?php if(isset($object['tags']) && !empty($object['tags'])): ?>
                            <div class="swiper-tags">
                                <?php if(in_array('hottest', $object['tags'])): ?><img src="./public/assets/images/hottest.png" alt=""><?php endif; ?>
                                <?php if(in_array('topsales', $object['tags'])): ?><img src="./public/assets/images/topsales.png" alt=""><?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <a href="/catalog" class="swiper-item-link animate__animated animate__fadeIn"><img src="./public/assets/images/arrow-dia.svg" alt=""></a>

                        <div class="swiper-item-cover">
                            <div class="swiper-item-vision animate__animated animate__fadeInUp">
                                <h1 class="swiper-item-title fz-36-px color-white font-raleway-extralight"><?= $object['title'] ?></h1>
                                <p class="swiper-item-text color-white font-raleway-light"><?= $object['descr'] ?></p>
                            </div>

                            <div class="swiper-item-nonvision animate__animated animate__fadeInUp">
                                <div class="swiper-item-nonvision-top">
                                    <p class="swiper-item-nonvision-text fz-10-px">
                                        <img src="./public/assets/images/calendar.svg" alt="">
                                        Year: <br><?= $object['year'] ?>
                                    </p>
                                    <?php if($object['istallment']): ?>
                                        <p class="swiper-item-nonvision-text fz-10-px">
                                            <img src="./public/assets/images/checkbox.svg" alt="">
                                            Installment: <br>yes
                                        </p>
                                    <?php endif; ?>
                                    <p class="swiper-item-nonvision-text fz-10-px">
                                        <img src="./public/assets/images/subtract.svg" alt="">
                                        Initial payment:<br><?= $object['payment'] ?>
                                    </p>
                                </div>

                                <div class="swiper-item-nonvision-bottom font-raleway-light">
                                    from <span class="swiper-item-nonvision-bottom-price font-raleway-semibold fz-1-5-rem"><?= $object['from_price'] ?> $</span> per m<sup>2</sup>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="catalog-second-block catalog-second-map" id="tabs-2">
            <p>soon...</p>
        </div>
    </section>

    <section class="catalog-section section section-third">
        <?php require MOD_PATH . 'contactus.module.php'?>
    </section>

    <?php require MOD_PATH . 'map.module.php'?>
</main>