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
                    'submenu' => [
                        array('title' => 'Lihat Data', 'link' => 'index')
                    ]
                ),
                array(
                    'title' => 'PENYULUHAN DAN PENERANGAN HUKUM',
                    'url' => 'penyuluhan',
                    'show_menu' => false,
                    'submenu' => [
                        array('title' => 'Lihat Data', 'link' => 'index')
                    ]
                ),
                array(
                    'title' => 'POLITIK, SOSIAL BUDAYA DAN SDO',
                    'url' => 'polsosbud',
                    'show_menu' => false,
                    'submenu' => [
                        array('title' => 'Lihat Data', 'link' => 'index')
                    ]
                ),
                array(
                    'title' => 'PENY.KEU. NEGARA DAN P. TINDAK PIDANA',
                    'url' => 'pkn',
                    'show_menu' => false,
                    'submenu' => [
                        array('title' => 'Lihat Data', 'link' => 'index')
                    ]
                ),
                array(
                    'title' => 'KASI A',
                    'url' => 'kasia',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Pemerintahan', 'link' => 'Pemerintahan'),
                        array('title' => 'Stakeholder & Obyek Vital', 'link' => 'stakeholder'),
                        array('title' => 'Pengamanan Sumber Daya Organisasi', 'link' => 'sdo'),
                        array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
                        array('title' => 'Peta Intelijen', 'link' => 'peta'),
                        array('title' => 'Perda', 'link' => 'perda'),
                        array('title' => 'Pergub', 'link' => 'pergub'),
                    )
                ),
                array(
                    'title' => 'KASI B',
                    'url' => 'kasib',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Sosial', 'link' => 'Sosial'),
                        array('title' => 'Budaya', 'link' => 'Budaya'),
                        array('title' => 'Kemasyarakatan', 'link' => 'Kemasyarakatan'),
                        array('title' => 'Potensi Ancaman', 'link' => 'PotensiAncaman'),
                        array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
                    )
                ),
                array(
                    'title' => 'KASI C',
                    'url' => 'kasic',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Perdagangan', 'link' => 'Perdagangan'),
                        array('title' => 'Industri', 'link' => 'Industri'),
                        array('title' => 'Perbankan dan Investasi', 'link' => 'Perbankan'),
                        array('title' => 'Keuangan Daerah', 'link' => 'KeuanganDaerah'),
                        array('title' => 'Potensi Ancaman', 'link' => 'PotensiAncaman'),
                        array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
                    )
                ),
                array(
                    'title' => 'KASI D',
                    'url' => 'kasid',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Daftar Pendampingan', 'link' => 'DaftarPendampingan'),
                        array('title' => 'Potensi Ancaman', 'link' => 'PotensiAncaman'),
                        array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
                    )
                ),
                array(
                    'title' => 'KASI E',
                    'url' => 'kasie',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Lapinhar-Lapinsus-Lapopsin', 'link' => 'Lapinhar'),
                        array('title' => 'Potensi Ancaman', 'link' => 'PotensiAncaman'),
                        array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
                        array('title' => 'Kirka', 'link' => 'Kirka'),
                    )
                ),
                array(
                    'title' => 'KASI PENKUM',
                    'url' => 'kasi-penkum',
                    'show_menu' => false,
                    'submenu' => array(
                        array('title' => 'Data Grafik', 'link' => 'DataGrafik'),
                        array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
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
