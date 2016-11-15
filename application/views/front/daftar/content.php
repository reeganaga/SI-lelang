    <!-- SECTION Judul-->
    <!--===============================================================-->
    <div class="section-heading-page">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="heading-page text-center-xs">Registrasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb text-right text-center-xs">
              <li>
                <a href="#">Home</a>
              </li>
              <li class="active">Registrasi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!--SECTION REGISTER-->
    <!--===============================================================-->
    <div class="section section-xs section-bottom">
      <div class="container">
        <div class="row mb">
          <div class="col-md-6 col-sm-offset-3">
            <h3 class="title-md hr-left text-theme">Registrasi</h3>
            <div class="panel panel-primary text-theme">
              <div class="panel-heading">
                <h3 class="panel-title">Registration Form</h3>
              </div>
              <div class="panel-body">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>'); ?>

                <?php echo form_open('daftar/proses_daftar'); ?>
                  <div class="form-group">
                    <label for="input-name">Username</label>
                    <input name="username" value="<?php echo set_value('username'); ?>" type="text" class="form-control" id="input-name" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="first-name">Nama Lengkap</label>
                    <input name="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>" type="text" class="form-control" id="first-name" placeholder="First Name">
                  </div>
                  <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input name="email" value="<?php echo set_value('email'); ?>" type="email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input name="password" value="<?php echo set_value('password'); ?>" type="password" class="form-control" id="pass1" placeholder="Password" >
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Ulangi Password</label>
                    <input name="password2" value="<?php echo set_value('password2'); ?>" type="password" class="form-control" id="pass2" onkeyup="checkPass(); return false;" placeholder="Password">
                    <span id="confirmMessage" class="confirmMessage"></span>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Tanggal Lahir</label>
                    <div class="col-md-12">
                      <select name="tanggal">
                        <?php for ($i=1; $i <=31; $i++) { ?>
                          <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                      </select>
                      <select name="bulan">
                        <?php 
                        for($i = 1 ; $i <= 12; $i++) {
                            $month = date("F",mktime(0,0,0,$i,1,date("Y")));
                                echo "<option value='$i'>" .   $month . "</option>";
                        }
                        ?>
                      </select>
                      <select name="tahun">
                        <?php 
                        $year = date('Y');
                        for ($i=1981; $i <=$year; $i++) { ?>
                          <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Jenis Kelamin</label>
                    <div class="col-md-12">
                    <input name="jenis_kelamin" type="radio" value="laki-laki">Laki - Laki</input>
                    <input name="jenis_kelamin" type="radio" value="perempuan">Perempuan</input>
                    </div>
                  </div>
                  <!-- <div class="checkbox">
                    <label>
                      <input type="checkbox"> I read terms and conditions</label>
                  </div> -->
                  <hr class="hr-divider-ghost">
                  <button type="submit" class="btn btn-primary btn-lg" id="btn_daftar" >Mendaftar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- END SECTION REGISTER -->

  <script type="text/javascript">
  // window.onload =disabled_register();
    // function disabled_register(){
    //     document.getElementById('btn_daftar').setAttribute("disabled", "disabled");
    // }
    function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Password Cocok!"
        document.getElementById('btn_daftar').removeAttribute("disabled");

    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        document.getElementById('btn_daftar').setAttribute("disabled", "disabled");
        message.innerHTML = "Password Tidak Cocok!"
    }
}  
  </script>