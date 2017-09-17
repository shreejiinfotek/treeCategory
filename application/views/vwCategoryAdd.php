<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Add Category</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script>
// Wait for the DOM to be ready
$(function() {
  $("#category_form").validate({
    // Specify validation rules
    rules: {
      title: "required",
      parent_id: "required"
    },
    // Specify validation error messages
    messages: {
      title: "Please enter your title",
      parent_id: "Please select category"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-6">
        <h3>Add New Category</h3>
        <form method="POST" action="<?=base_url()?>add_category" accept-charset="UTF-8" id="category_form">
          <div class="form-group ">
            <label for="Title:">Title:</label>
            <input class="form-control" placeholder="Enter Title" id="title" name="title" type="text">
            <span class="text-danger"></span> </div>
          <div class="form-group ">
            <label for="Category:">Category:</label>
            <select class="form-control" placeholder="Select Category" id="parent_id" name="parent_id">
            <? foreach($categories as $cate_val){ ?>
              <option value="<?=$cate_val["category_id"]?>"><?=$cate_val["category_name"]?></option>
            <? } ?>
             
            </select>
            <span class="text-danger"></span> </div>
          <div class="form-group">
            <button class="btn btn-success" name="Submit" id="Submit" value="Add New">Add New</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>