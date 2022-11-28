<?php

if (isset($_GET['openObject'])) {
    $object = Objects::getOneObject($_POST['id']);
    $object = $object[0];
    $imgs = unserialize($object['foto']);

    $toEcho = "<div class='ajax-modal'>";
        $toEcho .= "<div id='contactInModal' class='contactInModal animate__animated animate__fadeIn'>";
            $toEcho .= "<form id='contactInModal-form'>";
                $toEcho .= '<div class="contactUs-form-input-block">';
                    $toEcho .= '<label for="name" class="contactUs-form-label">Your name</label><input id="name" name="name" type="text" class="contactUs-form-input">';
                $toEcho .= '</div>';

                $toEcho .= '<div class="contactUs-form-input-block">';
                    $toEcho .= '<label for="phone" class="contactUs-form-label">Your phone</label><input id="phone" name="phone" type="tel" class="contactUs-form-input">';
                $toEcho .= '</div>';

                $toEcho .= '<div class="contactUs-form-btn-place">';
                    $toEcho .= '<p class="contactUs-form-term">By clicking «send» you agree to the privacy policy</p>';
                    $toEcho .= '<button class="btn btn-white-textred btn-text-bold">send';
                        $toEcho .= '<svg class="svg-arrow-i" width="49" height="14" viewBox="0 0 49 13" xmlns="http://www.w3.org/2000/svg"><path d="M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z" /></svg>';
                    $toEcho .= '</button>';
                    $toEcho .= '<a class="contactUs-form-btn-place-close">or close this form</a>';
                $toEcho .= '</div>';
            $toEcho .= "</form>";
        $toEcho .= "</div>";
        $toEcho .= "<a class='ajax-modal-close'>X</a>";



        $toEcho .= "<div id='ajax-modal-slider' class='ajax-modal-left'>";
            foreach ($imgs as $img) {
                $toEcho .= "<img class='ajax-modal-img' onload='imgLoaded(this)' src='https://crm.oxecapital.ru/export/img.php?watermark=false&img=files/int/objects_dubai/${object['id']}/foto/${img['src']}'>";
            }
        $toEcho .= "</div>";

        $toEcho .= "<div class='ajax-modal-right'>";
            $toEcho .= "<div class='ajax-modal-header'>";
                $toEcho .= "<div class='ajax-modal-header-left'>";
                    $toEcho .= "<h1 class='ajax-modal-header-title'>${object['title']}</h1>";
                    $toEcho .= "<p class='ajax-modal-header-discr'>${object['subtitle']}</p>";
                $toEcho .= "</div>";

                $toEcho .= "<a class='btn-contactUs btn btn-red-border btn-height'>contact us <svg class='svg-arrow-i' width='49' height='14' viewBox='0 0 49 13' xmlns='http://www.w3.org/2000/svg'><path d='M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z' /></svg></a>";
            $toEcho .= "</div>";

            $toEcho .= "<div class='ajax-modal-body'>";
                $toEcho .= "<div class='ajax-modal-block ajax-modal-opp'>";
                    if ($object['installment']) $toEcho .= "<div class='ajax-modal-opp-item'><p>Possibility of instalments</p> <p>yes</p></div>";
                    else $toEcho .= "<div class='ajax-modal-opp-item'><p>Possibility of instalments</p> <p>no</p></div>";

                    if(isset($object['payment']) && !empty($object['payment'])) $toEcho .= "<div class='ajax-modal-opp-item'><p>Initial payment</p> <p>${object['payment']}%</p></div>";

                    $toEcho .= "<div class='ajax-modal-opp-item'><p>Year of completion</p> <p>${object['year']}</p></div>";
                    $toEcho .= "<div class='ajax-modal-opp-item'><p>Cost</p> <p>from ${object['from_price_m2']} $</p></div>";
                $toEcho .= "</div>";

                $toEcho .= "<div class='ajax-modal-block ajax-modal-types'>";
                    $toEcho .= "<h3 class='ajax-modal-subtitle'>Types of apartments</h3>";
                    $toEcho .= "<div class='ajax-modal-types-block'>";
                        if (strpos($object['types_of_apart'], '1B') !== false) $toEcho .= "<div><div class='ajax-modal-types-icon'>1</div><p class='ajax-modal-types-p'>One bedroom</p></div>";
                        if (strpos($object['types_of_apart'], '2B') !== false) $toEcho .= "<div><div class='ajax-modal-types-icon'>2</div><p class='ajax-modal-types-p'>Two-bedroom</p></div>";
                        if (strpos($object['types_of_apart'], '3B') !== false) $toEcho .= "<div><div class='ajax-modal-types-icon'>3</div><p class='ajax-modal-types-p'>Three-bedroom</p></div>";
                        if (strpos($object['types_of_apart'], '2S') !== false) $toEcho .= "<div><div class='ajax-modal-types-icon'>2</div><p class='ajax-modal-types-p'>Two-storey</p></div>";
                        if (strpos($object['types_of_apart'], 'P') !== false) $toEcho .= "<div><div class='ajax-modal-types-icon'>P</div><p class='ajax-modal-types-p'>Penthouse</p></div>";
                        if (strpos($object['types_of_apart'], 'V') !== false) $toEcho .= "<div><div class='ajax-modal-types-icon'>V</div><p class='ajax-modal-types-p'>Villas</p></div>";
                    $toEcho .= "</div>";
                $toEcho .= "</div>";

                $toEcho .= "<div class='ajax-modal-block ajax-modal-description'>";
                    $toEcho .= "<h3 class='ajax-modal-subtitle'>Object description</h3>";
                    $toEcho .= "<div class='ajax-modal-description-text'>
                        ${object['description']}
                    </div>";
                $toEcho .= "</div>";

                $toEcho .= "<div class='ajax-modal-block ajax-modal-bottom'>";
                    $toEcho .= "<h3 class='ajax-modal-subtitle'>Leave an enquiry and we will tell you more</h3>";
                    $toEcho .= "<a class='btn-contactUs btn btn-red-textwhite btn-height'>contact us</a>";
                $toEcho .= "</div>";
            $toEcho .= "</div>";
        $toEcho .= "</div>";

    $toEcho .= "</div>";

    $result = ['type' => 'success', 'text' => $toEcho];
    echo json_encode($result);
    exit();
}