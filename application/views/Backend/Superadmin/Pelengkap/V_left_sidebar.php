<!-- Left Sidebar -->

<section> 
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <center>
                <div class="admin-image"> 
                    <img src="<?php echo base_url()?>assets/backend/images/heavlypedia.png?>" alt=""> </div>
            </center>
            <div class="quick-stats">
                <h5><center>Admin Heavlypedia</center></h5>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="open"><a href="<?php echo site_url('Superadmin/Home');?>"><i class="zmdi zmdi-home"></i><span>List Rumah Sakit / Klinik</span></a></li>
                <li class="open"><a href="<?php echo site_url('Superadmin/Poli');?>"><i class="zmdi zmdi-file"></i><span>Poli</span></a></li>
                <li><a href="<?php echo site_url('Superadmin/Login/logout');?>"><i class="zmdi zmdi-sign-in"></i><span>Logout</span></a></li>   
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
</section>
<!-- End Left Sidebar --> 