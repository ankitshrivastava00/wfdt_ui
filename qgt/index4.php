<?php
include('qrlib.php'); 
    function getUsernameFromEmail($student_id) {
        $find = '@';
        $pos = strpos($student_id, $find);
        $username = substr($student_id, 0, $pos);
        return $username;
    }
    if(isset($_POST['submit']) ) {
        $tempDir = 'temp/'; 
        $student_id = $_POST['student_id'];
        $fname =  $_POST['fname'];
        $filename = getUsernameFromEmail($student_id);
        $codeContents = 'mailto:'.$student_id.'?id='.urlencode($student_id).'&fname='.urlencode($fname); 
        QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
    }
?>
Form:
<form id="demo-form2" method="post"  data-parsley-validate class="form-horizontal form-label-left" > 
                                      <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Student Id</th>
                      <th>First Name</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                      <tbody>
                        <?php
                            include("includes/connection2.php");
                            $sql = "SELECT * FROM student";
                            $result=mysql_query($sql); //rs.open sql,con
                        while ($row=mysql_fetch_array($result))
                        { ?><!--open of while -->
                        <tr>
                            <td><input type="text" value="<?php echo $row['student_id']; ?>" name="student_id" ></td>
                            <td><input type="text" value="<?php echo $row['fname']; ?>" name="fname" ></td>
                        <td class="center">
                                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;" />
                </div>
                            </td>
                            <td class="center">
                            </td>   
                        </tr>
                                                            <?php
                           } //close of while
                        ?>
                      </tbody>
                       <?php
        if(!isset($filename)){
            $filename = "author";
        }
        ?>
        <div class="qr-field">
            <h3>QR Code Result: </h3>
            <center>
                <div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
                    <?php echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
                </div>
    <a class="btn btn-primary submitBtn" style="width:50px; margin:1px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
            </center>
        </div>
                </table>
                        </div>
                </div>
              </div>
            </div>
</div>
        </div>   
                </form>