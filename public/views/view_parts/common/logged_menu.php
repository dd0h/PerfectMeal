<div class="logged-menu">
    <div class="forms">
        <form action="addRecipe" method="GET">
            <button type="submit"><p>Add Recipe</p></button>
        </form>
        <form action="logout" method="POST">
            <button type="submit"><p>Logout</p></button>
        </form>
    </div>
    <div class="logged-as">Logged as: <?php if(isset($username)) echo $username ?></div>
</div>
