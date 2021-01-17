const search = document.querySelector('input[placeholder="search ingredients"]');
const recipesContainer = document.querySelector(".recipes-wrapper");

const data = {search: search.value};
fetchRecipes(data);

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        const data = {search: this.value};
        fetchRecipes(data);
    }
});

function fetchRecipes(data){
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
    stars.innerHTML = '<i name="phantom-star" class="fas fa-star"></i>';
    for(let i = 0; i < recipe.getaveragerating; i++) stars.innerHTML += '<i class="fas fa-star"></i>'

    const title = clone.querySelector(".recipe-name");
    title.innerHTML = recipe.title;

    const ingredients = clone.querySelector(".needed-ingredients");
    ingredients.innerHTML = `You also need: ` + recipe.ingredients;

    const author = clone.querySelector(".author");
    author.innerHTML = `Added by: ` + recipe.username;

    recipesContainer.appendChild(clone);
}
