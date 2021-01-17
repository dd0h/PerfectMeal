const search = document.querySelector('input[placeholder="search ingredients"]');
const recipesContainer = document.querySelector(".recipes-wrapper");
const ingredientsWrapper = document.querySelector(".ingredients-wrapper");


fetchRecipes({search: '%'});

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        addIngredient(this.value);
        fetchRecipes();
        search.value = '';
    }
});

function fetchRecipes(){
    let ingredients = getIngredients();
    //let tags = getTags(); TODO include tags to searching
    const data = {search: ingredients};

    fetch("/searchRecipe", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (recipes) {
        recipesContainer.innerHTML = "";
        loadRecipes(recipes)
    });
}

function getIngredients() {
    let ingredientElements = document.getElementsByClassName("ingredient");
    let ingredients = '';
    for(let i = 0; i < ingredientElements.length; i++){
        ingredients += ingredientElements[i].getAttribute("name") + "%";
    }
    return '%' + ingredients;
}

function addIngredient(name) {
    if(!document.getElementsByName(name).length)
        ingredientsWrapper.innerHTML += '<div class="ingredient" name="' + name + '">' +
            '<i onclick="removeParent(this)" class="fas fa-times-circle"></i>' + name + '</div>';
}

function removeParent(element) {
    element.parentNode.remove(element);
    fetchRecipes();
}

function loadRecipes(recipes) {
    recipes.forEach(recipe => {
        console.log(recipe);
        createRecipe(recipe);
    });
}

function createRecipe(recipe) {
    const template = document.querySelector("#recipe-template");

    const clone = template.content.cloneNode(true);

    const a = clone.querySelector("a");
    a.href = `viewRecipe?id=` + recipe.id;

    const image = clone.querySelector("img");
    image.src = `public/uploads/${recipe.image}`;

    const stars = clone.querySelector(".stars");
    if(recipe.getaveragerating == null)  stars.innerHTML = '<i name="phantom-star" class="fas fa-star"></i>';
    for(let i = 0; i < recipe.getaveragerating; i++) stars.innerHTML += '<i class="fas fa-star"></i>';

    const title = clone.querySelector(".recipe-name");
    title.innerHTML = recipe.title;

    const ingredients = clone.querySelector(".needed-ingredients");
    ingredients.innerHTML = `You also need: ` + recipe.ingredients;

    const author = clone.querySelector(".author");
    author.innerHTML = `Added by: ` + recipe.username;

    recipesContainer.appendChild(clone);
}
