<?php include "header.php";?>
<?php include "connect_bd.php";?>

<div class="container">

	<div class="row">
		<div class="col"></div>
		<div class="col-7">
			<h1 class="display-3 text-center ">Подбор коктейля</h1>
		</div>
		<div class="col"></div>
	</div>

	<div class="row mt-2">
		<div class="col">
			<h2 class="display-5">Имеющиеся ингридиенты:</h2>
		</div>
		<div class="col-2">
			<button type="button submit" form="isearch" class="btn border-white bg-primary rounded text-white btn-lg btn-block">Подобрать</button>
		</div>
	</div>

</div>

<form id="isearch" class="form-horizontal" action = "isearch.php" method = "post">
	<fieldset>
		<div class="control-group">
			<div class="container mt-5">
				<div class="row">
					<div class="col">
						<label class="control-label" for="select01">Крепкоалкогольные</label>
							<select id="select01" name="product1" multiple class="form-control" size="10">
								<?php
								$result = mysqli_query($connect, "SELECT * FROM `product`");
								for ($i=0; $i<mysqli_num_rows($result); $i++)
								{
									$titles = mysqli_fetch_assoc($result);
									$title = $titles['title_product'];
									$id = $titles['id'];
									echo "<option value=" . '"' . $id . '">' . $title . "</option>";
								}
								?>
							</select>
					</div>
					<div class="col">
						<label class="control-label" for="select02">Среднеалкогольные</label>
							<select id="select02" name="product2" multiple class="form-control" size="10">
								<option>Выберите</option>
								<option>Водка</option>
								<option>Пиво</option>
								<option>Водка</option>
								<option>Пиво</option>
								<option>Под</option>
								<option>Конец</option>
								<option>Корпоратива</option>
							</select>
					</div>
					<div class="col">
						<label class="control-label" for="select03">Слабоалкогольные</label>
							<select id="select03" name="product3" multiple class="form-control" size="10">
								<option>Выберите</option>
								<option>Водка</option>
								<option>Пиво</option>
								<option>Водка</option>
								<option>Пиво</option>
								<option>Под</option>
								<option>Конец</option>
								<option>Корпоратива</option>
							</select>
					</div>
					<div class="col">
						<label class="control-label" for="select04">Безалкогольные</label>
							<select id="select04" name="product4" multiple class="form-control" size="10">
								<option>Выберите</option>
								<option>Водка</option>
								<option>Пиво</option>
								<option>Водка</option>
								<option>Пиво</option>
								<option>Под</option>
								<option>Конец</option>
								<option>Корпоратива</option>
							</select>
					</div>
					<div class="col">
						<label class="control-label" for="select05">Продукты</label>
							<select id="select05" name="product5" multiple class="form-control" size="10">
								<option>Выберите</option>
								<option>Водка</option>
								<option>Пиво</option>
								<option>Водка</option>
								<option>Пиво</option>
								<option>Под</option>
								<option>Конец</option>
								<option>Корпоратива</option>
							</select>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
</form>

<?php include "footer.php";?>