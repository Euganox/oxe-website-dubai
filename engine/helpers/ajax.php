<?php

if (isset($_GET['openObject'])) {
    $object = Objects::getOneObject($_POST['id']);

    $toEcho = "<div class='ajax-modal'>";
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

                $toEcho .= "<a class='btn btn-red-border'>contact us <svg class='svg-arrow-i' width='49' height='14' viewBox='0 0 49 13' xmlns='http://www.w3.org/2000/svg'><path d='M42 0L40.59 1.41L45.17 6H0.5V8H45.17L40.58 12.59L42 14L49 7L42 0Z' /></svg></a>";
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
                $toEcho .= "</div>";

                $toEcho .= "<div class='ajax-modal-block ajax-modal-description'>";
                    $toEcho .= "<h3 class='ajax-modal-subtitle'>Object description</h3>";
                $toEcho .= "</div>";

                $toEcho .= "<div class='ajax-modal-block ajax-modal-bottom'>";
                    $toEcho .= "<h3 class='ajax-modal-subtitle'>Leave an enquiry and we will tell you more</h3>";
                    $toEcho .= "<a href='#'></a>";
                $toEcho .= "</div>";
            $toEcho .= "</div>";
        $toEcho .= "</div>";

    $toEcho .= "</div>";

    $result = ['type' => 'success', 'text' => $toEcho];
    echo json_encode($result);
    exit();
}