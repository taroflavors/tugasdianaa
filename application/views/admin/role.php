<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">
    
        <div class="col-lg-6">
          <!-- Pesan error -->
          <?= form_error(
              'menu',
              '<div class="alert alert-success" role="alert">
              </div>'); ?>
          <?= $this->session->flashdata('message'); ?>
         <!-- akhir pesan error -->

          <!-- tombol tambah -->
          <a href="" class="btn btn-primary mb-3" class="btn btn-primary" data-toggle="modal" data-target="#Addnewrole">Add New Role</a>
         <!-- tabel -->
         <table class="table table-hover">
             <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">role</th>
                     <th scope="col">action</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $i = 1; ?>
                 <?php foreach ($role as $r) : ?>
                      <tr>
                         <th scope="row"><?= $i; ?></th>
                         <td><?= $r['role']; ?></td>

                        <td>
                        
                         <a href="<?= base_url('admin/roleaccess/'). $r['id'] ?>" class="btn btn-warning btn-sm">Access</a>
                         <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-popup="tooltip" data-placement="top" title="edit" data-target="#roleedit<?= $r['id']; ?>">Edit</a>
                         <button onclick="hapusRole('<?= base_url('admin/hapusrole/') . $r['id']; ?>')" class="btn btn-danger btn-sm Tombol hapus">Delete</button>
                        </td>
                     </tr>
                     <?php $i++; ?>
                  <?php endforeach; ?>
             </tbody>
         </table>
         <!-- akhir tabel -->
        </div>
    
    </div>
                     
                   
    </div>  
<!-- /.container-fluid -->             

</div>
<!-- End of Main Content --> 


<!-- a trigger modal -->

<!-- Modal -->
<div class="modal fade" id="Addnewrole" tabindex="-1" aria-labelledby="AddnewroleLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
 <div class="modal-header">
      <h5 class="modal-title" id="AddnewroleLabel">Add New Role</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 </div>
 <form action="<?= base_url('admin/role'); ?>" method="post">
     <div class="modal-body">
         <div class="form-group">
             <input type="text" class="form-control" id="role" name="role" placeholder="Role title">
         </div>
       
     </div>
     <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
     </div>
 </form>
</div>
</div>
</div>

<!-- Modal Edit -->
<?php foreach ($role as $r) : ?>

<div class="modal fade" id="roleedit<?= $r['id']; ?>">
<div class="modal-dialog" role="document">
<div class="modal-content">
 <div class="modal-header">
      <h5 class="modal-title" id="roleeditlabel">Edit Role</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
 </div>
 <form action="<?= base_url('admin/editrole/'); ?>" method="post">

             <input type="hidden"  class="form-control" readonly value="<?= $r['id']; ?>" name="id">

         <div class="modal-body">
         <div class="form-group">
              <input type="text" class="form-control" id="role" name="role" placeholder="menu name" value="<?= $r['role'] ?>">
         </div>
        </div>
     <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="edit" class="btn btn-primary">Update</button>
     </div>
 </form>
</div>
</div>
</div>
<?php endforeach; ?>

