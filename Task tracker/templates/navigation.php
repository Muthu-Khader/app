<?php
function load_nav(){?>

<div class="navigation">
    <input type="checkbox" class="navigation__checkbox" id="navi-toggle" />
    <label for="navi-toggle" class="navigation__button"
        ><span class="navigation__icon">&nbsp;</span></label
        >
        
        <div class="navigation__background">&nbsp;</div>
        <nav class="navigation__nav">
        <ul class="navigation__list">
        <li class="navigation__item">
        <a href="#" class="navigation__link"
        >Add new employess</a
        >
        </li>
        <li class="navigation__item">
        <a href="#" class="navigation__link">Track task status</a>
        </li>
        <li class="navigation__item">
        <a href="#" class="navigation__link"
        >Assign task</a
        >
        </li>
        <li class="navigation__item">
        <a href="#" class="navigation__link">Stories</a>
        </li>
        <li class="navigation__item">
        <a href="#" class="navigation__link">Book now</a>
        </li>
        </ul>
      </nav>
</div>
<?php
}?>