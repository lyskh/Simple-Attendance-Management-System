<?php
session_start();
require_once(realpath(__DIR__.'/../classes/actions.class.php'));
$actionClass = new Actions();
if(isset($_POST['id'])){
  $class = $actionClass->get_class($_POST['id']);
  extract($class);
}
?>
<div class="container-fluid">
    <form id="class-form" method="POST">
      <input type="hidden" name="id" value="<?= $id ?? "" ?>">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Class Name & Subject</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $name ?? "" ?>" required="required">
                </div>
            </div>
        </div>
    </form>
</div>
