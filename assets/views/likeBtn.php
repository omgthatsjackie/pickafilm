<div class="column1__btn like-btn">
							<!-- ==== [ALEX] ==== -->
							<!-- если не лайкнуто, то в like-btn__noLikeText вставь класс active -->
							<!-- если лайкнуто, то уже в like-btn__likeText вставь класс active -->
							<button class="like-btn__button">
								<span class="like-btn__noLikeText <?php if (!$isLiked) echo "active";?>">Лайкнуть</span>
								<span class="like-btn__likeText <?php if ($isLiked) echo "active";?>">Добавлено в коллекцию</span>

							</button>

							<!-- если лайкнуто то ставь тут класс liked -->
							<!-- так при запуске странице иконка сразу будет белая -->
							<svg class="like-btn__icon <?php if ($isLiked) echo "liked";?> spriteIcon">
								<use xlink:href="./assets/images/sprite.svg#heart"/>
							</svg>
</div>