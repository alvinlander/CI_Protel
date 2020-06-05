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
<center>
<table class="table my-3" style="width: 75%; background-color: white;">
  <thead class="thead-dark">
    <tr>

      <th scope="col">Nama</th>
      <th scope="col">Department</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Start Trip</th>
      <th scope="col">End Trip</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody class="tbody-light">
  <?php foreach($sweeper as $sw):?>
    <tr>
      <td><?=$sw['fullname']?></td>
      <td><?=$sw['nama_department']?></td>
      <td><?=$sw['lokasi']?></td>
      <td><?=$sw['start_trip']?></td>
      <td><?=$sw['end_trip']?></td>
      <td>
      <a href="<?= base_url('gmhome/detail_travel/'.$sw['id_travel'])?>" class="btn btn-outline-warning btn-sm">Detail</a>
      </td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
</center>