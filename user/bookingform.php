<?php
session_start();
include("header.php");


$id=$_GET['id'];
   $sql="select * from product where product_id='$id'" ;
   $res=select_data($sql);
   $arr=mysqli_fetch_assoc($res);
   $username = $_SESSION['email_id'];
   $sql1="select * from registration where email_id='$username'" ;
   $res1=select_data($sql1);
   $arr1=mysqli_fetch_assoc($res1);
   ?>


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Booking</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="viewscooter.php">Home</a></li>
          <li class="breadcrumb-item active">Booking</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
                        <img class="card-img-top" src="../admin/uploads/products/<?php echo $arr['image']; ?>" alt="Card image cap" style="height: 300px;">
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            
              
          <div class="card-body">
              <h5 class="card-title">Enter Details Here</h5>

              <!-- General Form Elements -->
              <form action="./php/booking1.php?id=<?php echo $arr['product_id'] ?>" method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Scooter Name</label>
                  <div class="col-sm-10">
                  <input name="scootername" type="text" class="form-control" id="scootername" value=<?php echo $arr['scooter_name'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Scooter Category</label>
                  <div class="col-sm-10">
                  <input name="scootercategory" type="text" class="form-control" id="scootercategory" value=<?php echo $arr['scooter_category'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Scooter Color</label>
                  <div class="col-sm-10">
                  <input name="scootercolor" type="text" class="form-control" id="scootercolor" value=<?php echo $arr['color'];?>>
                  </div>
                </div>
                
                <div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">scooter Rate</label>
                  <div class="col-sm-10">
                  <input name="scooterrate" type="text" class="form-control" id="scooterrate" value=<?php echo $arr['amount'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">User Name</label>
                  <div class="col-sm-10">
                  <input name="username" type="text" class="form-control" id="username" value= <?php echo $arr1['first_name'];?>>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">User Email</label>
                  <div class="col-sm-10">
                  <input name="useremail" type="text" class="form-control" id="useremail" value= <?php echo $arr1['email_id'];?>>
                  </div>
                </div>

                <div class="row mb-3">                
                <label for="pickupstation" class="col-sm-2 col-form-label">Pickup Station</label>
                <div class="col-sm-10">
              <div class="form-control">
							<span class="fa fa-map-marker" aria-hidden="true"></span>
								<select class="form-input"  name="pickupstation">
                                    <option selected disabled>Select Station </option>
                                    <?php
									
                                    $sql = "select * from metrostations";
                                    $result = select_data($sql);
                                    if (mysqli_num_rows($result) > 0) {
                                      while ($arr = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $arr['metrostation_name']; ?>">
                                          <?php echo $arr['metrostation_name']; ?>
                                        </option>
                                    <?php
                                      }
                                    }
                                    ?>

                    		</select>
						</div>	
            </div>
                                  </div>

            <div class="row mb-3">
                <label for="dropstation" class="col-sm-2 col-form-label">Drop Station</label>
                <div class="col-sm-10">
              <div class="form-control">
							<span class="fa fa-map-marker" aria-hidden="true"></span>
								<select class="form-input"  name="dropstation">
                                    <option selected disabled>Select Station </option>
                                    <?php
									
                                    $sql = "select * from metrostations";
                                    $result = select_data($sql);
                                    if (mysqli_num_rows($result) > 0) {
                                      while ($arr = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $arr['metrostation_name']; ?>">
                                          <?php echo $arr['metrostation_name']; ?>
                                        </option>
                                    <?php
                                      }
                                    }
                                    ?>

                    		</select>
						   </div>
            </div>
                                  </div>
                                  <div class="row mb-3">
                  <label for="inputtime" class="col-sm-2 col-form-label">Rent Hours</label>
                  <div class="col-sm-10">
                  <input name="renthours" type="time" class="form-control" id="renthours" >
                  </div>
                </div>

                                  
                <!--<div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Drop Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control">
                  </div>
                </div>
                <!--<div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">Pick Up Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control">
                  </div>
                </div>-->
                <!--<div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Identity Proof</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>-->
                <!--<div class="row mb-3">
                  <label for="inputColor" class="col-sm-2 col-form-label">Color Picker</label>
                  <div class="col-sm-10">
                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#4154f1" title="Choose your color">
                  </div>
                </div>--
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px"></textarea>
                  </div>
                </div>
                <!--<fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        First radio
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                      <label class="form-check-label" for="gridRadios2">
                        Second radio
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios" value="option" disabled>
                      <label class="form-check-label" for="gridRadios3">
                        Third disabled radio
                      </label>
                    </div>
                  </div>
                </fieldset>
                <div class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Checkboxes</legend>
                  <div class="col-sm-10">

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        Example checkbox
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                      <label class="form-check-label" for="gridCheck2">
                        Example checkbox 2
                      </label>
                    </div>

                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Disabled</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="Read only / Disabled" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Multi Select</label>
                  <div class="col-sm-10">
                    <select class="form-select" multiple aria-label="multiple select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>-->

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Proceed</label>
                  <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Proceed</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

           
        </div>

          

            </div>
          

        </div>
      </div>
    </section>
    <?php 

include 'footer.html';

?>