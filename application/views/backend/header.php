<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topbar-right-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="<?php echo base_url();?>assets/backend/images/admin.png" alt="user-image" class="rounded-circle">
                </span>
				<span>
					<?php
						$user_id	=	$this->session->userdata('user_id');
						$user_detail = $this->db->get_where('user',array('user_id'=>$user_id))->row();
					 ?>
				   <span class="account-user-name"><?php echo $user_detail->name;?></span>
				   <span class="account-position">
					   <?php if($user_detail->type == 1) echo 'Admin';?>
				   </span>
				</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">

                <!-- item-->
                <a href="<?php echo base_url();?>" class="dropdown-item notify-item" target="_blank">
                    <i class="mdi mdi-arrow-top-right"></i>
                    <span><?php echo get_phrase('view_frontend'); ?></span>
                </a>

                <!-- item-->
                <a href="<?php echo base_url();?>index.php?admin/account" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle"></i>
                    <span><?php echo get_phrase('my_account'); ?></span>
                </a>

                <!-- item-->
                <a href="<?php echo base_url();?>index.php?home/signout" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout"></i>
                    <span><?php echo get_phrase('logout'); ?></span>
                </a>

            </div>
        </li>
    </ul>
    <button class="button-menu-mobile open-left disable-btn">
        <i class="mdi mdi-menu"></i>
    </button>
</div>
<!-- end Topbar -->
