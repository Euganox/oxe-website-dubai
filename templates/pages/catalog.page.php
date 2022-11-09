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
                        <div>
                            <label class="filter-checkbox" for="Al_Barsha">
                                <input class="filter-checkbox-input" id="Al_Barsha" type="checkbox" name="Al_Barsha">
                                Al Barsha
                            </label>
                        </div>

                        <div>
                            <label class="filter-checkbox" for="Al_Safa">
                                <input class="filter-checkbox-input" id="Al_Safa" type="checkbox" name="Al_Safa">
                                Al Safa
                            </label>
                        </div>
                    </div>

                    <div id="type_block" class="catalog-filter-block">
                        <label class="filter-checkbox" for="One_bedroom">
                            <input class="filter-checkbox-input" id="One_bedroom" type="checkbox" name="One_bedroom">
                            One bedroom
                        </label>


                        <label class="filter-checkbox" for="Two_bedroom">
                            <input class="filter-checkbox-input" id="Two_bedroom" type="checkbox" name="Two_bedroom">
                            Two bedroom
                        </label>
                    </div>

                    <button type="submit" class="catalog-btn-filter btn btn-white-textred btn-text-bold">
                        filter
                        <svg class="svg-arrow-i" width="49" height="14" viewBox="0 0 49 13" xmlns="http://www.w3.org/2000/svg">
                            <path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>