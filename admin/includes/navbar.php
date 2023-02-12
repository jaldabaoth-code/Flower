<nav class="navbar">
	<a href="/admin/admin.php">Admin</a>
   	<div class="dropdown">
     	<button  class="dropbtn">Category</button >
		<div class="dropdown-content">
			<a href="/admin/category/show.php">Show</a>
			<a href="/admin/category/add.php">Add</a>
			<a href="/admin/category/edit.php">Edit</a>
			<a href="/admin/category/delete.php">Delete</a>
		</div>
    </div>
	<div class="dropdown">
	<button  class="dropbtn">Product</button >
		<div class="dropdown-content">
			<a href="/admin/product/show.php">Show</a>
			<a href="/admin/product/add.php">Add</a>
			<a href="/admin/product/edit.php">Edit</a>
			<a href="/admin/product/delete.php">Delete</a>
		</div>
	</div>
</nav>

<script>
	(function($)
	{
		// Le menu caché
		var nav = $("nav");
			
		// Ajouter indicateur et plane au sous-menu des parents
		nav.find("li").each(function()
		{
			// Montrer les sous-menus en survolant
			$(this).mouseenter(function()
			{
				$(this).find("ul").stop(true, true).slideDown();
			});
					
			// Masquer les sous-menus à la sortie
			$(this).mouseleave(function()
			{
				$(this).find("ul").stop(true, true).slideUp();
			});
		});
	})(jQuery);
</script>