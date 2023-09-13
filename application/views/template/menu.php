			<?php
            $listMenu = [
                array(
                    'title' => 'DATA PEMILU - PRESIDEN',
                    'url' => 'pemilu/pilpress',
                    'show_menu' => false,
                    'submenu' => array('title' => '', 'link' => '#')
                ),
                array(
                    'title' => 'DATA PEMILU - KEPALA DAERAH',
                    'url' => 'pemilu/pilkada',
                    'show_menu' => false,
                    'submenu' => array('title' => '', 'link' => '#')
                ),
                array(
                    'title' => 'DATA PEMILU - DPRD',
                    'url' => 'pemilu/pileg',
                    'show_menu' => false,
                    'submenu' => array('title' => '', 'link' => '#')
                ),
                array('title' => 'PENYULUHAN DAN PENERANGAN HUKUM'),
                array('title' => 'POLITIK, SOSIAL BUDAYA DAN SDO'),
                array('title' => 'PENY.KEU. NEGARA DAN P. TINDAK PIDANA'),
                array('title' => 'KASI A'),
                array('title' => 'KASI B'),
                array('title' => 'KASI C'),
                array('title' => 'KASI D'),
                array('title' => 'KASI E'),
                array('title' => 'KASI PENKUM'),
            ];
            ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <?php 
            $x=0;
            foreach($listMenu as $menu) {
                echo '<li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse' . $x . '"
                        aria-expanded="true" aria-controls="#collapse' . $x . '">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>' . $menu['title'] . '</span>
                    </a>
                    <div id="collapse' . $x . '" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="#">Jadwal</a>
                        </div>
                    </div>
                </li>';
                $x++;
            }
            ?>

			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMeeting"
                    aria-expanded="true" aria-controls="collapseMeeting">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>USER MANAGEMENT</span>
                </a>
                <div id="collapseMeeting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url('user/setting');?>">Users</a>
                    </div>
                </div>
            </li>
