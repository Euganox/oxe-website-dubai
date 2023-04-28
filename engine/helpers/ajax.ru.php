<?php

if (isset($_GET['openObject'])) {
    $object = Objects::getOneObject($_POST['id']);
    $object = $object[0];
    $imgs = unserialize($object['foto']);
    $realtyTypes = Objects::getRealtyString($object['types_of_realty']);

    $toEcho = "<div class='ajax-modal'>";
    $toEcho .= "<div id='contactInModal' class='contactInModal animate__animated animate__fadeIn'>";
    $toEcho .= "<form method='post' id='contactInModal-form'>";
    $toEcho .= "<input hidden id='obj_name' value='${object['title']}' name='obj_name'>";
    $toEcho .= '<div class="contactUs-form-input-block">';
    $toEcho .= '<label for="name" class="contactUs-form-label">Ваше имя</label><input id="name" name="name" type="text" class="contactUs-form-input">';
    $toEcho .= '</div>';

    $toEcho .= '<div class="contactUs-form-input-block">';
    $toEcho .= '<label for="phone" class="contactUs-form-label">Ваш телефон</label><input id="phone" name="phone" type="tel" class="contactUs-form-input">';
    $toEcho .= '</div>';

    $toEcho .= '<div class="contactUs-form-btn-place">';
    $toEcho .= '<p class="contactUs-form-term">нажимая “отправить” вы соглашаетесь с политикой конфиденциальности</p>';
    $toEcho .= '<button class="btn btn-white-textred btn-text-bold">отправить';
    $toEcho .= '<svg class="svg-arrow-i" width="49" height="14" viewBox="0 0 49 13" xmlns="http://www.w3.org/2000/svg"><path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z" /></svg>';
    $toEcho .= '</button>';
    $toEcho .= '<a class="contactUs-form-btn-place-close">или закройте эту форму</a>';
    $toEcho .= '</div>';
    $toEcho .= "</form>";
    $toEcho .= "</div>";
    $toEcho .= "<a class='ajax-modal-close'>X</a>";


    $toEcho .="<div class='ajax-modal-photos'>";
    $toEcho .= "<div id='ajax-modal-slider' class='ajax-modal-left'>";
    foreach ($imgs as $img) {
        $toEcho .= "<div class='ajax-modal-slider-imgBlock'><img class='ajax-modal-img' onload='imgLoaded(this)' src='https://crm.oxecapital.ru/export/img.php?watermark=false&img=files/int/objects_dubai/${object['id']}/foto/${img['src']}'></div>";
    }
    $toEcho .= "</div>";
    $toEcho .= "</div>";

    $toEcho .= "<div class='ajax-modal-right'>";
    $toEcho .= "<div class='ajax-modal-header'>";
    $toEcho .= "<div class='ajax-modal-header-left'>";
    $toEcho .= "<h1 class='ajax-modal-header-title'>${object['title']}</h1>";
    $toEcho .= "<p class='ajax-modal-header-discr'>${object['subtitle']}</p>";
    $toEcho .= "</div>";

    $toEcho .= "</div>";

    $toEcho .= "<a class='btn-contactUs btn btn-red-border btn-height'>связаться с нами <svg class='svg-arrow-i' width='49' height='14' viewBox='0 0 49 13' xmlns='http://www.w3.org/2000/svg'><path d='M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z' /></svg></a>";

    $toEcho .= "<div class='ajax-modal-body'>";
    $toEcho .= "<div class='ajax-modal-block ajax-modal-opp'>";
    if ($object['installment']) $toEcho .= "<div class='ajax-modal-opp-item'><p>Первоначальный платеж</p> <p>да</p></div>";
    else $toEcho .= "<div class='ajax-modal-opp-item'><p>Первоначальный платеж</p> <p>нет</p></div>";

    if(isset($object['payment']) && !empty($object['payment'])) $toEcho .= "<div class='ajax-modal-opp-item'><p>Initial payment</p> <p>${object['payment']}%</p></div>";

    $toEcho .= "<div class='ajax-modal-opp-item'><p>Год сдачи</p> <p>${object['year']}</p></div>";
    $toEcho .= "<div class='ajax-modal-opp-item'><p>Цена (за м<sup>2</sup>)</p> <p>от ${object['from_price_m2']} $</p></div>";
    $toEcho .= "<div class='ajax-modal-opp-item'><p>Тип недвижимости</p> <p>$realtyTypes</p></div>";
    $toEcho .= "</div>";

    $toEcho .= "<div class='ajax-modal-block ajax-modal-types'>";
    $toEcho .= "<h3 class='ajax-modal-subtitle'>Количество комнат</h3>";
    $toEcho .= "<div class='ajax-modal-types-block'>";
    if (strpos($object['types_of_apart'], '1B') !== false) $toEcho .= "<div><div class='ajax-modal-types-icon'>1</div><p class='ajax-modal-types-p'>One bedroom</p></div>";
    if (strpos($object['types_of_apart'], '2B') !== false) $toEcho .= "<div><div class='ajax-modal-types-icon'>2</div><p class='ajax-modal-types-p'>Two-bedroom</p></div>";
    if (strpos($object['types_of_apart'], '3B') !== false) $toEcho .= "<div><div class='ajax-modal-types-icon'>3</div><p class='ajax-modal-types-p'>Three-bedroom</p></div>";
    if (strpos($object['types_of_apart'], '2S') !== false) $toEcho .= "<div><div class='ajax-modal-types-icon'>2</div><p class='ajax-modal-types-p'>Two-storey</p></div>";
    $toEcho .= "</div>";
    $toEcho .= "</div>";

    $toEcho .= "<div class='ajax-modal-block ajax-modal-description'>";
    $toEcho .= "<h3 class='ajax-modal-subtitle'>Описание объекта</h3>";
    $toEcho .= "<div class='ajax-modal-description-text'>
                        ${object['description']}
                    </div>";
    $toEcho .= "</div>";

    $toEcho .= "<div class='ajax-modal-block ajax-modal-bottom'>";
    $toEcho .= "<h3 class='ajax-modal-subtitle'>Отправьте заявку, чтобы получить дополнительную информацию</h3>";
    $toEcho .= "<a class='btn-contactUs btn btn-red-textwhite btn-height'>связаться с нами</a>";
    $toEcho .= "</div>";
    $toEcho .= "</div>";
    $toEcho .= "</div>";

    $toEcho .= "</div>";

    $result = ['type' => 'success', 'text' => $toEcho];
    echo json_encode($result);
    exit();
}