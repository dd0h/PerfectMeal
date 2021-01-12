<?php if(isset($messages) and !empty($messages)) foreach($messages as $message)
    echo '
    <a href="viewRecipe?id='.$message["id"].'">
       <div class="recipe-frame">
          <img name="food-photo" src="public/uploads/'.$message["image"].'">
          <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <div class="recipe-name">'.$message["title"].'</div>
          <div class="needed-ingredients">You also need: '.$message["ingredients"].'</div>
          <div class="author">Added by: '.$message["author"].'</div>   
       </div> 
     </a>     
';?>
