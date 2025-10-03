<?php
    include('components/review-card/template.php');
?>

<ul class="review-card-list" id="review-card-list">
    <?php foreach ($reviews as $item): ?>
        <li class='review'>
            <?= renderReviewCard($item) ?>
        </li>
    <?php endforeach; ?>
</ul>

<script src='modules/review-list/script.js'>
</script>