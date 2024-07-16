
<style>
    .quantity-input {
        display: flex;
        align-items: center;
    }
    .quantity-input .btn {
        padding: 5px 10px;
        margin: 0;
    }
    .quantity-input input {
        width: 50px;
        text-align: center;
        margin: 0 5px;
    }
</style>

<?php include('partials-front/header.php'); ?>
<?php 
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : []; 
?>  

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
		  <p class="breadcrumbs"><span class="mr-2">TRANG </span></p>
            <h1 class="mb-0 bread">Giỏ hàng</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
            <div class="container">
                <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                              <tr class="text-center">
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá tiền</th>
                                <th>Số lượng</th>
								<th>Tổng tiền</th>
                                <th>Hoạt động</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $total_price = 0; ?>
                                <?php foreach ($cart as $key => $value): 
                                    if (isset($value['price']) && isset($value['qty'])) {
                                        $total_price += ($value['price'] * $value['qty']);
                                    ?>
                                    <tr class="text-center">
                                        <td class="image-prod"><div class="img"><img src="img/product/<?php echo $value['image_name']; ?>" width="170px"></td></div>
                                        <td class="product-name">
                                            <h3><?php echo $value['title']; ?></h3>
                                        </td>
                                        <td class="price"><?php echo number_format($value['price']); ?> VNĐ</td>    
                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                            <form action="cart-action.php">
                                                <input type="hidden" name="action" value="update">
                                                <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
												<!-- <div class="quantity-input">
                                                    <button type="button"  class="quantity-left-minus btn btn-outline-primary" data-type="minus" data-field="">
                                                        <i class="fa-solid fa-minus"></i>
                                                    </button>
                                                    <input type="text" name="quantity" class="quantity form-control input-number" value="<?php echo $value['qty']; ?>" min="1" max="50">
                                                    <button type="button" class="quantity-right-plus btn btn-outline-primary" data-type="plus" data-field="">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                </div> -->
                                                <input type="text" name="quantity" class="quantity form-control input-number" value="<?php echo $value['qty']; ?>" min="1" max="100">
												<td class="total"><?php echo number_format($value['price'] * $value['qty']); ?> VNĐ</td>
                                                
												<td class="product-remove"><a href="cart-action.php?id=<?php echo $value['id']; ?>&action=delete">Xóa</a></td>
                                            </form>
                                            </div>
                                        </td>
                                   </tr>
                                <?php 
                                    } 
                                ?>
                                <?php endforeach ?>
                            </tbody>
                          </table>
                      </div>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Tổng giỏ hàng</h3>
                        <p class="d-flex">
                            <span>Tạm tính</span>
                            <span><?php echo number_format($total_price); ?> VND</span>
                        </p>
                        <p class="d-flex">
                            <span>Phí vận chuyển</span>
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
                            <span><?php echo number_format($total); ?> VNĐ</span>
                        </p>
                    </div>
                    <?php
                        if(isset($_SESSION['user'])){
                            $user_id = $_SESSION['id'];
                        }
                    ?>
                    <p class="text-center"><a href="checkout.php<?php if(isset($_SESSION['id'])){
                        echo '?id='.$user_id;
                    }  ?>" class="btn btn-primary py-3 px-4">Tiến hành thanh toán</a></p>
                </div>
            </div>
            </div>
        </section>

<!-- FOOTER -->
<?php include('partials-front/footer.php'); ?>

<!-- <script>
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
                if(quantity>1){
                $('#quantity').val(quantity - 1);
                }
            });            
        });
</script> -->
<script>
    $(document).ready(function(){
        var quantitiy=0;
        $('.quantity-right-plus').click(function(e){   
            e.preventDefault();
            var quantity = parseInt($(this).siblings('.quantity').val());
            $(this).siblings('.quantity').val(quantity + 1);   
        });

        $('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($(this).siblings('.quantity').val());
            if(quantity > 1){
                $(this).siblings('.quantity').val(quantity - 1);
            }
        });            
    });
</script>