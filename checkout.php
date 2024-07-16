<?php include('partials-front/header.php'); ?>
<?php 
	$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : []; 
?>	

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
	  	<p class="breadcrumbs"><span class="mr-2">TRANG </span></p>
        <h1 class="mb-0 bread">Thanh toán</h1>
      </div>
    </div>
  </div>
</div>
<?php
	if(isset($_SESSION['id'])){
		$user_id = $_SESSION['id'];
	}
	
	if(isset($_POST['submit'])){
		if(isset($_SESSION['user'])){
			$user_id; 
			$status = 'Chờ xác nhận';			
			$first_name = $_POST['first_name']; 
			$last_name = $_POST['last_name'];
			$address = $_POST['address']; 
			$city = $_POST['city'];
			$distric = $_POST['distric'];
			$ward = $_POST['ward'];
			$contact = $_POST['contact'];
			$order_date = date("Y-m-d h:i:sa"); 
			?>
				<?php $price_total = 0 ?>
				<?php foreach ($cart as $key => $value): 
					if (isset($value['price']) && isset($value['qty'])) {
						$price_total += ($value['price'] * $value['qty']);
					}
				?>
				<?php endforeach ?>
			<?php

			$sql = "INSERT INTO tbl_order SET
				user_id = '$user_id', 
				status = '$status',
				first_name ='$first_name', 
				last_name = '$last_name',
				address = '$address', 
				city = '$city', 
				district = '$distric', 
				ward = '$ward',
				contact = '$contact',
				total = '$price_total',
				order_date = '$order_date'
			";

			$res = mysqli_query($conn, $sql);

			if($res==TRUE){
				?>
					<?php
						$sql2 = "SELECT * FROM tbl_order"; 
						$res2 = mysqli_query($conn, $sql2); 
						if($res2 == TRUE){
							$rows2 = mysqli_num_rows($res2);
							while($rows2 = mysqli_fetch_assoc($res2)){
								$order_id = $rows2['order_id'];
							}
						}
					?>
				<?php
				foreach($cart as $value){
					if (isset($value['price']) && isset($value['qty'])) {
						mysqli_query($conn, "INSERT INTO tbl_order_detail(order_id, product_id, product_name, image_name, qty, price) VALUES ('$order_id','$value[id]','$value[title]', '$value[image_name]', '$value[qty]', '$value[price]')");
					}
				}
				unset($_SESSION['cart']);
				echo "<script>alert('Bạn đã đặt hàng thành công thành công!');</script>";
				echo "<script>window.location.href = 'index.php';</script>";
				
			}
		}else{
			echo '<script>alert("Bạn cần đăng nhập để mua hàng!")</script>';				
		}
	}
?>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 ftco-animate">
			<form action="" class="billing-form" method = "POST">
				<?php
					if(isset($_GET['id'])){
						$id_user = $_GET['id'];
					}
				?>
				<?php
					if(isset($_SESSION['user'])){
						?>
							<p class="mb-4 billing-heading">Xin chào <?php echo $_SESSION['user'];  ?></p>
							<?php 
								$sql3 = "SELECT * FROM tbl_address_user WHERE user_id = $id_user"; 
								$res3 = mysqli_query($conn, $sql3); 
								$count3 = mysqli_num_rows($res3); 
								if($count3 > 0){
									$row3 = mysqli_fetch_assoc($res3); 	
									$first_name = $row3['first_name'];
									$last_name = $row3['last_name']; 
									$address = $row3['address']; 
									$city = $row3['city']; 
									$distric = $row3['distric']; 
									$ward = $row3['ward']; 
									$contact = $row3['contact']; 
									$email = $row3['email'];
								}
							?>
						<?php
					}else{
						?>
							<a href="login.php?action=checkout" class="mb-4 billing-heading">Đăng nhập</a>
						<?php
					}
				?>

				<br><br>
				<h3 class="mb-4 billing-heading">Thông tin vận chuyển</h3>
				<div class="row align-items-end">
					<div class="col-md-6">
						<div class="form-group">
							<label for="firstname">Họ</label>
							<input type="text" class="form-control" name="first_name" required
							value="<?php
								if(isset($_SESSION['user'])){
									// echo $first_name; 
								}
							?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="lastname">Tên</label>
							<input type="text" class="form-control"  name="last_name" required			  
							value="<?php
								if(isset($_SESSION['user'])){
									// echo $last_name; 
								}
							?>" >
						</div>
					</div>
					<div class="w-100"></div>
					<div class="w-100"></div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="streetaddress" >Địa chỉ nhận</label>
							<input type="text" class="form-control" name="address" required value="<?php if(isset($_SESSION['user'])){
								// echo $address; 
								}?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="towncity">Tỉnh/Thành Phố</label>
							<input type="text" class="form-control" name="city" required value="<?php if(isset($_SESSION['user'])){
								// echo $city; 
								}?>">
						</div>
					</div>
					<div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Quận/Huyện</label>
	                  <input type="text" class="form-control" name="distric" required					  
					  value="<?php
							if(isset($_SESSION['user'])){
								// echo $distric; 
							}
						?>">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Phường/Xã</label>
	                  <input type="text" class="form-control" name="ward" required					  
					  value="<?php
							if(isset($_SESSION['user'])){
								// echo $ward; 
							}
						?>">
	                </div>
		            </div>
					<div class="w-100"></div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="phone">Số điện thoại</label>
							<input type="text" class="form-control" name="contact" required			  
							value="<?php
								if(isset($_SESSION['user'])){
									// echo $contact; 
								}
							?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="emailaddress">Email</label>
							<input type="text" class="form-control" name="email" required 					  
							value="<?php
								if(isset($_SESSION['user'])){
									// echo $email; 
								}
							?>">
						</div>
					</div>
					<div class="w-100"></div>
				</div>

	          <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Tổng giỏ hàng</h3>
						  	<?php $total_price = 0; ?>
						  		<?php foreach ($cart as $key => $value): 
								if (isset($value['price']) && isset($value['qty'])) {
									$total_price += ($value['price'] * $value['qty']);
								}
						 	?>
							<?php endforeach ?>
	          			<p class="d-flex">
		    				<span>Tạm tính</span>
		    				<span><?php echo number_format($total_price); ?> VND</span>
		    			</p>
		    			<p class="d-flex">
		    				<span>Phí giao hàng</span>
		    				<span>Miễn phí</span>
		    			</p>
		    			<p class="d-flex">
		    				<span>Giảm giá</span>
		    				<span>10%</span>
		    			</p>
		    			<hr>
						<?php
							$total = $total_price * 0.9;
						?>
		    			<p class="d-flex total-price">
		    				<span>Tổng</span>
		    				<span><?php echo number_format($total); ?> VND</span>
		    			</p><br><br>
						<p><a href="cart.php"class="btn btn-primary py-3 px-4">Xem lại giỏ hàng</a></p>
						 
					</div>
	          	</div>
	          	<div class="col-md-6">
	          		<div class="cart-detail bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2">Thanh toán trực tiếp khi giao hàng</label>
											</div>
										</div>
									</div>
									<p><input type="submit" name="submit" value="Đặt hàng" class="btn btn-primary py-3 px-4"></input></p>
								</div>
							</form>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
	
<!-- FOOTER -->
<?php include('partials-front/footer.php'); ?>

<script>
	$(document).ready(function(){
		var quantitiy=0;
		$('.quantity-right-plus').click(function(e){   
		    e.preventDefault();
		    var quantity = parseInt($('#quantity').val());		            
		        $('#quantity').val(quantity + 1);   
	});

		$('.quantity-left-minus').click(function(e){
		    e.preventDefault();
		    var quantity = parseInt($('#quantity').val());		        
		        if(quantity>0){
		        $('#quantity').val(quantity - 1);
		        }
		    });		    
		});
</script>
