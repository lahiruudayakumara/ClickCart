<?php
// including the database connection file
include_once("conn.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $stars = $_POST['stars'];
    $comment = $_POST['comment'];  
    
    $result = mysqli_query($con, "UPDATE rating SET stars='$stars', comment='$comment' WHERE rating_ID=$id");
    
    // check if the query was successful
    if ($result) {
        // Redirect to the display page (myreviews.php)
        header("Location: myreviews.php");
        exit();
    } else {
        echo "Error updating rating: " . mysqli_error($con);
    }
}
?>
<?php
//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM rating WHERE rating_ID=$id");
 
while($row = mysqli_fetch_array($result))
{
    $stars = $row['stars'];
    $comment = $row['comment'];
}
?>
<html>
<head>
    <title>Edit Review</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="width: 800px; margin-top: 100px;">
        <div class="row">
            <h3>Edit Review Page</h3>
            <div class="col-sm-6"> 
                <form method="post" name="form1">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                    </div>
                    <div class="form-group">
                        <label>Stars</label>
                        <input type="text" name="stars" class="form-control" value="<?php echo $stars; ?>">
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <input type="text" name="comment" class="form-control" value="<?php echo $comment; ?>">
                    </div>
                    <input type="submit" value="Update Review" class="btn btn-primary btn-block" name="update" onclick="message1()">

                    <script> 
                        function message1(){
                            alert("Your Review was edited!");
                        }
                    </script>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!--reference: W3Schools-->
