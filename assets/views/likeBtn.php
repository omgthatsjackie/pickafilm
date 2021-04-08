<div class="column1__btn like-btn">
  <button class="like-btn__button">
    <span class="like-btn__noLikeText <?php if (!$isLiked) echo "active"; ?>">Лайкнуть</span>
    <span class="like-btn__likeText <?php if ($isLiked) echo "active"; ?>">Добавлено в коллекцию</span>
  </button>
  <svg class="like-btn__icon <?php if ($isLiked) echo "liked"; ?> spriteIcon">
    <use xlink:href="./assets/images/sprite.svg#heart"/>
  </svg>
</div>