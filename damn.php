<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <p class="card-description">
                    Add Product
                  </p>
                  <form id="submit_form">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="productname" name="productname" >
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Product Description</label>
                      <textarea class="form-control" id="pdresscription" name="pdescription" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="number">price</label>
                      <input type="number" class="form-control" id="price" name="price" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" id="password" name="password" >
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Category</label>
                      <?php
                        include 'config.php';
                        $sql = "SELECT * FROM categories";
                        $result = $conn->query($sql);
                        ?>
                        <select id="category" name="category">
                            <?php
                            while($row = $result->fetch_assoc()){
                            ?>
                             <option value = "<?php echo "$row[catgoryId]"?>"><?php echo "$row[categoryName]"; ?></option>
                             <?php
                                }
                                ?>
                        </select>
                      </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="file" required class="form-control" id="image" name="image" 
                            aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Address</label>
                      <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                    </div>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary mr-2" value="Submit">
                    <button type="button" class="btn btn-light" id="cancel">Cancel</button>
                  </form>
                  <div id="response"></div>
                </div>
              </div>
            </div>