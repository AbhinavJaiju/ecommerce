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
}

?>