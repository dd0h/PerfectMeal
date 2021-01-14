<?php foreach($models['searchedRecipes'] as $searchedRecipe)
    echo '
    <a href="viewRecipe?id='.$searchedRecipe->getId().'">
       <div class="recipe-frame">
          <img name="food-photo" src="public/uploads/'.$searchedRecipe->getImage().'">
          <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <div class="recipe-name">'.$searchedRecipe->getTitle().'</div>
          <div class="needed-ingredients">You also need: '.$searchedRecipe->getIngredients().'</div>
          <div class="author">Added by: '.$searchedRecipe->getAuthor().'</div>   
       </div> 
     </a>     
';?>
