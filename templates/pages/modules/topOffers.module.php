<?php

$objects = getObjects(OBJECTS);

?>

<div class="swiper">
    <div class="swiper-header flex-default-sb-c">
        <h2 class="swiper-header-title font-arolse-serif fz-80-px">
            TOP <span class="font-arolse-serif-special font-arolse-serif fz-80-px">O</span>FFERS
        </h2>

        <div class="swiper-header-nav flex-default-sb-c">
            <div id="goToPrevSlide" class="swiper-header-nav-left">
                <svg class="swiper-header-nav-arrow swiper-header-nav-arrow-left" style="transform: rotate(180deg);" width="49" height="14" viewBox="0 0 49 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z"/>
                </svg>
            </div>

            <div id="goToNextSlide" class="swiper-header-nav-right">
                <svg class="swiper-header-nav-arrow swiper-header-nav-arrow-right" width="49" height="14" viewBox="0 0 49 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z"/>
                </svg>
            </div>
        </div>

        <a href="/catalog" class="btn btn-red-textwhite">go to catalog
            <svg class="svg-arrow-i" width="49" height="14" viewBox="0 0 49 13" xmlns="http://www.w3.org/2000/svg">
                <path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z" />
            </svg>
        </a>
    </div>
    <div id="toInsertModal"></div>
    <div id="features" class="swiper-catalog">
        <?php foreach ($objects as $object): ?>
            <div class="swiper-item" onclick="openObject(<?= $object['id'] ?>)" style="background-image: url('./public/images/<?= $object['img'] ?>');">

                <?php if(isset($object['tags']) && !empty($object['tags'])): ?>
                    <div class="swiper-tags">
                        <?php if(in_array('hottest', $object['tags'])): ?><img src="./public/assets/images/hottest.png" alt=""><?php endif; ?>
                        <?php if(in_array('topsales', $object['tags'])): ?><img src="./public/assets/images/topsales.png" alt=""><?php endif; ?>
                    </div>
                <?php endif; ?>

                <a class="swiper-item-link animate__animated animate__fadeIn"><img src="./public/assets/images/arrow-dia.svg" alt=""></a>

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
        <?php endforeach; ?>
    </div>
</div>
