        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Games shop 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/template/js/jquery.js"></script>
    <script src="/template/js/jquery-1.2.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/template/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/template/js/register.js"></script>
	<script type="text/javascript" src="/template/js/jquery.sort.js"></script>
    <script type="text/javascript" src="/template/js/sort.js"></script>
	<script>
		$(document).ready(function(){
			$(".add-to-basket").click(function(){
				var id = $(this).attr("data-id");
				$.post("/basket/addAjax/"+id, {}, function (data) {
					$("#basket-count").html(data);
				});
				return false;
			});
		});
        
        
        /* SORT_PRICE  */
        $(document).ready(function(){
                $('#sort-price').trackbar({
                    onMove : function() {
                        document.getElementById("from-price").value = this.leftValue;
                        document.getElementById("before-price").value = this.rightValue;
                    },
                    dual : true, // two intervals
                    width : 180, // px
                    leftLimit : 100, // unit of value
                    rightLimit : 2000, // unit of value
                    roundUp : 10,
                    <?php if($fromPrice):?>
                        leftValue : <?=$fromPrice; ?>,
                    <?php else: ?>
                        leftValue : 300,
                    <?php endif;?>
                    <?php if($beforePrice):?>
                        rightValue : <?=$beforePrice; ?>,
                    <?php else:?>
                         rightValue : 800,
                    <?php endif;?>
                });
        });
        var path = window.location.href;
         $(document).ready(function(){
            $(".sort-price").click(function(){
                var from_price = document.getElementById("from-price").value;
                var before_price  = document.getElementById("before-price").value;
                if(~path.indexOf('platform')) {
                    var num = path.indexOf('platform');
                    num += 9;
                    var id = path.substring(num, num+1);
                    $("#form-price-sort").attr("action","/platform/"+id+"/price-"+from_price+'-'+before_price);
                }
                if(~path.indexOf('catalog'))
                    $("#form-price-sort").attr("action","/catalog/price-"+from_price+'-'+before_price);

            });    
        });
	</script>

</body>

</html>