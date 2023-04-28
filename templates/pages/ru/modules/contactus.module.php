<?php
$currentPage = Router::getCurrentPage();
$photoUrl = '';

if ($currentPage === 'home') $photoUrl          = Router::getSite() . '/public/assets/images/dubai_view3.webp';
else if ($currentPage === 'about') $photoUrl    = Router::getSite() . '/public/assets/images/aboutpage5.webp';
else if ($currentPage === 'services') $photoUrl = Router::getSite() . '/public/assets/images/servicespage2.webp';
else if ($currentPage === 'contacts') $photoUrl = Router::getSite() . '/public/assets/images/contactspage1.webp';
else if ($currentPage === 'catalog') $photoUrl  = Router::getSite() . '/public/assets/images/catalogpage1.webp';

if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['phone']) && !empty($_POST['phone'])) {
        DB::insert('soho_calls',
            [
                'source' => 'OXE GROUP Site',
                'country' => 'ОАЭ',
                'city' => 'Dubai',
                'call_tp' => 'Buy',
                'realty_tp' => 'int',
                'cl_name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'secretar_comment' => "Phone - ${_POST['phone']}",
                'obj_name' => !empty($_POST['obj_name']) ? $_POST['obj_name'] : ''
            ]
        );

        $subject = 'Новая заявка из OxeGroup.ae';

        if (!empty($_POST['obj_name'])) $body = "В СРМ заведена новая заявка из сайта OxeGroup.ae по объекту <b>${_POST['obj_name']}</b>.<br><br> Нужно определить ответственного брокера для неё.";
        else $body = "В СРМ заведена новая заявка из сайта OxeGroup.ae.<br><br> Нужно определить ответственного брокера для неё.";


        $file = fopen ("https://staging-crm.oxecapital.ru/export/api/sendMail.php?to=kondakov@oxe.capital&subject=${subject}&body=${body}", "r");
        if (!$file) {
            echo '=(';
        }

        fclose($file);

        header("Location: https://${_SERVER['HTTP_HOST']}/");
    }
}

?>

<section id="contactUs" class="contactUs">
    <img id="contactUs-img" src="<?= $photoUrl ?>" alt="">

    <div class="contactUs-right">
        <div class="contactUs-top">
            <h1 class="contactUs-title fz-3-5-rem font-arolse-serif color-white">СВЯЖИТЕСЬ С НАМИ</h1>
            <p class="contactUs-descr fz-1-rem color-white">
                Оставьте свои контактные данные и мы перезвоним вам в течение 10 минут
            </p>
        </div>

        <form method="POST" class="contactUs-form">
            <div class="contactUs-form-input-block">
                <label for="name" class="contactUs-form-label">
                    Ваше имя
                </label>
                <input id="name" name="name" type="text" class="contactUs-form-input">
            </div>

            <div class="contactUs-form-input-block">
                <label for="phone" class="contactUs-form-label">
                    Номер телефона
                </label>
                <input id="phone" name="phone" type="tel" class="contactUs-form-input">
            </div>

            <div class="contactUs-form-btn-place">
                <p class="contactUs-form-term">
                    нажимая “отправить” вы соглашаетесь с политикой конфиденциальности
                </p>
                <button class="btn btn-white-textred btn-text-bold">
                    отправить
                    <svg class="svg-arrow-i" width="49" height="14" viewBox="0 0 49 13" xmlns="http://www.w3.org/2000/svg">
                        <path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</section>