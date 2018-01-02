<form action="<?php echo site_url(); ?>" class="search-form" method="get"> 
    <input type="text" id="s" name="s" placeholder="Tìm kiếm..." class="txt-search" required />
	<input name="post_type" value="product" type="hidden" />
    <button type="submit" class="btn-search">
		<span class="fa fa-search"></span>
	</button>
</form>