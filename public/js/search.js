const search = document.querySelector('input[placeholder="add ingredients"]');
const recipesContainer = document.querySelector(".recipes-wrapper");
const ingredientsWrapper = document.querySelector(".ingredients-wrapper");
const tagsWrapper = document.querySelector(".tags-wrapper");
const options = document.querySelectorAll(".option");
const inputDropdownContent = document.querySelector('.dropdown-content');


downloadSuggestions();
prepareTags();
fetchRecipes();

function prepareTags() {
    options.forEach(option => option.addEventListener("click", function (){
        addTag(option.innerHTML);
        fetchRecipes();
    }));
}

function addTag(name) {
    if(!document.getElementsByName(name).length){
        tagsWrapper.innerHTML += '<div class="tag" name="' + name + '">' +
            '<i onclick="removeParent(this)" class="fas fa-times-circle"></i>' + name + '</div>';
    }
}

function downloadSuggestions() {
    fetch("/searchRecipe", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
    }).then(function (response) {
        return response.json();
    }).then(function (suggestions){
        prepareSearch(suggestions);
    });
}

function prepareSearch(suggestions){
    search.addEventListener("keyup", function (event) {
        inputDropdownContent.innerHTML = " ";
        if (event.key === "Enter" && search.value) {
            addIngredient(search.value);
            search.value = '';
        }
        if(search.value) loadSuggestions(search.value, suggestions);
    });
}

function loadSuggestions(input, suggestions) {
    suggestions.forEach(suggestion => {
        if(suggestion.startsWith(input)) addSuggestion(suggestion);
    });
    establishSuggestionsBehaviour();
}

function addSuggestion(name) {
    inputDropdownContent.innerHTML += '<div class="option" name="' + name + '">' + name + '</div>';
}

function establishSuggestionsBehaviour() {
    document.querySelectorAll(".input-dropdown > .dropdown-content > .option")
        .forEach(child => child.addEventListener("click", function () {
            inputDropdownContent.innerHTML = " ";
            search.value = '';
            addIngredient(child.getAttribute("name"));
        }))
}

function addIngredient(name) {
    if(!document.getElementsByName(name).length){
        ingredientsWrapper.innerHTML += '<div class="ingredient" name="' + name + '">' +
            '<i onclick="removeParent(this)" class="fas fa-times-circle"></i>' + name + '</div>';
        fetchRecipes();
    }
}

function removeParent(element) {
    element.parentNode.remove(element);
    fetchRecipes();
}

function fetchRecipes(){
    let ingredients = getIngredients();
    let tags = getTags();
    const data = {
        ingredients: ingredients,
        tags: tags
    };

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

function getTags() {
    let tagElements = document.getElementsByClassName("tag");
    let tags = '';
    for(let i = 0; i < tagElements.length; i++){
        tags += tagElements[i].getAttribute("name") + "%";
    }
    return '%' + tags;
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
    ingredients.innerHTML = `Needed ingredients: ` + recipe.ingredients;

    const author = clone.querySelector(".author");
    author.innerHTML = `Added by: ` + recipe.username;

    recipesContainer.appendChild(clone);
}
