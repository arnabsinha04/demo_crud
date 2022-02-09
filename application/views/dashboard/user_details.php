<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Dashboard</h3>
        <ul>
            <li>
                <a href="<?php echo base_url();?>">Home</a>
            </li>
            <li>Admin</li>
        </ul>

        <a href="<?php echo base_url();?>dashboard/add_user" class="btn btn-success">add Users</a>
        <?php if($this->session->flashdata('message')){
                           // echo validation_errors(); 
                    //echo "<div class='error'>".$this->session->flashdata('message')."</div>";
                    echo '<script> swal("'.$this->session->flashdata('message').'!", "You clicked the button!", "success") </script>';
                } ?>
        </div>
                <div class="row gutters-20">    
                    <div class="col-12 ">
                        <div class="card dashboard-card-three pd-b-20">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>User Details</h3>
                                    </div>
                                </div>
                                 
                                <div class="">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Emp ID</th>
                                            <th>Name</th>
                                            <th>Date Of Birth</th>
                                            <th>Age</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $index =1;foreach($user_details as $row){ ?>
                                        <tr>
                                            <td><?php echo $index; ?></td>
                                            <td><?php echo $row['emp_code']; ?></td>
                                            <td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']; ?></td>
                                            <td><?php echo $row['date_of_birth']; ?></td>
                                            <td><?php  
                                                $dob=$row['date_of_birth'];
                                                $diff = (date('Y') - date('Y',strtotime($dob)));
                                                echo $diff; ?>    
                                            </td>
                                            <td><?php echo $row['email_id']; ?></td>
                                            <td><?php echo $row['mobile_no']; ?></td>
                                            <td><?php echo $row['gender']; ?></td>
                                            <td><a href="<?php echo base_url();?>dashboard/edit_user/<?php echo $row['emp_user_id']?>">Edit</a></td>
                                    
                                        </tr>
                                    <?php $index ++; } ?>
                                    </tbody>
                                    
                                </table>
                               </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>


<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>