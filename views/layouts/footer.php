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

    <!-- Bootstrap Core JavaScript -->
    <script src="/template/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/template/js/register.js"></script>
nouislider
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
	</script>

</body>

</html>