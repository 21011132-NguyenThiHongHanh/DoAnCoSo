<?php include('partials-front/header.php'); ?>
			<?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
			?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2">TRANG</span></p>
            <h1 class="mb-0 bread">LIÊN HỆ CHÚNG TÔI</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Địa chỉ:</span> Nhóm 02.</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
			  
          	<div class="info bg-white p-4">
	            <p><span>SĐT:</span> <a href="tel://1234567920">+ 84123456789</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:info@yoursite.com">Mobileshop@gmail.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Trang web:</span> <a href="#">Mobileshop.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="" class="bg-white p-5 contact-form" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Tên" name="full_name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email" name="email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Chủ đề" name="topic">
              </div>
              <div class="form-group">
                <textarea id="" cols="30" rows="7" class="form-control" placeholder="Lời nhắn" name="message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Gửi" name="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>
			<?php
			if(isset($_POST['submit'])){
				$full_name=$_POST['full_name']; 
				$email = $_POST['email']; 
				$topic = $_POST['topic']; 
				$message = $_POST['message']; 

				$sql = "INSERT INTO tbl_contact SET 
					full_name = '$full_name', 
					email = '$email', 
					topic = '$topic', 
					message = '$message'
				";

				$res = mysqli_query($conn, $sql); 

				if($res==TRUE){
					$_SESSION['add'] = "<p class='text-success'>Gửi liên hệ thành công</p>"; 
					echo("<script>location.href = '".SITEURL."contact.php';</script>");
				}else{
					$_SESSION['add'] = "<p class='text-success'>Lỗi gửi liên hệ</p>"; 
					echo("<script>location.href = '".SITEURL."contact.php';</script>");
				}
			}
		  ?>
          </div>
          <div class="col-md-6 d-flex">
          	<div id="" class="bg-white">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59590.23472161742!2d105.72376175497388!3d21.01708881370391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313452efff394ce3%3A0x391a39d4325be464!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBQaGVuaWthYQ!5e0!3m2!1svi!2s!4v1698310250893!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
          </div>
        </div>
      </div>
    </section> 
    <section class="ftco-gallery ftco-section ftco-no-pb">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-8 heading-section text-center mb-4 ftco-animate">
            <h2 class="mb-4">Chia sẻ cho chúng tôi biết những trải nghiệm của bạn!</h2>
            <p>Tuổi trẻ ta hãy sống trọn với cái gọi là đam mê.</p>
          </div>
    		</div>
    	</div>
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(https://cdn.nguyenkimmall.com/images/product/859/10054737-dien-thoai-samsung-galaxy-s23-ultra-8gb-256gb-den-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(https://png.pngtree.com/thumb_back/fw800/background/20230616/pngtree-modern-desktop-computer-at-a-sleek-working-desk-in-a-stunning-image_3621008.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(https://laptop88.vn/media/news/2806_cau-tao-ban-phim-co.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(https://dep365.com/wp-content/uploads/2021/12/chup-anh-selfie-truoc-guong-voi-camera-che-nua-mat-edited.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(https://news.phongcachxanh.vn/wp-content/uploads/2021/03/newsphongcachxanh_top-chuot-choi-game-tot-nhat-2021.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(https://cdn.vjshop.vn/tin-tuc/diem-danh-8-may-anh-compact-tot-nhat-nam-2021/anh-dai-dien.jpeg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>

<!-- FOOTER -->
<?php include('partials-front/footer.php'); ?>