<main class="main main-catalog">

    <div class="catalog-global-filter-btn">
        <svg width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="4.37114e-08" y1="2.5" x2="25" y2="2.5" stroke="white"/>
            <line x1="4.37114e-08" y1="8.5" x2="25" y2="8.5" stroke="white"/>
            <line x1="4.37114e-08" y1="14.5" x2="25" y2="14.5" stroke="white"/>
            <circle cx="4.5" cy="2.5" r="2" fill="#C72D37" stroke="white"/>
            <circle cx="18.5" cy="14.5" r="2" fill="#C72D37" stroke="white"/>
        </svg>
    </div>

    <div class="catalog-global-filter">
        <div class="catalog-global-filter-close">закрыть</div>

        <div class="catalog-filter-group">
            <form method="get" class="catalog-filter">
                <div class="catalog-filter-block">
                    <p class="catalog-global-filter-title" for="price">Цена (за м<sup>2</sup>)</p>
                    <input class="js-range-slider" name="price" id="price" type="text">
                </div>

                <div class="catalog-filter-block">
                    <p class="catalog-global-filter-title">Район</p>
                    <div class="catalog-global-filter-btns">
                        <?php foreach ($districts as $district): ?>
                            <div>
                                <label class="filter-checkbox" for="<?= $district['value'] ?>">
                                    <input class="filter-checkbox-input" <?= isset($_GET['district'][$district['value']]) ? 'checked' : '' ?> id="<?= $district['value'] ?>" type="checkbox" name="district[<?= $district['value'] ?>]">
                                    <?= $district['text'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="catalog-filter-block">
                    <p class="catalog-global-filter-title">Кол-во спален</p>
                    <div class="catalog-global-filter-btns">
                        <?php foreach ($typesOfRealty as $realty): ?>
                            <div>
                                <label class="filter-checkbox" for="<?= $realty['value'] ?>">
                                    <input class="filter-checkbox-input" <?= isset($_GET['realty'][$realty['value']]) ? 'checked' : '' ?> id="<?= $realty['value'] ?>" type="checkbox" name="realty[<?= $realty['value'] ?>]">
                                    <?= $realty['text'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="catalog-filter-block">
                    <p class="catalog-global-filter-title">Тип недвижимости</p>
                    <div class="catalog-global-filter-btns">
                        <?php foreach ($typesOfAparts as $apart): ?>
                            <div>
                                <label class="filter-checkbox" for="<?= $apart['value'] ?>">
                                    <input class="filter-checkbox-input" <?= isset($_GET['type'][$apart['value']]) ? 'checked' : '' ?> id="<?= $apart['value'] ?>" type="checkbox" name="type[<?= $apart['value'] ?>]">
                                    <?= $apart['text'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="catalog-global-filter-bottom">
                    <button type="submit" id="btn_filter" class="catalog-global-filter-submit catalog-btn-filter btn btn-white-textred btn-text-bold">
                        фильтровать
                        <svg class="svg-arrow-i" width="49" height="14" viewBox="0 0 49 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z" />
                        </svg>
                    </button>

                    <a href="/catalog" class="catalog-link-filter catalog-global-filter-clear">очистить фильтр</a>
                </div>
            </form>
        </div>
    </div>

    <section class="catalog-section section section-first pl-296-px pr-296-px" style="background-size: cover;">
        <div class="section-first-top">
            <p class="section-first-text fz-20-px color-white">Недвижимость на миллиарды</p>
            <p class="section-first-text-big fz-128-px color-white font-arolse-serif">Дубай</p>
        </div>


        <div class="section-first-bottom">
            <div class="catalog-filter-group">
                <div class="catalog-filter-titles">
                    <p id="price" class="catalog-filter-accord">Цена (за м<sup>2</sup>)</p>
                    <p id="district" class="catalog-filter-accord">Район</p>
                    <p id="realty" class="catalog-filter-accord">Тип недвижимости</p>
                    <p id="type" class="catalog-filter-accord">Кол-во спален</p>
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

                    <div id="realty_block" class="catalog-filter-block">
                        <?php foreach ($typesOfRealty as $realty): ?>
                            <div>
                                <label class="filter-checkbox" for="<?= $realty['value'] ?>">
                                    <input class="filter-checkbox-input" <?= isset($_GET['realty'][$realty['value']]) ? 'checked' : '' ?> id="<?= $realty['value'] ?>" type="checkbox" name="realty[<?= $realty['value'] ?>]">
                                    <?= $realty['text'] ?>
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
                        применить фильтр
                        <svg class="svg-arrow-i" width="49" height="14" viewBox="0 0 49 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z" />
                        </svg>
                    </button>

                    <a href="/catalog" class="catalog-link-filter">очистить фильтр</a>
                </form>
            </div>
        </div>
    </section>

    <section class="catalog-section section section-second" id="tabs">
        <header class="catalog-section-header pl-296-px pr-296-px">
            <h1 class="catalog-section-header-title font-arolse-serif fz-40-px">мы нашли: <?= count($objects) ?> объектов</h1>
            <select name="sort_by" class="sort">
                <option disabled selected>Sort by</option>
                <option value="from_price_m2">price</option>
                <option value="year">year</option>
            </select>

            <ul class="catalog-section-header-tabs">
                <li class="catalog-section-header-tab" id="tab-one"><a href="#tabs-1">списком</a></li>
                <li class="catalog-section-header-tab" id="tab-two"><a href="#tabs-2">на карте</a></li>
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
                    <div id="object_<?= $object['id'] ?>" class="catalog-item <?= isset($object['class']) ? $object['class'] : '' ?>">


                        <?php if(Objects::checkPhoto($object['id'], $object['foto_coverVert'])): ?>
                            <div class="background-photo-block img-loaded">
                                <img loading="lazy" class="background-photo" src="<?= Objects::getPhotoUrl($object['id'], 'foto_coverVert', $object['foto_coverVert']) ?>" alt="">
                            </div>
                        <?php else: ?>
                            <div class="background-photo-block">
                                <img class="background-photo" onload="imgLoaded(this)" src="<?= Objects::getPhotoUrl($object['id'], 'foto_coverVert', $object['foto_coverVert']) ?>" alt="">
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($object['isTopSalesTag']) && !empty($object['isHottestTag'])): ?>
                            <div class="swiper-tags">
                                <?php if($object['isHottestTag'] === 1): ?><img src="<?= Router::getSite() ?>/public/assets/images/hottest.png" alt=""><?php endif; ?>
                                <?php if($object['isTopSalesTag'] === 1): ?><img src="<?= Router::getSite() ?>/public/assets/images/topsales.png" alt=""><?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <a onclick="openObjectRu(<?= $object['id'] ?>);" class="swiper-item-link animate__animated animate__fadeIn"><img src="<?= Router::getSite() ?>/public/assets/images/arrow-dia.svg" alt=""></a>

                        <div class="swiper-item-cover">
                            <div class="swiper-item-vision animate__animated animate__fadeInUp">
                                <h1 class="swiper-item-title fz-36-px color-white font-raleway-extralight"><?= $object['title'] ?></h1>
                                <p class="swiper-item-text color-white font-raleway-light"><?= $object['subtitle'] ?></p>
                            </div>

                            <div class="swiper-item-nonvision animate__animated animate__fadeInUp">
                                <div class="swiper-item-nonvision-top">
                                    <p class="swiper-item-nonvision-text fz-10-px">
                                        <img src="<?= Router::getSite() ?>/public/assets/images/calendar.svg" alt="">
                                        Год: <br><?= $object['year'] ?>
                                    </p>
                                    <?php if($object['installment']): ?>
                                        <p class="swiper-item-nonvision-text fz-10-px">
                                            <img src="<?= Router::getSite() ?>/public/assets/images/checkbox.svg" alt="">
                                            Рассрочка:<br>да
                                        </p>
                                    <?php endif; ?>
                                    <p class="swiper-item-nonvision-text fz-10-px">
                                        <img src="<?= Router::getSite() ?>/public/assets/images/subtract.svg" alt="">
                                        Первоначальный<br>взнос: <?= $object['payment'] ?>%
                                    </p>
                                </div>

                                <div class="swiper-item-nonvision-bottom font-raleway-light">
                                    От <span class="swiper-item-nonvision-bottom-price font-raleway-semibold fz-1-5-rem"><?= $object['from_price_m2'] ?> $</span> за м<sup>2</sup>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="catalog-second-block catalog-second-map" id="tabs-2">
            <?php require RU_MOD_PATH . 'mapInCatalog.module.php' ?>
            <div id="addonForMap" class="addonForMap">
                <?php foreach ($objectsForMap as $object): ?>
                    <div id="<?= $object['id'] ?>" class="addonForMap-object">
                        <div class="addonForMap-object-header">
                            <div class="addonForMap-object-header-left">
                                <h2><?= $object['title'] ?></h2>
                                <p><?= $object['subtitle'] ?></p>
                            </div>

                            <a onclick="openObjectRu(<?= $object['id'] ?>)" class="addonForMap-object-header-link animate__animated animate__fadeIn"><img src="<?= Router::getSite() ?>/public/assets/images/arrow-dia.svg" alt=""></a>
                        </div>

                        <div class="addonForMap-object-preferenses">
                            <?php if($object['year']): ?>
                                <p class="addonForMap-preferense">
                                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M23.9296 0C24.2058 0 24.4296 0.223858 24.4296 0.5V2.81104H26.9677C29.1769 2.81104 30.9677 4.6019 30.9677 6.81104V8.48389H0V6.81103C0 4.60189 1.79086 2.81104 4 2.81104H6.06891V0.5C6.06891 0.223858 6.29277 0 6.56891 0C6.84505 0 7.06891 0.223858 7.06891 0.5V2.81104H23.4296V0.5C23.4296 0.223858 23.6535 0 23.9296 0ZM0 9.48389H30.9677V27.4678C30.9677 29.6769 29.1769 31.4678 26.9677 31.4678H4C1.79086 31.4678 0 29.6769 0 27.4678V9.48389ZM6.48387 15.4839C6.48387 15.2077 6.26001 14.9839 5.98387 14.9839C5.70773 14.9839 5.48387 15.2077 5.48387 15.4839V16.4839C5.48387 16.76 5.70773 16.9839 5.98387 16.9839C6.26001 16.9839 6.48387 16.76 6.48387 16.4839V15.4839ZM10.4839 15.4839C10.4839 15.2077 10.26 14.9839 9.98387 14.9839C9.70773 14.9839 9.48387 15.2077 9.48387 15.4839V16.4839C9.48387 16.76 9.70773 16.9839 9.98387 16.9839C10.26 16.9839 10.4839 16.76 10.4839 16.4839V15.4839ZM14.9839 15.4839C14.9839 15.2077 14.76 14.9839 14.4839 14.9839C14.2077 14.9839 13.9839 15.2077 13.9839 15.4839V16.4839C13.9839 16.76 14.2077 16.9839 14.4839 16.9839C14.76 16.9839 14.9839 16.76 14.9839 16.4839V15.4839ZM19.4839 15.4839C19.4839 15.2077 19.26 14.9839 18.9839 14.9839C18.7077 14.9839 18.4839 15.2077 18.4839 15.4839V16.4839C18.4839 16.76 18.7077 16.9839 18.9839 16.9839C19.26 16.9839 19.4839 16.76 19.4839 16.4839V15.4839ZM23.9839 15.4839C23.9839 15.2077 23.76 14.9839 23.4839 14.9839C23.2077 14.9839 22.9839 15.2077 22.9839 15.4839V16.4839C22.9839 16.76 23.2077 16.9839 23.4839 16.9839C23.76 16.9839 23.9839 16.76 23.9839 16.4839V15.4839ZM6.48387 21.9839C6.48387 21.7077 6.26001 21.4839 5.98387 21.4839C5.70773 21.4839 5.48387 21.7077 5.48387 21.9839V22.9839C5.48387 23.26 5.70773 23.4839 5.98387 23.4839C6.26001 23.4839 6.48387 23.26 6.48387 22.9839V21.9839ZM10.4839 21.9839C10.4839 21.7077 10.26 21.4839 9.98387 21.4839C9.70773 21.4839 9.48387 21.7077 9.48387 21.9839V22.9839C9.48387 23.26 9.70773 23.4839 9.98387 23.4839C10.26 23.4839 10.4839 23.26 10.4839 22.9839V21.9839ZM14.9839 21.9839C14.9839 21.7077 14.76 21.4839 14.4839 21.4839C14.2077 21.4839 13.9839 21.7077 13.9839 21.9839V22.9839C13.9839 23.26 14.2077 23.4839 14.4839 23.4839C14.76 23.4839 14.9839 23.26 14.9839 22.9839V21.9839ZM19.4839 21.9839C19.4839 21.7077 19.26 21.4839 18.9839 21.4839C18.7077 21.4839 18.4839 21.7077 18.4839 21.9839V22.9839C18.4839 23.26 18.7077 23.4839 18.9839 23.4839C19.26 23.4839 19.4839 23.26 19.4839 22.9839V21.9839ZM23.9839 21.9839C23.9839 21.7077 23.76 21.4839 23.4839 21.4839C23.2077 21.4839 22.9839 21.7077 22.9839 21.9839V22.9839C22.9839 23.26 23.2077 23.4839 23.4839 23.4839C23.76 23.4839 23.9839 23.26 23.9839 22.9839V21.9839Z" fill="#C72D37"/>
                                    </svg>

                                    Год:<br>
                                    <?= $object['year'] ?>
                                </p>
                            <?php endif; ?>

                            <?php if($object['installment']): ?>
                                <p class="addonForMap-preferense">
                                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 0C7.3873 0 0 7.3873 0 16.5C0 25.6127 7.3873 33 16.5 33C25.6127 33 33 25.6127 33 16.5C33 7.3873 25.6127 0 16.5 0ZM23.9021 10.7972C24.0662 10.5751 24.0193 10.262 23.7972 10.0979C23.5751 9.93377 23.262 9.98074 23.0979 10.2028L14.9252 21.26L10.3345 17.1284C10.1292 16.9436 9.81308 16.9603 9.62835 17.1655C9.44362 17.3708 9.46026 17.6869 9.66552 17.8716L14.6655 22.3716C14.7703 22.466 14.91 22.5116 15.0503 22.4975C15.1905 22.4833 15.3183 22.4106 15.4021 22.2972L23.9021 10.7972Z" fill="#C72D37"/>
                                    </svg>
                                    Рассрочка:<br>
                                    да
                                </p>
                            <?php endif; ?>


                            <?php if($object['payment']): ?>
                                <p class="addonForMap-preferense">
                                    <svg width="45" height="32" viewBox="0 0 45 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 0C1.79086 0 0 1.79086 0 4V28C0 30.2091 1.79086 32 4 32H41C43.2091 32 45 30.2091 45 28V4C45 1.79086 43.2091 0 41 0H4ZM6.625 4.17383C6.07272 4.17383 5.625 4.62154 5.625 5.17383V8.73905C5.625 9.29133 6.07272 9.73905 6.625 9.73905H11.6562C12.2085 9.73905 12.6562 9.29133 12.6562 8.73905V5.17383C12.6562 4.62154 12.2085 4.17383 11.6562 4.17383H6.625ZM28.125 5.06519C28.4011 5.06519 28.625 5.28904 28.625 5.56519V6.95649C28.625 7.23263 28.4011 7.45649 28.125 7.45649C27.8489 7.45649 27.625 7.23263 27.625 6.95649V5.56519C27.625 5.28904 27.8489 5.06519 28.125 5.06519ZM30.9375 5.06519C31.2136 5.06519 31.4375 5.28904 31.4375 5.56519V6.95649C31.4375 7.23263 31.2136 7.45649 30.9375 7.45649C30.6614 7.45649 30.4375 7.23263 30.4375 6.95649V5.56519C30.4375 5.28904 30.6614 5.06519 30.9375 5.06519ZM33.75 5.06519C34.0261 5.06519 34.25 5.28904 34.25 5.56519V6.95649C34.25 7.23263 34.0261 7.45649 33.75 7.45649C33.4739 7.45649 33.25 7.23263 33.25 6.95649V5.56519C33.25 5.28904 33.4739 5.06519 33.75 5.06519ZM36.5625 5.06519C36.8386 5.06519 37.0625 5.28904 37.0625 5.56519V6.95649C37.0625 7.23263 36.8386 7.45649 36.5625 7.45649C36.2864 7.45649 36.0625 7.23263 36.0625 6.95649V5.56519C36.0625 5.28904 36.2864 5.06519 36.5625 5.06519ZM7.53125 22.261C7.53125 21.9848 7.30739 21.761 7.03125 21.761C6.75511 21.761 6.53125 21.9848 6.53125 22.261V23.6523C6.53125 23.9284 6.75511 24.1523 7.03125 24.1523C7.30739 24.1523 7.53125 23.9284 7.53125 23.6523V22.261ZM10.3438 22.261C10.3438 21.9848 10.1199 21.761 9.84375 21.761C9.56761 21.761 9.34375 21.9848 9.34375 22.261V23.6523C9.34375 23.9284 9.56761 24.1523 9.84375 24.1523C10.1199 24.1523 10.3438 23.9284 10.3438 23.6523V22.261ZM13.1562 22.261C13.1562 21.9848 12.9324 21.761 12.6562 21.761C12.3801 21.761 12.1562 21.9848 12.1562 22.261V23.6523C12.1562 23.9284 12.3801 24.1523 12.6562 24.1523C12.9324 24.1523 13.1562 23.9284 13.1562 23.6523V22.261ZM15.9688 22.261C15.9688 21.9848 15.7449 21.761 15.4688 21.761C15.1926 21.761 14.9688 21.9848 14.9688 22.261V23.6523C14.9688 23.9284 15.1926 24.1523 15.4688 24.1523C15.7449 24.1523 15.9688 23.9284 15.9688 23.6523V22.261ZM18.7812 22.261C18.7812 21.9848 18.5574 21.761 18.2812 21.761C18.0051 21.761 17.7812 21.9848 17.7812 22.261V23.6523C17.7812 23.9284 18.0051 24.1523 18.2812 24.1523C18.5574 24.1523 18.7812 23.9284 18.7812 23.6523V22.261ZM7.03125 25.9349C6.75511 25.9349 6.53125 26.1588 6.53125 26.4349C6.53125 26.711 6.75511 26.9349 7.03125 26.9349H18.2812C18.5574 26.9349 18.7812 26.711 18.7812 26.4349C18.7812 26.1588 18.5574 25.9349 18.2812 25.9349H7.03125Z" fill="#C72D37"/>
                                    </svg>
                                    Первоначальный взнос:
                                    от <?= $object['payment'] ?>%
                                </p>
                            <?php endif; ?>
                        </div>

                        <p class="addonForMap-object-price">От <span><?= $object['from_price_m2'] ?> $</span> за м<sup>2</sup></p>
                        <?php if(Objects::checkPhoto($object['id'], $object['foto_coverHoriz'])): ?>
                            <img loading="lazy" class="addonForMap-object-cover" src="<?= Objects::getPhotoUrl($object['id'], 'foto_coverHoriz', $object['foto_coverHoriz']) ?>" alt="">
                        <?php else: ?>
                            <img class="addonForMap-object-cover" onload="imgLoaded(this)" src="<?= Objects::getPhotoUrl($object['id'], 'foto_coverHoriz', $object['foto_coverHoriz']) ?>" alt="">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="catalog-section section section-third">
        <?php require RU_MOD_PATH . 'contactus.module.php'?>
    </section>

</main>