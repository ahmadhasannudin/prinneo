<!-- banner -->
<div id="banner">
	<div class="container">
		<h2 class="title-banner"><?= $data->title; ?></h2>
	</div>
</div>

<!-- konten -->
<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="mb-3"><?= $data->title; ?></h2>
				<?= $data->description; ?>
			</div>

			<div class="col-md-6" id="aplikasi-ajukan">
				<div class="ajukan-head">AJUKAN APLIKASI</div>
				<div class="ajukan-form">
					<p class="form-tittle">Silahkan isi data :</p>
					<form onsubmit="return false" enctype="multipart/form-data" id="form-applicant" action="<?= $formAction; ?>" accept-charset="utf-8">
						<div class="form-group">
							<label>Nama lengkap :</label>
							<input type="text" class="form-control" name="nama" required>
						</div>
						<div class="form-group">
							<label>Tanggal lahir :</label>
							<input type="date" class="form-control" name="tanggal_lahir" required>
						</div>
						<div class="form-group">
							<label>Alamat lengkap :</label>
							<textarea class="form-control" rows="3" name="alamat" required></textarea>
						</div>
						<div class="form-group">
							<label>Nomor telepon / HP :</label>
							<input type="number" class="form-control" name="telephone" required>
						</div>
						<div class="form-group">
							<label>Email :</label>
							<input type="email" class="form-control" name="email" required>
						</div>

						<div class="form-row">
							<div class="col">
								<label>Status pekerjaan :</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status_pekerjaan" value="masih_bekerja" required>
									<label class="form-check-label" for="#"><i>Masih bekerja</i></label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status_pekerjaan" value="tidak_sedang_bekerja">
									<label class="form-check-label" for="#"><i>Tidak sedang bekerja</i></label>
								</div>
							</div>
							<div class="col">
								<label>Status pernikahan :</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status_pernikahan" id="" value="single" required>
									<label class="form-check-label" for="#"><i>Single</i></label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status_pernikahan" id="" value="menikah">
									<label class="form-check-label" for="#"><i>Menikah</i></label>
								</div><br>
							</div>
						</div>

						<p class="form-tittle">Silahkan lampirkan berkas :</p>
						<div class="form-row">
							<div class="col">
								<label class="filetitle">Surat lamaran (wajib)</label>
								<br>
								<label id="upload_surat"></label>
							</div>
							<div class="form-group col">
								<input type="file" class="form-control" id="surat_lamar" name="surat_lamar">
								<small class="form-text text-muted">Max file size 3 MB</small>
							</div>
						</div>

						<div class="form-row">
							<div class="col">
								<label class="filetitle">Dokumen lamaran wajib (.zip)</label>
								<br>
								<label id="upload_doc"></label>
							</div>
							<div class="form-group col">
								<input type="file" class="form-control" id="doc_lamar" name="doc_lamar">
								<small class="form-text text-muted">Max file size 1 MB</small>
							</div>
						</div>

						<input id="uploadSurat" placeholder="Pilih File..." name="" hidden="">
						<input id="uploadDoc" placeholder="Pilih File..." name="" hidden="">


						<div class="alert-karir" role="alert">Pastikan pengisian dengan benar dan lengkap. Semua data dan dokumen yang kami terima tidak akan dipublikasikan atau dialihkan ke pihak lain.</div>

						<center>
							<button type="button" class="btn btn-karir pr-3 pl-3">Batal</button>
							<button type="submit" class="btn btn-karir pr-3 pl-3">Kirim</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	#aplikasi-ajukan {
		padding: 0;
	}

	.ajukan-head {
		background-color: #fcef00;
		color: #474443;
		padding: 10px;
		font-size: 22px;
		font-weight: 500;
		text-align: center;
	}

	.form-tittle {
		color: #474443;
		font-size: 20px;
	}

	.ajukan-form {
		background-color: rgb(230, 231, 233);
		color: #000;
		padding-top: 20px;
		padding-left: 40px;
		padding-right: 40px;
		padding-bottom: 20px;
	}

	@media screen and (max-width: 575px) {
		.ajukan-form {
			padding: 20px;
		}
	}

	.filetitle {
		font-style: italic;
		font-size: 16px;
		margin-top: 7px;
	}

	.filesize {
		font-size: 14px;
	}

	.alert-karir {
		color: #474443;
		background-color: #fcef00;
		border-color: #fcef00;
		font-size: 12px;
		text-align: justify;
	}

	.ajukan-form .alert-karir {
		color: #000;
		background-color: #fcef00;
		border-color: #fcef00;
		font-size: 14px;
		text-align: justify;
		padding: 10px 16px;
		border-radius: 10px;
		margin-bottom: 20px;
	}

	.btn.btn-karir {
		border-radius: 10px !important;
	}

	.fileUpload input.upload {
		position: absolute;
		top: 0;
		right: 0;
		margin: 0;
		padding: 0;
		font-size: 20px;
		cursor: pointer;
		opacity: 0;
		filter: alpha(opacity=0);
	}
</style>