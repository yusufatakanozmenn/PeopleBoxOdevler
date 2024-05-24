<?php
    session_start();
    require "libs/vars.php";
    require "libs/functions.php";

    $title = $description = "";
    $title_err = $description_err = "";

    if ($_SERVER["REQUEST_METHOD"]=="POST") {

        $input_title = trim($_POST["title"]);

        if(empty($input_title)){
            $_SESSION['title_err'] = "<div class='alert alert-danger mb-0 text-center'>title boş geçilemez.</div>";
        }else if(strlen($input_title) > 150){
            $_SESSION['title_err'] = "<div class='alert alert-danger mb-0 text-center'>title için çok fazla karakter kullandınız. Max: 150kr</div>";
        }else{
            $title = control_input($input_title);
        }

        $input_description = trim($_POST["description"]);

        if(empty($input_description)){
            $_SESSION['description_err'] = "<div class='alert alert-danger mb-0 text-center'>description boş geçilemez.</div>";
        }else if(strlen($input_description) < 10){
            $_SESSION['description_err'] = "<div class='alert alert-danger mb-0 text-center'>description için çok az karakter kullandınız. Min: 11kr</div>";
        }else{
            $description = $input_description;
        }

        $image = $_POST["image"];
        $url = $_POST["url"];

        if(empty($_SESSION['title_err']) && empty($_SESSION['description_err'])){
            if(createBlog($title,$description,$image,$url)){
                $_SESSION['success'] = "<div class='alert alert-success mb-0 text-center'>" . $title . " filmi eklendi</div>";
                header('Location: index.php');
            }else{
                $_SESSION['error'] = "<div class='alert alert-danger mb-0 text-center'>Yükleme sırasında hata oluştu</div>";
                header('Location: blog-create.php');
            }
        }
    }
?>


<?php
if(isset($_SESSION['title_err'])) {
    echo $_SESSION['title_err'];
    unset($_SESSION['title_err']);
}
if(isset($_SESSION['description_err'])) {
    echo $_SESSION['description_err'];
    unset($_SESSION['description_err']);
}
if(isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if(isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<?php include "views/_header.php" ?>
<?php include "views/_navbar.php" ?>
<div class="container my-3">

    <div class="row">

        <div class="col-3">
            <?php include "views/_menu.php" ?>
        </div>
        <div class="col-9">

           <div class="card">

                <div class="card-body">

                    <form action="blog-create.php" method="POST">

                        <div class="mb-3">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" class="form-control" name="title" id="title" value="<?php echo $title?>">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Açıklama</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Resim</label>
                            <input type="text" class="form-control" name="image" id="image">
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">url</label>
                            <input type="text" class="form-control" name="url" id="url">
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">


                    </form>
                </div>
            </div>

        </div>

    </div>

</div>

<?php include "views/_footer.php" ?>