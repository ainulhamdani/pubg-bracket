<?php
$urls = explode('/',uri_string());
?>
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary elevation-4">
   <?php echo view('admin/include/sidebar_logo');  ?>

   <!-- Sidebar -->
   <div class="sidebar">
     <?php echo view('admin/include/sidebar_user');  ?>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="/admin/overview" class="nav-link <?php echo $urls[1]=='overview'?'active':'' ?>">
             <i class="nav-icon fas fa-th"></i>
             <p>
               Overview
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>
