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
			<button type="button submit" name="search" form="isearch" class="btn border-white bg-primary rounded text-white btn-lg btn-block">Подобрать</button>
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
							$result = mysqli_query($connect, "SELECT * FROM `product` WHERE `type` = 'drink'");
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
							$result = mysqli_query($connect, "SELECT * FROM `product` WHERE `type` = 'product'");
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
					<div class="col text-center">
						<button type="button submit" form="isearch" name="add" value="drink" class="btn bg-success text-white btn-block">Добавить</button>
					</div>
					<div class="col text-center">
						<button type="button submit" form="isearch" name="add" value="product" class="btn bg-success text-white btn-block">Добавить</button>
					</div>
				</div>

				<?php
					$i = 0;
					if(isset($_GET['drink']) && isset($_GET['product']))
					{
						$_SESSION['drink'] = $_GET['drink'];
						$_SESSION['product'] = $_GET['product'];
					}
					if (isset($_SESSION['drink']) && isset($_SESSION['product']))
					{
						$num_drink = $_SESSION['drink'];
						$num_prod = $_SESSION['product'];
					}
					if(isset($num_drink) && isset($num_prod))
						while ($num_drink && $num_prod):
							$result = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '" . $_SESSION['added_drink'][$i] . "'");
							$title = mysqli_fetch_assoc($result);
							echo "<div class='row mt-2'><div class='col-5 text-center'>";
							echo "<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>";
							echo "</div><div class='col-1 text-center'>";
							echo "<button type='button submit' form='isearch' name='remove_drink' value='" . $_SESSION['added_drink'][$i] . "' class='btn bg-danger text-white btn-block'><span class='oi oi-x'></span></button>";
							$result = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '" . $_SESSION['added_product'][$i] . "'");
							$title = mysqli_fetch_assoc($result);
							echo "</div><div class='col-5 text-center'>";
							echo "<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>";
							echo "</div><div class='col-1 text-center'>";
							echo "<button type='button submit' form='isearch' name='remove_product' value='" . $_SESSION['added_product'][$i] . "' class='btn bg-danger text-white btn-block'><span class='oi oi-x'></span></button>";
							echo "</div></div>";
							$num_drink--;
							$num_prod--;
							$i++;
						endwhile;
					if(isset($num_drink) && $num_drink)
						while ($num_drink):
							$result = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '" . $_SESSION['added_drink'][$i] . "'");
							$title = mysqli_fetch_assoc($result);
							echo "<div class='row mt-2'><div class='col-5 text-center'>";
							echo "<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>";
							echo "</div><div class='col-1 text-center'>";
							echo "<button type='button submit' form='isearch' name='remove_drink' value='" . $_SESSION['added_drink'][$i] . "' class='btn bg-danger text-white btn-block'><span class='oi oi-x'></span></button>";
							echo "</div><div class='col-6 text-center'>";
							if (isset($_GET['error']) && $_GET['error'] == "product")
							{
								echo "<div class='alert alert-warning text-center' role='alert'>Выберите продукт</div>";
								$_GET['error'] = "no";
							}

							if (isset($_GET['error']) && $_GET['error'] == "same_product")
							{
								echo "<div class='alert alert-dark text-center' role='alert'>Продукт уже добавлен</div>";
								$_GET['error'] = "no";
							}
							echo "</div></div>";
							$num_drink--;
							$i++;
						endwhile;
					if(isset($num_prod) && $num_prod)
						while ($num_prod):
							echo "<div class='row mt-2'><div class='col-6 text-center'>";
							if (isset($_GET['error']) && $_GET['error'] == "drink")
							{
								echo "<div class='alert alert-warning text-center' role='alert'>Выберите напиток</div>";
								$_GET['error'] = "no";
							}
							if (isset($_GET['error']) && $_GET['error'] == "same_drink")
							{
								echo "<div class='alert alert-dark text-center' role='alert'>Напиток уже добавлен</div>";
								$_GET['error'] = "no";
							}

							$result = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '" . $_SESSION['added_product'][$i] . "'");
							$title = mysqli_fetch_assoc($result);
							echo "</div><div class='col-5 text-center'>";
							echo "<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>";
							echo "</div><div class='col-1 text-center'>";
							echo "<button type='button submit' form='isearch' name='remove_product' value='" . $_SESSION['added_product'][$i] . "' class='btn bg-danger text-white btn-block'><span class='oi oi-x'></span></button>";
							echo "</div></div>";
							$num_prod--;
							$i++;
						endwhile;
				?>
				<div class="row mt-2">
					<div class="col text-center">
						<?php
						if (isset($_GET['error']) && $_GET['error'] == "drink")
							echo "<div class='alert alert-warning text-center' role='alert' style='height: 50px;''>Выберите напиток</div>";
						if (isset($_GET['error']) && $_GET['error'] == "same_drink")
							echo "<div class='alert alert-dark text-center' role='alert'>Напиток уже добавлен</div>";
						?>
					</div>
					<div class="col text-center">
						<?php
						if (isset($_GET['error']) && $_GET['error'] == "product")
							echo "<div class='alert alert-warning text-center' role='alert'>Выберите продукт</div>";
						if (isset($_GET['error']) && $_GET['error'] == "same_product")
							echo "<div class='alert alert-dark text-center' role='alert'>Продукт уже добавлен</div>";
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
				echo "<a href='main.php' role='button' class='btn bg-secondary btn-sm text-white'>Окей</a></div>";
			}
			?>
		</div>
	</div>
</div>

<?php include "footer.php";?>