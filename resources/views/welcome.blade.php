<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body>
    
    <select class="js-example-basic-multiple form-control" name="states[]" multiple="multiple">
      <option value="AL">Alabama</option>  
      <option value="AL">Alabama</option>  
      <option value="WY">Wyoming</option>
    </select>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="">
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

</body>

</html>