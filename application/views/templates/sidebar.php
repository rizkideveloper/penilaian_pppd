<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/') ?>dist/img/user1.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <p class="d-block text-white"><?= $this->session->userdata('nama_pengguna') ?></p>
                <span class="text-white" style="font-size: 12px;"><?= $this->session->userdata('nama_role') ?></span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('Dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <?php if ($this->session->userdata('role_id') == 1) { ?>
                    <li class="nav-header">Admin</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-folder-open"></i>
                            <p>
                                Kelola Data Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <!-- <li class="nav-item">
                                <a href="<? // base_url('Role') 
                                            ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Role</p>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="<?= base_url('Pengguna') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Pengguna</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Jabatan') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Jabatan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Staff') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Staff</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Pegawai') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Pegawai</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 3) { ?>
                    <li class="nav-header">Kepala & Staf</li>
                    <?php if ($this->session->userdata('role_id') == 2) { ?>
                        <li class="nav-item">
                            <a href="<?= base_url('Kuota_pegawai') ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-layer-group"></i>
                                <p>
                                    Kelola Kuota Pegawai
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('Kriteria') ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-layer-group"></i>
                                <p>
                                    Kelola Data Kriteria
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('Periode_penilaian') ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-folder-open"></i>
                                <p>
                                    Kelola Periode Penilaian
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('Penilaian') ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-star"></i>
                                <p>
                                    Penilaian KInerja
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('Laporan_penilaian') ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-folder"></i>
                                <p>
                                    Laporan Penilaian
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('Rekomendasi') ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-clipboard"></i>
                                <p>
                                    Rekomendasi Pegawai
                                </p>
                            </a>
                        </li>


                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="<?= base_url('Penilaian') ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-star"></i>
                                <p>
                                    Penilaian
                                </p>
                            </a>
                        </li>
                        <?php
                        $nip_pengguna = $this->session->userdata('nip_pengguna');
                        $staff = $this->db->get_where('tb_staff', ['nip_staff' => $nip_pengguna])->row_array();
                        ?>
                        <li class="nav-item">
                            <a href="<?= base_url('Laporan_penilaian/tampil_penilaian_staff/' . $staff['id_staff']) ?>" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-clipboard"></i>
                                <p>
                                    Laporan Penilaian
                                </p>
                            </a>
                        </li>
                    <?php } ?>

                <?php } ?>


                <?php if ($this->session->userdata('role_id') == 4) { ?>
                    <li class="nav-header">Karyawan</li>
                    <?php
                    $nip_pengguna = $this->session->userdata('nip_pengguna');
                    $pegawai = $this->db->get_where('tb_pegawai', ['nip_pegawai' => $nip_pengguna])->row_array();

                    // var_dump($pegawai['id_pegawai']);die;
                    ?>
                    <li class="nav-item">
                        <a href="<?= base_url('Laporan_penilaian/tampil_penilaian_pegawai/' . $pegawai['id_pegawai']) ?>" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-clipboard"></i>
                            <p>
                                Hasil Penilaian
                            </p>
                        </a>
                    </li>
                <?php } ?>


            </ul>
            <a href="<?= base_url('Autentikasi/keluar') ?>" class="nav-link">
                <i class="nav-icon fas fa-solid fa-right-from-bracket"></i>
                <p>
                    Logout
                </p>
            </a>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>