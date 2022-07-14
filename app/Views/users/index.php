<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
    <?= $this->include('admin/_inc/content-header') ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <section class="">
            <!-- Pagination -->
            <div class="pagination justify-content-center mb-4">
                <?php if ( ! empty($pager)) :
                    //echo $pager->simpleLinks('group1', 'bs_simple');
                    echo $pager->links('group1', 'bs_full');
                endif ?>

                <!-- Bootstrap 4.5.2 code to show page 1 of 4 total pages using a button. -->
                <div class="btn-group pagination justify-content-center mb-4" role="group" aria-label="pager counts">
                    &nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-light"><?= 'Page '.$currentPage.' of '.$totalPages; ?></button>
                </div>
            </div> 
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?= $this->endSection() ?>