<?php

if (isset($_GET['openObject'])) {
    $object = Objects::getOneObject($_POST['id']);

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
            $toEcho .= "<img class='ajax-modal-img' src='/public/images/creek/creek_card.png'>";
            $toEcho .= "<img class='ajax-modal-img' src='/public/images/creek/creek_card.png'>";
            $toEcho .= "<img class='ajax-modal-img' src='/public/images/creek/creek_card.png'>";
            $toEcho .= "<img class='ajax-modal-img' src='/public/images/creek/creek_card.png'>";
            $toEcho .= "<img class='ajax-modal-img' src='/public/images/creek/creek_card.png'>";
            $toEcho .= "<img class='ajax-modal-img' src='/public/images/creek/creek_card.png'>";
        $toEcho .= "</div>";

        $toEcho .= "<div class='ajax-modal-right'>";
            $toEcho .= "<div class='ajax-modal-header'>";
                $toEcho .= "<div class='ajax-modal-header-left'>";
                    $toEcho .= "<h1 class='ajax-modal-header-title'>Peninsula</h1>";
                    $toEcho .= "<p class='ajax-modal-header-discr'>Business Bay</p>";
                $toEcho .= "</div>";

                $toEcho .= "<a class='btn-contactUs btn btn-red-border btn-height'>contact us <svg class='svg-arrow-i' width='49' height='14' viewBox='0 0 49 13' xmlns='http://www.w3.org/2000/svg'><path d='M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z' /></svg></a>";
            $toEcho .= "</div>";

            $toEcho .= "<div class='ajax-modal-body'>";
                $toEcho .= "<div class='ajax-modal-block ajax-modal-opp'>";
                    $toEcho .= "<div class='ajax-modal-opp-item'><p>Possibility of instalments</p> <p>yes</p></div>";
                    $toEcho .= "<div class='ajax-modal-opp-item'><p>Initial payment</p> <p>10%</p></div>";
                    $toEcho .= "<div class='ajax-modal-opp-item'><p>Year of completion</p> <p>2030</p></div>";
                    $toEcho .= "<div class='ajax-modal-opp-item'><p>Cost per square metre</p> <p>от 1000 $</p></div>";
                $toEcho .= "</div>";

                $toEcho .= "<div class='ajax-modal-block ajax-modal-types'>";
                    $toEcho .= "<h3 class='ajax-modal-subtitle'>Types of apartments</h3>";
                    $toEcho .= "<div class='ajax-modal-types-block'>";
                        $toEcho .= "<div><div class='ajax-modal-types-icon'>1</div><p class='ajax-modal-types-p'>One bedroom</p></div>";
                        $toEcho .= "<div><div class='ajax-modal-types-icon'>2</div><p class='ajax-modal-types-p'>Two-bedroom</p></div>";
                        $toEcho .= "<div><div class='ajax-modal-types-icon'>3</div><p class='ajax-modal-types-p'>Three-bedroom</p></div>";
                        $toEcho .= "<div><div class='ajax-modal-types-icon'>1</div><p class='ajax-modal-types-p'>Two-storey</p></div>";
                        $toEcho .= "<div><div class='ajax-modal-types-icon'>P</div><p class='ajax-modal-types-p'>Penthouse</p></div>";
                    $toEcho .= "</div>";
                $toEcho .= "</div>";

                $toEcho .= "<div class='ajax-modal-block ajax-modal-description'>";
                    $toEcho .= "<h3 class='ajax-modal-subtitle'>Object description</h3>";
                    $toEcho .= "<div class='ajax-modal-description-text'>
                        <p>A luxurious designer apartment by De Grisogono, where the line between the richness of nature and the elegance of 
                        home is blurred and life is lived amongst the emerald splendour of trees and blooming tropical plants. He draws 
                        inspiration from the abundance of emeralds and diamonds found only in the most celebrated jewellery by the master 
                        jeweller. The splendour of the gemstones is reflected throughout the building, where exquisite greenery and gleaming 
                        facades surround you with impeccable splendour.</p>
                        <p>Safa One offers you two unique pools of golden sand. The horizons of the pools end only to begin with a sea view.</p>
                        <p>An advanced climate control system allows for tropical rainfall at certain hours, offering you an experience like 
                        nowhere else on earth. Safa One's location offers stunning views of Safa Park, Bulgari Island, Burj el Arab and 
                        Palm Jumeirah.</p>
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