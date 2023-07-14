					<table class="reporttable">
					<th>Dish</th>
					<th>Actions</th>
					<tr onclick="window.location.href='dishdetailed.php?dishname=dish'"><!--<?php echo $ingredientName; ?>-->
					<td> Spaghetti ala Luigi <!-- $Ingredientnmame --></td>
					<td> 
						<a href="dishentry.php?dishname=dish">Approve</a>
						<a href="<?php # ?>">Deny</a>
					<!--<form class="hellr" method="post">
        			<input type="submit" name="button1"
                		class="buttonapprove" value="Approve" />
        			<input type="submit" name="button2"
                		class="buttondeny" value="Deny" />
					</form>-->
					</td>
					</tr>
					</table>
    </body>
</html>