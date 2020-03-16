<?php
$message = '';
$error = '';
if(isset($_POST["submit"]))
{
     if(empty($_POST["url"]))
     {
          $error = "<label class='text-danger'>url</label>";
     }

     else
     {
          if(file_exists('databaze.json'))
          {
               $current_data = file_get_contents('databaze.json');
               $array_data = json_decode($current_data, true);
               $extra = array(
                    'url'               =>     $_POST['url']
               );
               $array_data[] = $extra;
               $final_data = json_encode($array_data);
               if(file_put_contents('databaze.json', $final_data))
               {
                    // $message = "<label class='text-success'>File Appended Success fully</p>";
               }
          }
          else
          {
               // $error = 'JSON File not exits';
          }
     }

}
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Title</title>
  <!-- <link rel="stylesheet" href="css/styles.css"> -->
  <meta name="description" content="page-description">
  <meta name="author" content="page-author">

  <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>

</head>

<body>

    <h3>Admin</h3>

    <form method="post">
    <?php
        if(isset($error))
        {
                echo $error;
        }
        ?>
        <br />
        <label>url</label>
        <input type="text" name="url" class="form-control" />

        <input type="submit" name="submit" value="Append" class="btn btn-info" /><br />
        <?php
        if(isset($message))
        {
                echo $message;
        }
        ?>
   </form>

</body>
</html>