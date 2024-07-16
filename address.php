<?php include('partials-front/header.php'); ?>

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></p>
            <h1 class="mb-0 bread">Thêm địa chỉ</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form action="" class="billing-form" method="POST">
							<!-- <br><br> -->
							<h3 class="mb-4 billing-heading">Thêm địa chỉ</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Họ</label>
	                  <input type="text" class="form-control" placeholder="" name='first_name'>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Tên</label>
	                  <input type="text" class="form-control" placeholder="" name='last_name'>
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Địa chỉ</label>
	                  <input type="text" class="form-control" placeholder="" name='address'>
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Tỉnh/Thành Phố</label>
	                  <input type="text" class="form-control" placeholder="" name='city'>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Quận/Huyện</label>
	                  <input type="text" class="form-control" placeholder="" name='distric'>
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Phường/Xã</label>
	                  <input type="text" class="form-control" placeholder="" name='ward'>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Số điện thoại</label>
	                  <input type="text" class="form-control" placeholder="" name='contact'>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email</label>
	                  <input type="text" class="form-control" placeholder="" name='email'>
	                </div>
                </div>
                <div class="w-100"></div>
	            </div>
                <p><input type="submit" class="btn btn-primary py-3 px-4" value="Thêm địa chỉ" name="add_address"></input></p>   
	          </form><!-- END -->
			  <?php
			  	if(isset($_GET['id'])){
					  $user_id = $_GET['id']; 
				  }
			  ?>
              <?php
                if(isset($_POST['add_address'])){
					if(isset($_SESSION['user'])){
						$user_id; 
						$first_name = $_POST['first_name']; 
						$last_name = $_POST['last_name']; 
						$address = $_POST['address']; 
						$city = $_POST['city']; 
						$distric = $_POST['distric']; 
						$ward = $_POST['ward']; 
						$contact = $_POST['contact']; 
						$email = $_POST['email'];
	
						$sql = "INSERT INTO tbl_address_user SET 
							user_id = '$user_id', 
							first_name = '$first_name', 
							last_name = '$last_name', 
							address = '$address', 
							city = '$city', 
							distric = '$distric', 
							ward = '$ward', 
							contact = '$contact', 
							email = '$email'
						"; 
	
						$res = mysqli_query($conn, $sql); 
						
						if($res == TRUE){
							// tạo sesion lưu thông báo 
							$_SESSION['add_address'] = "<p class='text-success'>Thêm địa chỉ thành công</p>";
							// chuyến hướng đến trang manage
							echo("<script>location.href = '".SITEURL."';</script>");
						}else{
							// tạo sesion lưu thông báo 
							$_SESSION['add_address'] = "<p class='text-success'>Lỗi thêm đại chỉ</p>";
							// chuyến hướng đến trang manage
							echo("<script>location.href = '".SITEURL."';</script>");
						}
					}else{
						echo '<script>alert("Bạn cần đăng nhập để thêm địa chỉ!")</script>';
					}
                }
              ?>

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