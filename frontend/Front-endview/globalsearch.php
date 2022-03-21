<div class="search-model">
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="search-close-switch">+</div>
    <form class="search-model-form" method="POST">
        <input type="text" name="search-input" placeholder="Search here.....">
    </form>
</div>
</div>


<?php
if(isset($_POST['search-input'])){
    $search = $_POST['search-input'];
    echo "<script>window.location.href='shop.php?search=$search'</script>";
    // header('Location:shop.php');
    // $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    // $search_query = mysqli_query($connection, $query);
    // if(!$search_query){
    //     die("QUERY FAILED" . mysqli_error($connection));
    // }
    // $count = mysqli_num_rows($search_query);
    // if($count == 0){
    //     echo "<h1>NO RESULT</h1>";
    // }else{
    //     while($row = mysqli_fetch_assoc($search_query)){
    //         $post_title = $row['post_title'];
    //         $post_author = $row['post_author'];
    //         $post_date = $row['post_date'];
    //         $post_image = $row['post_image'];
    //         $post_content = $row['post_content'];

}

?>