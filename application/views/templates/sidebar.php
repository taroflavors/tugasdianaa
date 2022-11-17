<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-warning
         sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-fw fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">web rpl <sup>1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <!-- query menu -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $querymenu = " SELECT `user_menu`.`id`,`menu`
                                      FROM `user_menu` JOIN `user_access_menu`
                                      ON `user_menu`.`id`=`user_access_menu`.`menu_id`
                                      WHERE `user_access_menu`.`role_id`= $role_id
                                      ORDER BY `user_access_menu`.`menu_id` ASC 
                                      ";
             $menu = $this->db->query($querymenu)->result_array();
             ?>
           
             <?php foreach ($menu as $m) :  ?>
               <!-- heading -->
               <div class="sidebar-heading">
                   <?= $m['menu']; ?>
               </div>
                  <!-- sub menu -->
                  <?php
                  $menuId = $m['id'];
                  $querysubmenu = " SELECT * FROM `user_sub_menu` JOIN `user_menu` 
                                               ON `user_sub_menu`.`menu_id`=`user_menu`.`id` 
                                             WHERE `user_sub_menu`.`menu_id`= $menuId 
                                               AND `user_SUB_menu`.`is_active` = 1 ";
                  $submenu = $this->db->query($querysubmenu)->result_array();
                  ?>
                  <?php foreach ($submenu as $sm) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                        <i class="<?= $sm['icon']; ?>"></i>
                        <span><?= $sm['title']; ?></span></a>

                    </li>
                <?php endforeach; ?>
                <!-- Divider -->
                <hr class="sidebar-divider ">

            <?php endforeach; ?>

             <!-- Divider -->
             <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>"
                data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>logout</span></a>
            </li>