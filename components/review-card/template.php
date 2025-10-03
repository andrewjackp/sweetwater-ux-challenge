<?php 
    include('helpers/renderStars.php');
?>

<?php
function renderReviewCard($item) {

    $rating = $item['starRating'];

    return "
    <li class='card-item'>
        <article class='review-card'>
            <span class='title'>{$item['title']}</span>

            <div class='starRating' aria-label='Rating: {$item['starRating']} out of 5'>
                " . renderStars($rating, 5) . "
            </div>

            <p class='description'>{$item['description']}</p>
            
            <button class='toggle-btn' href='#' data-expanded='false'>Read More</button>

            <p class='user'>by {$item['user']}</p>

            <picture>
                <img src='{$item['imageUrl']}' alt='Review image'>
            </picture>
        </article>
    </li>";
}