
<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}?>
<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('form.php');
    $frm=new formBuilder;      
  ?> 
</div>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<h3>Thanh toán</h3>
			<form action="bank.php" method="post" id="form1">
			<div class="col-md-4 col-md-offset-4" style="margin-bottom:50px">
			<div class="form-group">
   <label class="control-label">Tên trên thẻ</label>
    <input type="text" class="form-control" name="name">
</div>
<div class="form-group">
   <label class="control-label">Số thẻ</label>
    <input type="text" class="form-control" name="number" required title="Enter 16 digit card number">
  
</div>      
<div class="form-group">
   <label class="control-label">Ngày hết hạn</label>
    <input type="date" class="form-control" name="date">
</div>
<div class="form-group">
   <label class="control-label">CVV</label>
    <input type="text" class="form-control" name="cvv">
</div>
<div class="form-group">
    <button class="btn btn-success">Thực hiện thanh toán</button>
    </form>
</div>
</div>
			</div>
			
		<div class="clear"></div>	
		
	</div>
<?php include('footer.php');?>
</div>
<?php
    session_start();
    extract($_POST);
    include('config.php');
    $_SESSION['screen']=$screen;
    $_SESSION['seats']=$seats;
    $_SESSION['amount']=$amount;
    $_SESSION['date']=$date;
    header('location:bank.php');
?>
<script>
        $(document).ready(function() {
            $('#form1').bootstrapValidator({
            fields: { 
            name: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'Tên là bắt buộc và không được để trống'
                    },regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Tên chỉ có thể bao gồm các chữ cái'
                    } } },
            number: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'Số thẻ là bắt buộc và không được để trống'
                    },stringLength: {
                    min: 16,
                    max: 16,
                    message: 'Số thẻ phải dài 16 ký tự'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Nhập số thẻ hợp lệ'
                    } } },
            date: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'Ngày hết hạn là bắt buộc và không được để trống'
                    } } },
            cvv: {
            verbose: false,
                validators: {notEmpty: {
                        message: 'CVV là bắt buộc và không được để trống'
                    },stringLength: {
                    min: 3,
                    max: 3,
                    message: 'CVV phải dài 3 ký tự'
                },regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'Nhập CVV hợp lệ'
                    } } }}
            });
            });

</script>