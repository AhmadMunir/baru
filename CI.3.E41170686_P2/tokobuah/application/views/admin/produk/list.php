<!DOCTYPE html>
<html lang="en">

<head>
<?php 
    $this->load->view('admin/parsial/head')
?>
</head>

<body id="page-top">

  <?php 
    $this->load->view('admin/parsial/navbar')
  ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php
      $this->load->view('admin/parsial/sidebar')
    ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php 
          $this->load->view('admin/parsial/breadcrumb')
        ?>

       <!-- Data Table -->
       <class="card-header">
        <!--Form ini akan mengirim data ke: /admin/produk/add(controller update method add)-->
        <a href="<?php echo site_url('admin/Produk/add')?>"><i class="fas fa plus"></i>Add New></a>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover" id="dataTable"width="100%"cellspacing="0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($produk as $produkkk): ?>
                <tr>
                  <td width="150">
                    <?php echo $produkkk->nama ?>
                  </td>
                  <td>
                    <?php echo $produkkk->harga ?>
                  </td>
                  <td>
                    <img src="<?php echo base_url('upload/produkkk/'.$produkkk->gambar) ?>" width="64"/></img>
                  </td>
                  <td class="small">
                    <?php echo substr($produkkk->deskripsi,0,120) ?>...
                  </td>
                  <td width="250">
                    <a href="<?php echo site_url('admin/produk/edit/'.$produkkk->produk_id)?>"
                      class="btn btn-small">
                      <i class="fas fa-edit"></i>Edit</a>
                    <a onclick="deleteConfirm('<?php echo site_url('admin/Produk/delete/'.$produkkk->produk_id)?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash">
                      </i>Hapus</a>
                  </td>
                <?php endforeach; ?>
              </tr>
        </tbody>
      </table>
    </div>
  </div>

      <!-- Sticky Footer -->
      <?php 
        $this->load->view('admin/parsial/footer')
      ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <?php
    $this->load->view('admin/parsial/scrolltop')
  ?>

  <!-- Logout Modal-->
  <?php 
    $this->load->view('admin/parsial/modal')
  ?>

  <!-- Bootstrap core JavaScript-->
  <?php
    $this->load->view('admin/parsial/js')
  ?>

</body>

</html>
