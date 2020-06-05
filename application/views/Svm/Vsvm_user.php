<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url('svmhome/')?>"><?= $dashboard?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('svmhome/')?>">Home <span class="sr-only">(current)</span></a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('svmhome/perjalanan')?>">Perjalanan</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('svmhome/history')?>">History Perjalanan</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('svmhome/approval')?>">Approval</a>
      </button>
      </li>
      <li class="nav-item active">
      <button type='button' class='btn btn-outline-light'>
        <a class="nav-link" href="<?= base_url('svmhome/user')?>">Manager</a>
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
<div class="container mt-3">
<button class='btn btn-primary mt-3' data-toggle="modal" data-target="#add">Tambah Anggota</button>
<table class="table table-striped table-dark mt-3">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Department</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Bank Account</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($user as $us):?>
    <tr>
      <td><?= $us['fullname']?></td>
      <td><?= $us['nama_department']?></td>
      <td><?= $us['username']?></td>
      <td><?= $us['password']?></td>
      <td><?= $us['bank_acc']?></td>
      <td>
        <a href="#" class='btn btn-outline-warning btn-sm' data-toggle="modal" data-target="<?="#edit".$us['id_user']?>">Edit</a>
        <a href="<?=base_url('svmhome/delsweeper/'.$us['id_user'])?>" class='btn btn-outline-danger btn-sm'>Hapus</a>
      </td>
    </tr>
    <!-- Modal add user -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('svmhome/addsweeper')?>" method="post">
        <div class="form-group">
            <label for="fullname">Fullname</label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Jono Joni">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="password">
        </div>
        <div class="form-group">
            <label for="bank_acc">Bank Account</label>
            <input type="text" class="form-control" name="bank_acc" id="bank_acc" placeholder="BCA No 1234567">
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <select class="form-control" name="department" id="department">
                <option>BTF</option>
                <option>Property Renewal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary float-right">Tambah Anggota</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal edit user -->
<div class="modal fade" id="<?="edit".$us['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Akun <?= $us['fullname']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url('svmhome/editsweeper/'.$us['id_user'])?>" method="post">
        <div class="form-group">
            <label for="fullname">Fullname</label>
            <input type="text" class="form-control" name="fullname" id="fullname" value="<?= $us['fullname']?>">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= $us['username']?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password" value="<?= $us['password']?>">
        </div>
        <div class="form-group">
            <label for="bank_acc">Bank Account</label>
            <input type="text" class="form-control" name="bank_acc" id="bank_acc" value="<?= $us['bank_acc']?>">
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <select class="form-control" name="department" id="department">
                <option>BTF</option>
                <option>Property Renewal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary float-right">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
  <?php endforeach;?>
  </tbody>
</table>
</div>