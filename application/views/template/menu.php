			<?php
            $listMenu = [
                array(
                    'title' => 'DATA PEMILU - PRESIDEN',
                    'url' => 'pilpres',
                    'show_menu' => false,
                    'submenu' => [
                        // array('title' => 'Input Data', 'link' => 'create'),
                        array('title' => 'Lihat Data', 'link' => 'index')
                    ]
                ),
                array(
                    'title' => 'DATA PEMILU - KEPALA DAERAH',
                    'url' => 'pilkada',
                    'show_menu' => false,
                    'submenu' => [
                        array('title' => 'Lihat Data', 'link' => 'index')
                    ]
                ),
                array(
                    'title' => 'DATA PEMILU - DPRD',
                    'url' => 'pileg',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Lihat Data', 'link' => 'index')
                    )
                ),
                array(
                    'title' => 'PENYULUHAN DAN PENERANGAN HUKUM',
                    'url' => 'pemilu/pileg',
                ),
                array(
                    'title' => 'POLITIK, SOSIAL BUDAYA DAN SDO',
                    'url' => 'pemilu/pileg',
                ),
                array(
                    'title' => 'PENY.KEU. NEGARA DAN P. TINDAK PIDANA',
                    'url' => 'pemilu/pileg',
                ),
                array(
                    'title' => 'KASI A',
                    'url' => '#',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Pemerintahan', 'link' => '#'),
                        array('title' => 'Stakeholder & Obyek Vital', 'link' => '#'),
                        array('title' => 'Pengamanan Sumber Daya Organisasi', 'link' => '#'),
                        array('title' => 'Potensi Ancaman', 'link' => '#'),
                        array('title' => 'Peta Intelijen', 'link' => '#'),
                        array('title' => 'Perda', 'link' => '#'),
                        array('title' => 'Pergub', 'link' => '#'),
                    )
                ),
                array(
                    'title' => 'KASI B',
                    'url' => '#',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Sosial', 'link' => '#'),
                        array('title' => 'Budaya', 'link' => '#'),
                        array('title' => 'Kemasyarakatan', 'link' => '#'),
                        array('title' => 'Potensi Ancaman', 'link' => '#'),
                        array('title' => 'Peta Intelijen', 'link' => '#'),
                    )
                ),
                array(
                    'title' => 'KASI C',
                    'url' => '#',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Perdagangan', 'link' => '#'),
                        array('title' => 'Industri', 'link' => '#'),
                        array('title' => 'Perbankan dan Investasi', 'link' => '#'),
                        array('title' => 'Keuangan Daerah', 'link' => '#'),
                        array('title' => 'Potensi Ancaman', 'link' => '#'),
                        array('title' => 'Peta Intelijen', 'link' => '#'),
                    )
                ),
                array(
                    'title' => 'KASI D',
                    'url' => '#',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Daftar Pendampingan', 'link' => '#'),
                        array('title' => 'Potensi Ancaman', 'link' => '#'),
                        array('title' => 'Peta Intelijen', 'link' => '#'),
                    )
                ),
                array(
                    'title' => 'KASI E',
                    'url' => '#',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Lapinhar-Lapinsus-Lapopsin', 'link' => '#'),
                        array('title' => 'Potensi Ancaman', 'link' => '#'),
                        array('title' => 'Peta Intelijen', 'link' => '#'),
                        array('title' => 'Kirka', 'link' => '#'),
                    )
                ),
                array(
                    'title' => 'KASI PENKUM',
                    'url' => '#',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Data Grafik', 'link' => '#'),
                        array('title' => 'Peta Intelijen', 'link' => '#'),
                    )
                ),
            ];
            ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <?php 
            $x=0;
            foreach($listMenu as $menu) {
                // submenu
                // $submenu = '';
                if(isset($menu['submenu']) && $menu['submenu']) :
                    $submenu = '<div id="collapse' . $x . '" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">';
                            foreach($menu['submenu'] as $smenu) {
                                $submenu .= '<a class="collapse-item" href="'. base_url($menu['url']) . '/' . $smenu['link'] . '">' . $smenu['title'] . '</a>';
                            }                       
                            $submenu .= '</div>
                    </div>';
                endif;

                echo '<li class="nav-item">
                    <a class="nav-link collapsed" href="'. base_url($menu['url']) . '" data-toggle="collapse" data-target="#collapse' . $x . '"
                        aria-expanded="true" aria-controls="#collapse' . $x . '">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>' . $menu['title'] . '</span>
                    </a>
                    ' . $submenu . '
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
