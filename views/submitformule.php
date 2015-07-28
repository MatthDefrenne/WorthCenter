<?php
$_SESSION['6K1K2M6Z8mH1KUku5vWm70l0aRf0B8WK'] = $_POST['amount'];
?>
<script>
    window.onload = function(){
        document.forms['myForm'].submit()
    }
</script>
<?php
echo "Veuillez patienter..."
?>
<form id="myForm" name="myForm" action="https://test-payment.hipay.com/index/link" method="post">
    <br/>
    <br/>
    <input type="hidden" type='number' name='amount' value='<?= $mount; ?>'/>
    <input type="hidden" name="id" value="55A7777A8B5C4"/>
    <br/>
</form>
