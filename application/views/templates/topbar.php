       <!-- topbar -->
       <ul class="navbar-nav ml-auto ml-md-0">


           <li class="nav-item dropdown no-arrow">
               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <span><?= $user['name']; ?></span>
                   <!-- <img class="img-profile rounded-circle" style="width:25px; heigh:25px" src="<?= base_url('assets/img/profile/') . $user['image']; ?>"></img> -->
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                   <a class="dropdown-item" href="<?= base_url('User') ?>">My Profile</a>
                   <a class="dropdown-item" href="<?= base_url('Auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">Logout</a>
               </div>
           </li>
       </ul>

       </nav>

       <div id="wrapper">