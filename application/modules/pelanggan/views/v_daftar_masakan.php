
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">List Masakan</h1>
            <span class="color-text-a">Silahken Pilih.....!!!!</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
         
        </div>
      </div>
    </div>
  </section>

<section class="property-grid grid">
    <div class="container">
      <div class="row">
        
        <?php
		foreach ($dt_mas as $mas) 
		{
			echo '
			<div class="col-md-4">
	          <div class="card-box-a card-shadow">
	            <div class="img-box-a">
	              <img src='.base_url("assets/gambar_masakan/$mas->gambar_masakan").' alt="" class="img-a img-fluid" style="height: 250px;">
	            </div>
	            <div class="card-overlay">
	              <div class="card-overlay-a-content">
	                <div class="card-header-a">
	                  <h2 class="card-title-a">
	                    <a href="#">'.$mas->nama_masakan.'</a>
	                  </h2>
	                </div>
	                <div class="card-body-a">
	                  <div class="price-box d-flex">
	                    <span class="price-a">Rp. '.$mas->harga.',-</span>
	                  </div>
	                  <a href="#detail" data-toggle="modal" class="link-a" onclick="tm_detail('.$mas->id_masakan.')">Detail Masakan
	                    <span class="ion-ios-arrow-forward"></span>
	                  </a>
	                </div>
	                <div class="card-footer-a">
	                  
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>';
		}
	?>

	
        

      </div>    
    </div>
  </section>

		

		
	

								<div class="modal fade" id="detail" role="dialog">
									<div class="modal-dialog modals-default">
							    		<div class="modal-content">
						         			<div class="modal-header">
						         				 <button type="button" class="close" data-dismiss="modal">&times;</button>
						       				 </div>
						         			<div class="modal-body">
										         <div id="gambar"></div>
										         <div id="deskripsi"></div>
										         <div id="jumlah"></div><br><br>             	
										           
						          			</div>
										     <div class="modal-footer">
										       <div id="btn"></div>                         
                                            </div><br><br> 
                                            <div id="pesan"></div>
                                        </div>
                                    </div>
                                </div>


<script type="text/javascript">
	//menampilkan menu makanan
	
	//menampilkan detail masakan
	function tm_detail(id_masakan){
		$.getJSON("<?= base_url()?>index.php/pelanggan/get_masakan/detail/"+id_masakan,function(data){
		$('#gambar').html(
			'<img src="<?= base_url()?>assets/gambar_masakan/'+data['gambar_masakan']+'" style="width:100%">'
			);
		$('#deskripsi').html(
			'<table class="table table-hover table-stripped">'+
        		'<tr><td>Nama masakan</td><td>'+data['nama_masakan']+'</td></tr>'+
        		'<tr><td>Harga</td><td>Rp. '+data['harga']+',-</td></tr>'+
        		'<tr><td>Status masakan</td><td><div id="sm"></div></td></tr>'+
      		'</table>'
      		);
		$('#jumlah').html(
      		'<label>Pesan dengan jumlah</label>'+
      		'<input type="number" id="jumlah_item" value="1" name="jumlah[]" class="form-control">'
      		);
    	$('#btn').html(
        	'<button id="beli" onclick="beli('+data['id_masakan']+')" class="btn btn-default">PESAN</button>'
        	
      		);
    	if (data['status_masakan']=="ada") {
    		$("#sm").html(data['status_masakan']);
    		$("#sm").addClass('alert alert-success');
    		$("#sm").show('animate');
    	}
    	else
    	{
    		$("#sm").html(data['status_masakan']);
    		$("#sm").addClass('alert alert-danger');
    		$("#sm").show('animate');
    	}
	});
}
//menambah pesanan ke keranjang
function beli(id_masakan){
		var jumlah=$('#jumlah_item').val();
		
		$('#pesan').hide();
		$('#pesan').removeClass("alert alert-success");
		$.getJSON("<?= base_url()?>index.php/pelanggan/get_masakan/detail/"+id_masakan,function(data){
			if (data['status_masakan']=="ada") 
			{
				$.getJSON("<?= base_url()?>index.php/pelanggan/Transaksi_pel/tambah_cart/"+id_masakan+"/"+jumlah,function(hasil){
					$('#cart').html(hasil['total_cart']);
					$('#pesan').html("item anda ditambahkan ke cart");
					$('#pesan').addClass('alert alert-success');
					$('#pesan').show('animate');
					setTimeout(function(){
						$('#pesan').hide('fade');
					}, 3000);
				});
			}
			else
			{
					$('#pesan').html("Masakan habis");
					$('#pesan').addClass('alert alert-danger');
					$('#pesan').show('animate');
					setTimeout(function(){
						$('#pesan').hide('fade');
					}, 3000);
			}

		});
		
	}
</script>