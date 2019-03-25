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
		<div class="col-6">
			<button type="button submit" form="isearch" class="btn border-white bg-primary rounded text-white btn-lg btn-block">Подобрать</button>
		</div>
	</div>

</div>

<div class="container mt-5">
	<form id="isearch" action = "isearch.php" method = "post">
		<fieldset>
			<div class="control-group">
				<div class="row">
					<div class="col text-center">
						<label class="control-label display-4" for="select01">НАПИТКИ</label>
						<select id="select01" name="drink" class="form-control">
							<option value="0">Выберите</option>
							<?php
							$result = mysqli_query($connect, "SELECT * FROM `product` WHERE `unit` = 'drink'");
								for ($i=0; $i<mysqli_num_rows($result); $i++)
								{
									$titles = mysqli_fetch_assoc($result);
									$title = $titles['title_product'];
									$id = $titles['id'];
									echo "<option ";
									if(isset($_SESSION['tmp']) && $_SESSION['tmp'] == $id)
									{
										echo "selected value=" . '"' . $id . '">' . $title . "</option>";
										session_unset($_SESSION['tmp']);
									}
									else
										echo "value=" . '"' . $id . '">' . $title . "</option>";
								}
							?>
						</select>
					</div>
					<div class="col text-center">
						<label class="control-label display-4" for="select02">ПРОДУКТЫ</label>
						<select id="select02" name="product" class="form-control">
							<option value="0">Выберите</option>
							<?php
							$result = mysqli_query($connect, "SELECT * FROM `product` WHERE `unit` = 'product'");
								for ($i=0; $i<mysqli_num_rows($result); $i++)
								{
									$titles = mysqli_fetch_assoc($result);
									$title = $titles['title_product'];
									$id = $titles['id'];
									echo "<option ";
									if(isset($_SESSION['tmp']) && $_SESSION['tmp'] == $id)
									{
										echo "selected value=" . '"' . $id . '">' . $title . "</option>";
										session_unset($_SESSION['tmp']);
									}
									else
										echo "value=" . '"' . $id . '">' . $title . "</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-5 text-center">
						<button type="button" class="btn btn-primary btn-block" disabled>Drink name</button>
					</div>
					<div class="col-1 text-center">
						<button type="button submit" form="isearch" name="add" value="product" class="btn bg-danger text-white btn-block">
							<span class="oi oi-x"></span>
						</button>
					</div>
					<div class="col-5 text-center">
						<button type="button" class="btn btn-primary btn-block" disabled>Product name</button>
					</div>
					<div class="col-1 text-center">
						<button type="button submit" form="isearch" name="add" value="product" class="btn bg-danger text-white btn-block">
							<span class="oi oi-x"></span>
						</button>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col text-center">
						<button type="button submit" form="isearch" name="add" value="drink" class="btn bg-success text-white btn-block">Добавить</button>
					</div>
					<div class="col text-center">
						<button type="button submit" form="isearch" name="add" value="product" class="btn bg-success text-white btn-block">Добавить</button>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col text-center">
						<?php
						if (isset($_GET['error']) && $_GET['error'] == "drink")
							echo "<div class='alert alert-warning text-center' role='alert'>Выберите напиток</div>";
						?>
					</div>
					<div class="col text-center">
						<?php
						if (isset($_GET['error']) && $_GET['error'] == "product")
							echo "<div class='alert alert-warning text-center' role='alert'>Выберите продукт</div>";
						?>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
</div>




<div class="container">
	<div class="row mt-5">
		<div class="col">
			<?php
			if (isset($_GET['error']) && $_GET['error'] == "choose")
			{
				echo "<div class='alert alert-danger text-center' role='alert'>Выберите хотя бы один ингридиент<br>";
				echo "<a href='main.php' role='button' class='btn bg-secondary btn-sm text-white'>Окей</a>" . "</div>";
			}
			?>
		</div>
	</div>
</div>

<?php include "footer.php";?>