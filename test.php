<?php
include 'config.php';
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>
<div>
    Hello
</div>
<select name="category" id="">
<?php
    while($rows = $result->fetch_assoc()){
  
    ?>
    <option value = "<?php echo "$rows[catgoryId]"?>"><?php echo "$rows[categoryName]"; ?></option>
    <?php
    }
    ?>
    </select>