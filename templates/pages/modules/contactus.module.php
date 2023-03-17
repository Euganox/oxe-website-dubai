<?php
$currentPage = currentPage($_SERVER["REQUEST_URI"]);
$photoUrl = '';

if (empty($currentPage)) $photoUrl = '/public/assets/images/dubai_view3.webp';
else if ($currentPage === 'about') $photoUrl = '/public/assets/images/aboutpage5.webp';
else if ($currentPage === 'services') $photoUrl = '/public/assets/images/servicespage2.webp';
else if ($currentPage === 'contacts') $photoUrl = '/public/assets/images/contactspage1.webp';
else if ($currentPage === 'catalog') $photoUrl = '/public/assets/images/catalogpage1.webp';

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

        header("Location: http://${_SERVER['HTTP_HOST']}/");
    }
}

?>

<section id="contactUs" class="contactUs">
    <img id="contactUs-img" src="<?= $photoUrl ?>" alt="">

    <div class="contactUs-right">
        <div class="contactUs-top">
            <h1 class="contactUs-title fz-4-rem font-arolse-serif color-white">CONTACT US</h1>
            <p class="contactUs-descr fz-1-3-rem color-white">Leave your details, and we will call you back within 10 minutes</p>
        </div>

        <form method="POST" class="contactUs-form">
            <div class="contactUs-form-input-block">
                <label for="name" class="contactUs-form-label">Your name</label>
                <input id="name" name="name" type="text" class="contactUs-form-input">
            </div>

            <div class="contactUs-form-input-block">
                <label for="phone" class="contactUs-form-label">Your phone</label>
                <input id="phone" name="phone" type="tel" class="contactUs-form-input">
            </div>

            <div class="contactUs-form-btn-place">
                <p class="contactUs-form-term">By clicking «send» you agree to the privacy policy</p>
                <button class="btn btn-white-textred btn-text-bold">send
                    <svg class="svg-arrow-i" width="49" height="14" viewBox="0 0 49 13" xmlns="http://www.w3.org/2000/svg">
                        <path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</section>