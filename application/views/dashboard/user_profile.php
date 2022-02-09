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

.footer-wrap-layout1 {
    /* padding: 35
rem
 0 4
rem
; */
}
</style>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Admin Dashboard</h3>
                    <ul>
                        <li>
                            <a href="">User</a>
                        </li>
                        <li>User Profile</li>
                    </ul>
                </div>

                
                <div class="row gutters-20">
                    
                    
                    
                <div class="container center">
                  <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $user_details->first_name." ".$user_details->middle_name."".$user_details->last_name; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
            
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Employee Code:</td>
                        <td><?php echo $user_details->emp_code; ?></td>
                      </tr>
                      
                      <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $user_details->date_of_birth; ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td><?php echo $user_details->gender; ?></td>
                      </tr>
                        
                      <tr>
                        <td>Email</td>
                        <td><a href="<?php echo $user_details->email_id; ?>"><?php echo $user_details->email_id; ?></a></td>
                      </tr>
                        <td>Mobile Number</td>
                        <td><?php echo $user_details->mobile_no; ?>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                
            
          </div>
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