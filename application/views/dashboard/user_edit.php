<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<style>
* {
  box-sizing: border-box;
}

select, textarea {
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

.input_text{
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}s

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.error{
  color: red;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}


.datepicker td, .datepicker th {
    width: 5em;
    height: 2.5em;
}

</style>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Admin Dashboard</h3>
                    <ul>
                        <li>
                            <a href="">Library</a>
                        </li>
                        <li>Add User</li>
                    </ul>
                </div>

                
                <div class="row gutters-20">
                    
                    
                    <div class="col col-lg ">
                        <div class="card dashboard-card-three pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>User Update Form</h3>
                                    </div>
                                </div>
 
                <div class="container center">
                  <form  id="myForm" name="book" action="<?php echo base_url() ?>dashboard/update_user"  method="post">
                   <div class="row">
                    <div class="col-25">
                      <label for="first_name">First Name</label>
                    </div>
                    <input type="hidden" name="emp_user_id" value="<?php echo $user_details->emp_user_id; ?>">
                    <div class="col-75">
                      <input type="text" id="first_name" class="input_text" name="first_name" placeholder="First Name" value="<?php echo $user_details->first_name; ?>">
                    </div>
                    <?php echo form_error('first_name'); ?>
                     <p id="first_name" style="color:red;"></p>
                  </div>

                  <div class="row">
                    <div class="col-25">
                      <label for="middle_name">Middle Name</label>
                    </div>
                    <div class="col-75">
                      <input type="text" id="middle_name" class="input_text" name="middle_name" placeholder="Middle Name" value="<?php echo $user_details->middle_name; ?>">
                    </div>
                    <?php echo form_error('middle_name'); ?>
                     <p id="middle_name" style="color:red;"></p>
                  </div>

                  <div class="row">
                    <div class="col-25">
                      <label for="last_name">Last Name</label>
                    </div>
                    <div class="col-75">
                      <input type="text" id="last_name" class="input_text" name="last_name" placeholder="Last Name" value="<?php echo $user_details->last_name; ?>">
                    </div>
                    <?php echo form_error('last_name'); ?>
                     <p id="last_name" style="color:red;"></p>
                  </div>

                  <div class="row">
                    <div class="col-25">
                      <label for="lname">Mobile Number</label>
                    </div>
                    <div class="col-75">
                      <input type="text" id="mobile_no" class="input_text" name="mobile_no" placeholder="Mobile Number" value="<?php echo $user_details->mobile_no; ?>">
                    </div>
                    <?php echo form_error('mobile_no'); ?>
                    <p id="mobile_no" style="color:red;"></p>
                  </div>
                  
                  <div class="row">
                    <div class="col-25">
                      <label for="fname">Date Of Birth</label>
                    </div>
                    <div class="col-75">
                      <!-- <input type="date" id="dob" name="dob" placeholder="dob"> -->
                      <input type="text" name="date_of_birth" class="input_text" id="datepicker"  data-date-format="yyyy-mm-dd" value="<?php echo $user_details->date_of_birth; ?>">
                      <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                    </div>
                  </div>
                  <?php echo form_error('dob'); ?>
                    <p id="dob" style="color:red;"></p>

                  <div class="row">
                    <div class="col-25">
                      <label for="fname">Age</label>
                    </div>
                    <div class="col-75">
                      <input type="text" id='age' class="input_text" readonly />
                    </div>
                  </div>  

                  <div class="row">
                    <div class="col-25">
                      <label for="fname">Gender</label>
                    </div>
                    <div class="col-75">
                    <select id="gender" name="gender">
                      <option value="">---Select one---</option>
                      <?php foreach($genderData as $key){ ?>
                      <option value="<?php echo $key['gender_name'] ?>" <?php if($user_details->gender==$key['gender_name']){echo "selected";} ?>><?php echo $key['gender_name'] ?></option>
                      <?php } ?>
                      
                        
                    </select>
                      
                    </div>
                  </div>
                  <?php echo form_error('gender'); ?>
                    <p id="gender" style="color:red;"></p>

                  <div class="row">
                    <div class="col-25">
                      <label for="lname">Email</label>
                    </div>
                    <div class="col-75">
                      <input type="text" id="email_id" class="input_text" name="email_id" placeholder="Email Id" value="<?php echo $user_details->email_id; ?>">
                    </div>
                  </div>

                  <?php echo form_error('email_id'); ?>
                    <p id="email_id" style="color:red;"></p>
                   
                  
                
                  <div class="row">
                    <input type="submit" value="edit_user" name="edit_user">
                  </div>
                  </form>
                </div>
                               
                            </div>
                              
                        </div>
                    </div>
   
                </div>
                
         
            



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
 $('#datepicker').datepicker({
        //weekStart: 1,
        //daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
        autoclose: true,
        changeMonth: true,
        changeYear: true,
        endDate: "tomorrow",
        //maxDate: "today"


    }).on('change', function () {
            var age = getAge(this);
           /* $('#age').val(age);*/
            console.log(age);
            //alert(age);

        document.getElementById("age").setAttribute('value',age);
        });
    $('#datepicker').datepicker("setDate", new Date());

    function getAge(dateVal) {
            var
                birthday = new Date(dateVal.value),
                today = new Date(),
                ageInMilliseconds = new Date(today - birthday),
                years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 ),
                months = 12 * (years % 1),
                days = Math.floor(30 * (months % 1));
            return Math.floor(years) + ' years ' + Math.floor(months) + ' months ' + days + ' days';

        }
</script>