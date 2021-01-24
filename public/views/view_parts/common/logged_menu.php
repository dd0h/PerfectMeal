<div class="logged-menu">
    <div class="forms">
        <form action="addRecipe" method="GET">
            <button type="submit">Add Recipe</button>
        </form>
        <form action="logout" method="POST">
            <button type="submit">Logout</button>
        </form>
    </div>
    <div class="logged-as">Logged as: <?php if(isset($username)) echo $username ?></div>
</div>
