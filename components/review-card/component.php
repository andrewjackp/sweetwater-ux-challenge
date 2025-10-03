<?php
function renderReviewCard($item) {
    extract($item);
    echo $title;
    include('template.php');
}

// could do it w/o interpolation
// write render function