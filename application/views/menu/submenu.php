<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">
    <div class="col-lg"> 
     
          <!-- Pesan error -->
          <?php if (validation_errors()) : ?>
            <div class="alert alert-success" role="alert">
                <?php validation_errors(); ?>
            </div>
          <?php endif; ?>
         <?= $this->session->flashdata('message'); ?>
         <!-- akhir pesan error -->

          <!-- tombol tambah -->
          <a href="" class="btn btn-primary mb-3" class="btn btn-primary" data-toggle="modal" data-target="#logoutmodal">Add Sub Menu</a>
         <!-- tabel -->
         <table class="table table-hover">
             <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">title</th>
                     <th scope="col">menu</th>
                     <th scope="col">url</th>
                     <th scope="col">icon</th>
                     <th scope="col">active</th>
                     <th scope="col">action</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $i = 1; ?>
                 <?php foreach ($submenu as $sm) : ?>
                      <tr>
                         <th scope="row"><?= $i; ?></th>
                         <td><?= $sm['title']; ?></td>
                         <td><?= $sm['menu']; ?></td>
                         <td><?= $sm['url']; ?></td>
                         <td><?= $sm['icon']; ?></td>
                         <td><?= $sm['is_active']; ?></td>
                         <td>
                            <button href="" class="badge badge-success" data-toggle="modal" data-target="#exampleModalsubedit<?= $sm['id']; ?>">Edit</button>
                            <button onclick="hapuSubmenu('<?= base_url('menu/hapus/') . $sm['id'] ?>')" class="btn btn-danger btn-sm tombol-hapus">delete</button>
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


<!-- button trigger modal -->

<!-- modal -->
<div class="modal fade" id="logoutmodal" tabindex="-1" aria-labelledby="newmenumodallabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newmenumodallabel">Add Sub Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="" class="value">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>        
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu url">
                    </div>
                    <div class="form-group">
                         <input type="text" class="form-control" id="icon" name="icon" placeholder="SubMenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                             <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" aria-label="checkbox for following text input" checked>
                             <label for="is_active" class="form_check_label">Active?</label>
                         </div>
                    </div>
                </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary">add</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
<div>

<!-- modal edit -->

<?php foreach ($submenu as $sm) : ?>

<div class="modal fade" id="exampleModalsubedit<?= $sm['id']; ?>" tabindex="-1" aria-labellebdy="exampleModalsubeditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalsubeditLabel">Edit submenu </h5>

                <span aria-hidden="true">&times;</span>
            </div>
            <form action="<?= base_url('menu/submenuedit'); ?>" method="post">
                <div class="modal-body">
                    <div class="form group">
                        <input type="text" value="<?= $sm['title'] ?>" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form group">
                        <input type="hidden" class="form-control" id="id" name="id" readonly value="<?= $sm['id'] ?>">


                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="<?= $sm['menu_id']; ?>"><?= $sm['menu']; ?></option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form group">
                        <input type="text" value="<?= $sm['url'] ?>" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="form group">
                        <input type="text" value="<?= $sm['icon'] ?>" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" aria-label="Checkbox fot following text input" checked>
                            <label for="is_active" class="form_check_label">Aktif</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>