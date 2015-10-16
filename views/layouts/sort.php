<style>
	.input_width
	{
		width:80px;	
	}
</style>

<form method="post">
	<div>
		Name:		
		<select class='input_width' name='name_order'>
			<option value='asc'>asc</option>
			<option value='desc'>desc</option>
		</select>
		<br><br><br>		
	</div>
    <div>
        Price:
        from:
        <input type='number' name='price_from' class='input_width' value='0'>
        to:
        <input type='number' name='price_to' class='input_width' value='0'>
    </div>

	<input type="submit" name='sort' value="Sort">	
</form>


