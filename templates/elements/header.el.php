<header class="header flex-default-sb-c">
    <div class="header-lg-2 header-sm-1 for-nav">
        <?php if(Router::getLocale() === 'RU'): ?>
            <a href="/ru/" class="header-logo"><img src="/public/assets/images/whitelogo.webp" alt="" class="header-logo-img"></a>
        <?php else: ?>
            <a href="/" class="header-logo"><img src="/public/assets/images/whitelogo.webp" alt="" class="header-logo-img"></a>
        <?php endif; ?>
        <div class="fat-nav">
            <div class="fat-nav__wrapper">
                <ul>
                    <?php if(Router::getLocale() === 'RU'): ?>
                        <li><a href="/ru/home">Главная</a></li>
                        <li><a href="/ru/catalog">Каталог</a></li>
                        <li><a href="/ru/about">О нас</a></li>
                        <li><a href="/ru/services">Услуги</a></li>
                        <li><a href="/ru/contacts">Контакты</a></li>
                    <?php else: ?>
                        <li><a href="/home">Home</a></li>
                        <li><a href="/catalog">Catalog</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/contacts">Our Contacts</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-lg-2 display-sm-none">
        <a href="tel:97142438653" class="header-tel fz-20-px"><img src="/public/assets/images/phone.png" alt="" class="header-tel-img">+971 4 243 8653</a>
    </div>
</header>