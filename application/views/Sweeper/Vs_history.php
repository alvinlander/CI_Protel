<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url('sweeperhome/')?>"><?= $dashboard?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('sweeperhome/')?>">Home <span class="sr-only">(current)</span></a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('sweeperhome/perjalanan')?>">Perjalanan</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('sweeperhome/history')?>">History Perjalanan</a>
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
<center>

<div class="container my-3">
  <table>
      <?php
      if($history != NULL){
      foreach ($history as $hist): ?>
      <tr>
          <td>
              <div class="card w-150" style="width: 550px;">
                  <div class="card-body" style="width: 100%;">
                      <h5 class="card-title"><?= $hist['lokasi']." Tanggal ".date("d-m-yy",strtotime($hist['start_trip']))?></h5>
                      <p class="card-text"><?php
                      if($hist['end_trip']!= '0000-00-00'){
                          $start = new DateTime($hist['start_trip']);
                          $end = new DateTime($hist['end_trip']);
                          $counthari = $end->diff($start)->days + 1;
                          echo "Perjalanan ditempuh selama ".$counthari." hari"." Berakhir pada tanggal ".date('d-m-yy',strtotime($hist['end_trip']));}
                          else{
                              echo "Perjalanan Belum Berakhir";
                          }
                          ?></p>
                      <!-- <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#detail<?=$hist['id_travel']?>" data-dismiss='modal' style='float: right;'>Detail</button> -->
                      <a href="<?= base_url('sweeperhome/detail_history/'.$hist['id_travel'])?>" class='btn btn-outline-warning' style="float: right;">Detail</a>
                  </div>
              </div>
          </td>
      </tr>
      <?php endforeach;}?>
  </table>
      <?php if($history == NULL){?>
          <div class="card w-150" style="width: 550px;">
              <div class="card-body" style="width: 100%;">    
                  <h3 class="card-title" style="text-align: center">Data Tidak ada</h3>
              </div>
          </div>
      <?php }?>
    </center>
</div>