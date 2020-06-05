
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url('gmhome/')?>"><?= $dashboard?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <button type='button' class='btn btn-light'>
        <a class="nav-link" href="<?= base_url('gmhome/')?>">Home <span class="sr-only">(current)</span></a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-light'>
        <a class="nav-link" href="<?= base_url('gmhome/perjalanan')?>">Perjalanan</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-light'>
        <a class="nav-link" href="<?= base_url('gmhome/history')?>">History Perjalanan</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('gmhome/approval')?>">Approval</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('gmhome/user')?>">SPM</a>
      </button>
      </li>
    </ul>
    <div class="topnav-right">
        <div class="dropdown">
            <button class="fa fa-gear dropbtn" onclick="myFunction()"></button>
            <div id="myDropdown" class="dropdown-content isidrop">
            <a data-toggle="modal" data-target="#settings">Pengaturan</a>
                <a href="<?= base_url('login/logout')?>">Keluar</a>
            </div>
        </div>
    </div>
  </div>
</nav>
<div class="container my-4" style='background: white; padding: 5px; width: 450px;'>
    <center>
    <h3>Form Biaya Perjalanan</h3>
    <?php if ($this->session->flashdata('flash')) { ?>
					<div class="row mt-3">
						<div class="col-md-12">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?= $this->session->flashdata('flash'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</div>
					</div>
  <?php }else if ($this->session->flashdata('flush')){?>
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('flush'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          </div>
        <?php }?>
    </center>
    <form action='<?= base_url('gmhome/addperjalanan')?>' method='post' enctype='multipart/form-data'> 
    <a href="" class="btn btn-danger btn-sm ml-3 my-3">
    <?php 
    date_default_timezone_set("Asia/Jakarta");
    echo date('d-m-yy',time());?>
    </a>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="transportation">Transportation</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="transportation" name="transportation">
        <input type="file" class="form-control-file" id="upload" name='files[]'>  
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="tollorparking">Toll/Parking</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="tollorparking" name="tollorparking">
        <input type="file" class="form-control-file" id="upload" name='files[]'>
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="meals">Meals</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="meals" name="meals">
        <input type="file" class="form-control-file" id="upload" name='files[]'> 
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="supplies">Supplies/Stationary</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="supplies" name="supplies">
        <input type="file" class="form-control-file" id="upload" name='files[]'> 
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="voucher">Voucher</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="voucher" name="voucher">
        <input type="file" class="form-control-file" id="upload" name='files[]' >
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="gasoline">Gasoline</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="gasoline" name="gasoline">
        <input type="file" class="form-control-file" id="upload" name='files[]'> 
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="entertain">Entertain</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="entertain" name="entertain">
        <input type="file" class="form-control-file" id="upload" name='files[]'> 
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="ticket">Ticket</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="ticket" name="ticket">
        <input type="file" class="form-control-file" id="upload" name='files[]'> 
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="hotel">Hotel</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="hotel" name="hotel">
        <input type="file" class="form-control-file" id="upload" name='files[]'> 
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="taxiinjkt">Taxi Inner Jakarta</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="taxiinjkt" name="taxiinjkt">
        <input type="file" class="form-control-file" id="upload" name='files[]'> 
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="airporttrain">Airport Train</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="airporttrain" name="airporttrain">
        <input type="file" class="form-control-file" id="upload" name='files[]'> 
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="taxioutjkt">Taxi Outside Jakarta</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="taxioutjkt" name="taxioutjkt">
        <input type="file" class="form-control-file" id="upload" name='files[]'> 
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="lunch">Team Meeting/Lunch</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="lunch" name="lunch">
        <input type="file" class="form-control-file" id="upload" name='files[]'> 
    </div>
    <div class="form-group col-md-12">
        <label style="font-weight: bold;" for="refund">Ticket Refund</label>
        <input type="number" min='0' step='500' placeholder='masukan tanpa titik (contoh : 90000)' class="form-control" id="refund" name="refund">
        <input type="file" class="form-control-file" id="upload" name='files[]'> 
    </div>
    <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
    </form>
    </div>
    </div>