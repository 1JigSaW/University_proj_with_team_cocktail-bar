<?php include "header.php";?>
<?php include "connect_bd.php";?>
<title>Подбор коктейля по ингридиентам</title>
<h1 class="display-4 text-center pb-1 pb-md-3">Подбор коктейля</h1>
<div class="row mt-2">
	<div class="col-6">
		<h3 class="display-5 d-none d-md-block">Имеющиеся ингридиенты:</h3>
	</div>
	<div class="col-12 col-md-6">
		<button type="button submit" name="search" form="isearch" class="btn btn-primary rounded text-white btn-lg btn-block">Подобрать</button>
	</div>
</div>

<form id="isearch" action = "isearch.php?sort=s" method = "post">
	<fieldset>
		<div class="control-group">
			<div class="row mt-4">
				<div class="col text-center">
					<label class="control-label d-none d-lg-block" for="select01"><h1>НАПИТКИ</h1></label>
					<label class="control-label d-lg-none" for="select01"><h3>НАПИТКИ</h3></label>
					<select id="select01" name="drink" class="form-control">
						<option value="0">Выберите</option>
						<?php
						//вывод всех напитков из базы данных
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
					<label class="control-label display-4 d-none d-lg-block" for="select02"><h1>ПРОДУКТЫ</h1></label>
					<label class="control-label display-5 d-lg-none" for="select02"><h3>ПРОДУКТЫ</h3></label>
					<select id="select02" name="product" class="form-control">
						<option value="0">Выберите</option>
						<?php
						//вывод всех продуктов из базы данных
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
					<button type="button submit" form="isearch.php?sort=s" name="add" value="drink" class="btn bg-success text-white btn-block">Добавить</button>
				</div>
				<div class="col text-center">
					<button type="button submit" form="isearch" name="add" value="product" class="btn bg-success text-white btn-block">Добавить</button>
				</div>
			</div>

			<?php
			//подсчет и вывод уже добавленных напитков и продуктов, а также вывод ошибок
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
						echo "<div class='row mt-2'>
								<div class='col-5 text-center d-none d-lg-block'>
									<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>
								</div>
								<div class='col-4 text-center d-none d-sm-block d-lg-none'>
									<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>
								</div>
								<div class='col-6 text-center d-sm-none'>
									<button type='button submit' form='isearch' name='remove_drink' value='" . $_SESSION['added_drink'][$i] . "' class='btn btn-primary btn-block'>" . $title['title_product'] . "</button>
								</div>
								<div class='col-1 text-center d-none d-sm-block'>
									<button type='button submit' form='isearch' name='remove_drink' value='" . $_SESSION['added_drink'][$i] . "' class='btn bg-danger text-white'><span class='oi oi-x'></span></button>
								</div>
								<div class='col-1 d-none d-sm-block d-md-block d-lg-none'></div>";
						$result = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '" . $_SESSION['added_product'][$i] . "'");
						$title = mysqli_fetch_assoc($result);
						echo "<div class='col-5 text-center d-none d-lg-block'>
									<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>
								</div>
								<div class='col-4 text-center d-none d-sm-block d-lg-none'>
									<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>
								</div>
								<div class='col-6 text-center d-sm-none'>
									<button type='button submit' form='isearch' name='remove_product' value='" . $_SESSION['added_product'][$i] . "' class='btn btn-primary btn-block'>" . $title['title_product'] . "</button>
								</div>
								<div class='col-1 text-center d-none d-sm-block'>
									<button type='button submit' form='isearch' name='remove_product' value='" . $_SESSION['added_product'][$i] . "' class='btn bg-danger text-white'><span class='oi oi-x'></span></button>
								</div>
								<div class='col-1 d-none d-sm-block d-md-block d-lg-none'></div>
							  </div>";
						$num_drink--;
						$num_prod--;
						$i++;
					endwhile;
				if(isset($num_drink) && $num_drink)
					while ($num_drink):
						$result = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '" . $_SESSION['added_drink'][$i] . "'");
						$title = mysqli_fetch_assoc($result);
						echo "<div class='row mt-2'>
								<div class='col-5 text-center d-none d-lg-block'>
									<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>
								</div>
								<div class='col-4 text-center d-none d-sm-block d-lg-none'>
									<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>
								</div>
								<div class='col-6 text-center d-sm-none'>
									<button type='button submit' form='isearch' name='remove_drink' value='" . $_SESSION['added_drink'][$i] . "' class='btn btn-primary btn-block'>" . $title['title_product'] . "</button>
								</div>
								<div class='col-1 text-center d-none d-sm-block'>
									<button type='button submit' form='isearch' name='remove_drink' value='" . $_SESSION['added_drink'][$i] . "' class='btn bg-danger text-white'><span class='oi oi-x'></span></button>
								</div>
								<div class='col-1 d-none d-sm-block d-md-block d-lg-none'></div>
								<div class='col-6'>";
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
						echo "</div>";
						echo "<div class='col-5 text-center d-none d-lg-block'>
									<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>
								</div>
								<div class='col-4 text-center d-none d-sm-block d-lg-none'>
									<button type='button' class='btn btn-primary btn-block' disabled>" . $title['title_product'] . "</button>
								</div>
								<div class='col-6 text-center d-sm-none'>
									<button type='button submit' form='isearch' name='remove_product' value='" . $_SESSION['added_product'][$i] . "' class='btn btn-primary btn-block'>" . $title['title_product'] . "</button>
								</div>
								<div class='col-1 text-center d-none d-sm-block'>
									<button type='button submit' form='isearch' name='remove_product' value='" . $_SESSION['added_product'][$i] . "' class='btn bg-danger text-white'><span class='oi oi-x'></span></button>
								</div>
								<div class='col-1 d-none d-sm-block d-md-block d-lg-none'></div>
							  </div>";
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

<div class="row mt-2">
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

<?php include "footer.php";?>