			<?php
            $listMenu = getListMenu();
            $bankData = getBankDataMenuDash();
            $listMenu = array_merge($listMenu, $bankData);

            $role_id = $this->session->userdata('userdata')['role_id'];
            // echo "role_id = " . $role_id;
            ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <?php 
            $x=0;
            foreach($listMenu as $menu) {
                if(isset($menu['submenu']) && $menu['submenu']) :
                    $submenu = '<div id="collapse' . $x . '" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">';
                            foreach($menu['submenu'] as $smenu) {
                                $submenu .= '<a class="collapse-item" href="'. base_url($menu['url']) . '/' . $smenu['link'] . '">' . $smenu['title'] . '</a>';
                            }                       
                            $submenu .= '</div>
                    </div>';
                endif;

                $cssHide = 'd-block';
                if(!in_array($role_id, [3, 12])) $cssHide = 'd-none';
                if(!in_array($role_id, [4, 13])) $cssHide = 'd-none';
                if(!in_array($role_id, [5, 14])) $cssHide = 'd-none';
                if(!in_array($role_id, [6, 15])) $cssHide = 'd-none';
                if(!in_array($role_id, [7, 16])) $cssHide = 'd-none';
                if(!in_array($role_id, [8, 17])) $cssHide = 'd-none';

                echo '<li class="nav-item ' . $cssHide . '">
                    <a class="nav-link collapsed" href="'. base_url($menu['url']) . '" data-toggle="collapse" data-target="#collapse' . $x . '"
                        aria-expanded="true" aria-controls="#collapse' . $x . '">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>' . $menu['title'] . '</span>
                    </a>
                    ' . $submenu . '
                </li>';
                $x++;
            }

            if(in_array($role_id, [1, 2])) {
            ?>

			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>USER MANAGEMENT</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url('user/setting');?>">Users</a>
                    </div>
                </div>
            </li>

			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
                    aria-expanded="true" aria-controls="collapseMaster">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>MASTER</span>
                </a>
                <div id="collapseMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url('master/');?>">Provinsi</a>
                        <a class="collapse-item" href="<?=base_url('master/partai');?>">Partai</a>
                        <a class="collapse-item" href="<?=base_url('master/dapil');?>">Dapil</a>
                    </div>
                </div>
            </li>

            <?php } ?>
