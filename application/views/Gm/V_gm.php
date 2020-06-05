<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url('gmhome/')?>"><?= $dashboard?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('gmhome/')?>">Home <span class="sr-only">(current)</span></a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('gmhome/perjalanan')?>">Perjalanan</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
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
  <h3>Form Awal Perjalanan</h3>
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
  <form action='<?= base_url('gmhome/starttravel')?>' method='post'> 
    <div class="form-group col-md-12">
      <label for="nama">Nama Lengkap</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="fullname" value='<?= $user['sesilogin']['fullname']?>' readonly>
    </div>
    <div class="form-group col-md-12">
      <label for="department">Department</label>
      <input type="text" class="form-control" id="department" name="department" value='<?= $user['sesilogin']['department']?>' readonly>
    </div>
    <div class="form-group col-md-12">
      <label for="lokasi">Lokasi</label>
      <input type="text" class="form-control" name="lokasi" id="lokasi">
    </div>
    <div class="form-group col-md-12">
      <label for="tanggal">Tanggal Mulai</label>
      <input type="date" class="form-control" name="tanggal_start" id="tanggal">
    </div>
    <button type="submit" class="btn btn-outline-primary btn-block " >Start Trip</button>
  </form>
</div>
<div class="container my-3" style='background: white;padding: 5px; width: auto; height: auto'>
<center>
  <table class="table table-striped" id='myTable'>
    <tr>
      <th>Nama</th>
      <th>Department</th>
      <th>Lokasi</th>
      <th>Start Trip</th>
      <th>End Trip</th>
      <th>Status</th>
      <th>Detail</th>
    </tr>
    <?php foreach($trip as $tr):?>
      <tr>
        <td><?=$user['sesilogin']['fullname']?></td>
        <td><?=$user['sesilogin']['department']?></td>
        <td><?=$tr['lokasi']?></td>
        <td><?=date("d-m-yy",strtotime($tr['start_trip']))?></td>
        <td><?=date("d-m-yy",strtotime($tr['end_trip'])) ?></td>
        <td style="font-weight: bold;"><?=$tr['keterangan']?></td>
        <td>
          <button class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="<?="#exampleModal".$tr['id_travel']?>">Detail</button>
        </td>
      </tr>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$tr['id_travel']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Expense Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <ol>
              <li>Transportation Rp <?= number_format($tr['transportation'])?></li>
              <li>Toll/Parking Rp <?= number_format($tr['tollorparking'])?></li>
              <li>Meals Rp <?= number_format($tr['meals'])?></li>
              <li>Supplies/Stationary Rp <?= number_format($tr['supplies'])?></li>
              <li>Voucher Rp <?= number_format($tr['voucher'])?></li>
              <li>Gasoline Rp <?= number_format($tr['gasoline'])?></li>
              <li>Entertain Rp <?= number_format($tr['entertain'])?></li>
              <li>Ticket Rp <?= number_format($tr['ticket'])?></li>
              <li>Hotel Rp <?= number_format($tr['hotel'])?></li>
              <li>Taxi Inner Jakarta Rp <?= number_format($tr['taxiinjkt'])?></li>
              <li>Airport Train Rp <?= number_format($tr['airporttrain'])?></li>
              <li>Taxi Outside Jakarta Rp <?= number_format($tr['taxioutjkt'])?></li>
              <li>Team Meeting/Lunch Rp <?= number_format($tr['lunch'])?></li>
              <li>Ticket Refund Rp <?= number_format($tr['refund'])?></li>
            </ol>
      </div>
      <div class="modal-footer">
      <a href="<?= base_url('gmhome/hapustravel/'.$tr['id_travel'])?>" class="btn btn-outline-danger btn-sm" >Delete</a>
        <?php if($tr['status'] == 4):?>
        <a href="<?=base_url('gmhome/invoice/'.$tr['id_travel'])?>" class="btn btn-outline-primary btn-sm">Invoice</a>
      <?php endif?>
      </div>
    </div>
  </div>
</div>
      <?php endforeach;?>
  </table>
</center>
</div>
