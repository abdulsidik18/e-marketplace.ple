<!--start: Header --> 
	<header>
		
		<!--start: Container -->
		<div class="container">
			
			<!--start: Row --> 
			<div class="row">
					 
				<!--start: Logo -->
				<div class="logo span3">
						
					<a class="brand" href="index.php"><img src="img/logo1.png" alt="Logo" style="margin-left:-15px;"></a>
						
				</div>
				<!--end: Logo -->
					
				<!--start: Navigation -->
				<div class="span9">
					
					<div class="navbar navbar-inverse">
			    		<div class="navbar-inner">
			          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			          		</a>
			          		<div class="nav-collapse collapse">
			            		<ul class="nav" style="width: 718px;">
			              			<li class="active"><a href="index.php">Beranda</i></a></li>
                                    <li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Produk <b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                  				<li><a href="florikultura.php">Florikultura</a></li>
			                  				<li><a href="utility.php">Peralatan</a></li>
			                			</ul>
			              			</li>            
									<li><a href="testimoni.php">Testimonial</a></li>
									<li><a href="alur.php">Alur Belanja</a></li>

									<li><a data-toggle="modal" data-target="#modal-default" href="#">Informasi</a></li>
                                   <div class="modal fade" id="modal-default">
                                 <div class="modal-dialog">
                                <div class="modal-content">
                               <div class="modal-header">
                              <h4 class="modal-title"><center>Waktu Operasional</center></h4>
                               </div>
					 <div class="hero-unit1" style="color: black" >
					 	 <?php
					//menampilkan 5 buku tamu terbaru
					$res = $koneksi->query("SELECT * FROM waktu_operasional ORDER BY id_waktu DESC LIMIT 1") or die($koneksi->error);
				if($res->num_rows){
			while($row = $res->fetch_assoc()){
				echo '
				
					<tr>
						<td width="1000">'.$row['keterangan'].'</td>
					</tr>
					
				</table>
				';
			}
		}else{
			echo 'Belum ada komentar';
		}
		
		?>
					
                      </div>

                   <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </u>

                            	 
              </div>
            </div>
            <!-- /.modal-content -->
                </div>
                    <!-- /.modal-dialog -->
                        </div>
                         <!-- /.modal -->

                                    <li><a href="profil.php">Tentang</a></li>
			              			<li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                				<div class="container"> 
			                  				<li><a href="index.html">Pelanggan</a></li>
			                			</ul>
			              			</li>
			            		</ul>
			          		</div>
			        	</div>
			      	</div>
					
				</div>	
				<!--end: Navigation -->
					
			</div>
			<!--end: Row -->
			
		</div>
		<!--end: Container-->			
			
	</header>
	<!--end: Header-->