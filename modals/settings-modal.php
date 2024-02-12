<?php
$invoice_settings_qry = $conn->query("SELECT * FROM `settings_tbl`")->fetch_all(MYSQLI_ASSOC);
$invoice_settings = array_column($invoice_settings_qry, 'meta_value', 'meta_field');
?>