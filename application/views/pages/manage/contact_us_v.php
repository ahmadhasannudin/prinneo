<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Kritik & Saran</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      </div>
    </div>
    <div class="row my-4">
      <div class="col-12 ">
        <?php echo $this->session->flashdata('notifikasi');   ?>
        <!-- Goals -->
        <div class="card">
          <div class="table-responsive p-4">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Nama</th>
                  <th>No hp</th>
                  <th>Email</th>
                  <th>Topik</th>
                  <th>Isi Saran</th>
                  <th>Balas Ke</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($contacts as $contact):
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $no; ?></td>
                    <td><?php echo $contact->contact_us_name ?></td>
                    <td><?php echo $contact->contact_us_phone ?></td>
                    <td><?php echo $contact->contact_us_email ?></td>
                    <td><?php echo $contact->contact_us_topik ?></td>
                    <td><?php echo $contact->contact_us_message ?></td>
                    <td>
                      <?php if ($contact->contact_us_reply=='Telpon') {
                        echo 'telpon : '.$contact->contact_us_phone; 
                      } else { 
                       echo 'Email : '.$contact->contact_us_email;
                      } ?>
                        
                      </td>
                    <td class="text-center">
                      <a>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $contact->contact_us_id; ?>" >
                          <i class="fas fa-trash mr-2"></i>Delete
                        </button>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="<?php echo $contact->contact_us_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Apakah Anda ingin menghapus Saran <b><?php echo $contact->contact_us_name; ?></b> ?
                            </div>
                            <div class="modal-footer">
                             <a href="<?php echo site_url('manage/contacts/delete/'.$contact->contact_us_id) ?>">
                              <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php
                $no++;
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
        <!-- tabel tutup -->
      </div>
    </div>
  </div>
</main>
