<?php include('partials-front/header.php'); ?>

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third order-md-last img-fluid" src="Ảnh điện tử ck/iphone14prm.png" style="width:40%;height:70%;position:absolute;right:50px" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">#Sản phẩm điện tử</span>
		          		<div class="horizontal">
				            <h1 class="mb-4 mt-3">Bộ sưu tập điện thoại</h1>
				            <p class="mb-4">Chào mừng bạn đến với cửa hàng đồ điện tử của chúng tôi.</p>
				            
				            <p><a href="#" class="btn-custom">Khám phá ngay</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third order-md-last img-fluid" src="Ảnh điện tử ck/laptophp.png" style="width:40%;height:70%;position:absolute;right:50px" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">#Sản phẩm điện tử</span>
		          		<div class="horizontal">
				            <h1 class="mb-4 mt-3">Bộ sưu tập laptop</h1>
				            <p class="mb-4">Chào mừng bạn đến với cửa hàng đồ điện tử của chúng tôi.</p>
				            
				            <p><a href="#" class="btn-custom">Khám phá ngay</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-bag"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Miễn phí giao hàng</h3>
                <p>Khách hàng mua hàng tại MOBILESHOP sẽ được miễn phí giao hàng Toàn quốc, không giới hạn giá trị đơn hàng.</p>
              </div>
            </div>      
          </div>
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Hỗ trợ khách hàng</h3>
                <p>Hãy liên hệ với chúng tôi để được giải đáp mọi thắc mắc. Luôn trực tuyến hỗ trợ mọi thời gian trong ngày.</p>
              </div>
            </div>    
          </div>
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-payment-security"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Thanh toán an toàn</h3>
                <p>Chúng tôi luôn đảm bảo việc thanh toán của bạn và chịu mọi trách nhiệm khi có sự cố về việc thanh toán.</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

    <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Sản phẩm bán chạy</h2>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
					<?php
						$sql = "SELECT * FROM tbl_products WHERE featured = 'Yes' AND active = 'Yes'  LIMIT 8 ";
						$res= mysqli_query($conn, $sql);

						$count = mysqli_num_rows($res);
						if($count>0){
							while($row=mysqli_fetch_assoc($res)){
								$id = $row['id']; 
								$title = $row['title']; 
								$price = $row['price'];
								$image_name = $row['image_name'];
								?>
    								<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
										<form action="index.php?action=add_cart&id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" method="post">
										<div class="product d-flex flex-column">
											<?php
												if($image_name==""){
													echo "<div class='error'>Image not Available</div>";
												}
												else{
													?>
														<a href="product-single.php?id=<?php echo $id; ?>" class="img-prod"><img class="img-fluid" src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" alt="Colorlib Template">
															<div class="overlay"></div>
														</a>
													<?php
												}
											?>

											<div class="text py-3 pb-4 px-3">
												<h3><a href="#"><?php echo $title;?></a></h3>
												<div class="pricing">
													<p class="price"><span><?php echo number_format($price); ?> VND</span></p>
												</div>
												<p class="bottom-area d-flex px-3">
													<a href="cart-action.php?id=<?php echo $id; ?>" class="add-to-cart text-center py-2 mr-1"><span>Thêm vào giỏ<i class="ion-ios-add ml-1"></i></span></a>
													<a href="product-single.php?id=<?php echo $id; ?>" class="buy-now text-center py-2">Mua ngay<span><i class="ion-ios-cart ml-1"></i></span></a>
												</p>
											</div>
										</div>
									</form>
									</div>
								<?php
							}
						}
					?>
    		</div>
    	</div>
    </section>



    <section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
    	<div class="container">
				<div class="row no-gutters">
					<div class="col-lg-4">
						<div class="choose-wrap divider-one img p-5 d-flex align-items-end" style="background-image: url(https://images2.thanhnien.vn/Uploaded/game/st.game.thanhnien.com.vn/image/21/2014/9-2014/top-5-tai-nghe/thanhniengame_pcconsole_top5_tainghe_1.png);">

    					<div class="text text-center text-white px-2">
								<span class="subheading">RASER NARI ESSENTIAR</span>
    						<h2>Tai nghe thế hệ</h2>
    						<p>Luôn mang đến cho bạn những âm thanh sống động.</p>
    						<p><a href="#" class="btn btn-black px-3 py-2">Mua ngay</a></p>
    					</div>
    				</div>
					</div>
					<div class="col-lg-8">
    				<div class="row no-gutters choose-wrap divider-two align-items-stretch">
    					<div class="col-md-12">
	    					<div class="choose-wrap full-wrap img align-self-stretch d-flex align-item-center justify-content-end" style="background-image: url(https://img.pikbest.com/ai/illus_our/20230424/a8bdfe30e60b3fc791ea13a032e83b6c.jpg!w700wp);">
	    						<div class="col-md-7 d-flex align-items-center">
	    							<div class="text text-white px-5">
	    								<span class="subheading">Samsung</span>
			    						<h2>Đỉnh cao của sự công nghệ</h2>
			    						<p>Luôn mang đến cho bạn những trải nghiệm tuyệt vời, chất lượng nhất.</p>
			    						<p><a href="#" class="btn btn-black px-3 py-2">Mua ngay</a></p>
			    					</div>
	    						</div>
	    					</div>
	    				</div>
    					<div class="col-md-12">
    						<div class="row no-gutters">
    							<div class="col-md-6">
		    						<div class="choose-wrap wrap img align-self-stretch bg-light d-flex align-items-center">
		    							<div class="text text-center px-5">
		    								<span class="subheading">Mùa hè sôi động</span>
				    						<h2>Giảm giá 10%</h2>
				    						<p>Tri ân khách hàng luôn đồng hành cùng MobileShop.</p>
				    						<p><a href="#" class="btn btn-black px-3 py-2">Mua ngay</a></p>
				    					</div>
		    						</div>
	    						</div>
	    						<div class="col-md-6">
		    						<div class="choose-wrap wrap img align-self-stretch d-flex align-items-center" style="background-image: url(https://nghenhinvietnam.vn/uploads/global/quanghuy/2023/9/7/gopro/nghenhinvietnam_action_camera_gopro_hero_12__2.jpg);">
		    							<div class="text text-center text-white px-5">
		    								<span class="subheading">Hero 12 Black</span>
				    						<h2>Sản phẩm bán chạy</h2>
				    						<p>Ống kính góc siêu rộng, MAX LENSMOD 2.0</p>
				    						<p><a href="#" class="btn btn-black px-3 py-2">Mua ngay</a></p>
				    					</div>
		    						</div>
	    						</div>
	    					</div>
    					</div>
    				</div>
    			</div>
  			</div>
    	</div>
    </section>

    <section class="ftco-section ftco-deal bg-primary">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6">
    				<img src="Ảnh điện tử ck/iphone14prm.png" class="img-fluid" alt="">
    			</div>
    			<div class="col-md-6">
    				<div class="heading-section heading-section-white">
    					<span class="subheading">Sản phẩm nổi bật của năm</span>
	            <h2 class="mb-3">Sản phẩm nổi bật của năm</h2>
	          </div>
    				<div id="timer" class="d-flex mb-4">
						  <div class="time" id="ngày"></div>
						  <div class="time pl-4" id="giờ"></div>
						  <div class="time pl-4" id="phút"></div>
						  <div class="time pl-4" id="giây"></div>
						</div>
						<div class="text-deal">
							<h2><a href="#">Iphone 15 Pro Max 1TB</a></h2>
							<p class="price"><span class="mr-2 price-dc">47.000.000 VNĐ</span><span class="price-sale">42.990.000 VNĐ</span></p>
							<ul class="thumb-deal d-flex mt-4">
								<li class="img" style="background-image: url(Ảnh điện tử ck/iphone15pro.png)"></li>
								<li class="img" style="background-image: url(Ảnh điện tử ck/iphone15pro.png)"></li>
								<li class="img" style="background-image: url(Ảnh điện tử ck/iphone15pro.png)"></li>
							</ul>
						</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row">
        	<div class="col-lg-5">
        		<div class="services-flow">
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-bag"></span>
        				</div>
        				<div class="text">
	        				<h3>Miễn phí giao hàng</h3>
	        				<p class="mb-0">Miễn phí giao hàng trên toàn quốc cho mọi giá trị đơn hàng.</p>
        				</div>
        			</div>
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-heart-box"></span>
        				</div>
        				<div class="text">
	        				<h3>Quà tặng</h3>
	        				<p class="mb-0">Luôn mang đến cho bạn những phần quà bất ngờ.</p>
	        			</div>
        			</div>
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-payment-security"></span>
        				</div>
        				<div class="text">
	        				<h3>Hỗ trợ thanh toán</h3>
	        				<p class="mb-0">Hỗ trợ thanh toán của bạn tất cả các ngày trong tuần.</p>
	        			</div>
        			</div>
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-customer-service"></span>
        				</div>
        				<div class="text">
	        				<h3>Chăm sóc khách hàng</h3>
	        				<p class="mb-0">Hỗ trợ khách hàng tất cả các ngày trong tuần.</p>
	        			</div>
        			</div>
        		</div>
        	</div>
          <div class="col-lg-7">
          	<div class="heading-section ftco-animate mb-5">
	            <h2 class="mb-4">Những đánh giá của khách hàng về chúng tôi.</h2>
	            <p>Dưới đây là một vài đánh giá của khách hàng về chất lượng sản phẩm, chăm sóc khách hàng.</p>
	          </div>
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap">
                  <div class="user-img mb-4" style="background-image: url(images\person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4 pl-4 line">Sản phẩm giá phù hợp với túi tiền, nhưng lại rất chất lượng và đáng mua và dùng thử.</p>
                    <p class="name">Hồng Hạnh</p>
                    <span class="position">Khách hàng</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap">
                  <div class="user-img mb-4" style="background-image: url(images\person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4 pl-4 line">Sản phẩm giá phù hợp với túi tiền, nhưng lại rất chất lượng và đáng mua và dùng thử.</p>
                    <p class="name">Lê Huy</p>
                    <span class="position">Khách hàng</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap">
                  <div class="user-img mb-4" style="background-image: url(images\person_4.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4 pl-4 line">Sản phẩm giá phù hợp với túi tiền, nhưng lại rất chất lượng và đáng mua và dùng thử.</p>
                    <p class="name">Bùi Huyền</p>
                    <span class="position">Khách hàng</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap">
                  <div class="user-img mb-4" style="background-image: url(images\person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4 pl-4 line">Sản phẩm giá phù hợp với túi tiền, nhưng lại rất chất lượng và đáng mua và dùng thử.</p>
                    <p class="name">Thành Đạt</p>
                    <span class="position">Khách hàng</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap">
                  <div class="user-img mb-4" style="background-image: url(images\person_4.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4 pl-4 line">Sản phẩm giá phù hợp với túi tiền, nhưng lại rất chất lượng và đáng mua và dùng thử.</p>
                    <p class="name">Doraemon</p>
                    <span class="position">Khách hàng</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-gallery">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-8 heading-section text-center mb-4 ftco-animate">
            <h2 class="mb-4">Theo dõi chúng tôi qua "Mobileshop.com"</h2>
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