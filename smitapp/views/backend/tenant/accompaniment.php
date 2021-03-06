<!-- BEGIN INFORMATION SUCCESS EDIT KATEGORI MODAL -->
<div class="modal fade" id="edit_accompaniment_tenant" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Ubah Daftar Pendampingan</h4>
			</div>
			<div class="modal-body">
                <?php echo form_open_multipart( 'tenant/companiontenantedit', array( 'id'=>'companiontenantedit', 'role'=>'form' ) ); ?>
                <div id="alert" class="alert display-hide"></div>
                <div class="form-group form-float">
                    <div class="form-group">
                        <label class="form-label">Nama Pendamping Lama <b style="color: red !important;">(*)</b></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="material-icons">subject</i></span>
                            <div class="form-line">
                                <input type="hidden" name="reg_uniquecode" id="reg_uniquecode" value="" />
                                <input type="hidden" name="reg_tenant_id" id="reg_tenant_id" value="" />
                                <input type="text" name="reg_companion_name" id="reg_companion_name" class="form-control" placeholder="Masukan Nama Kategori" required disabled="TRUE">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Pendamping Baru <b style="color: red !important;">(*)</b></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="material-icons">assignment</i></span>
                            <div class="form-line">
                                <?php
                                    //$option = array(''=>'Pilih Pendamping');
                                    $companion_arr = smit_companion_list();
                                    $extra = 'class="form-control show-tick" id="companion_id"';

                                    if( $companion_arr || !empty($companion_arr) ){
                                        foreach($companion_arr as $val){
                                            $option[$val->id] = $val->name;
                                        }
                                    }
                                    echo form_dropdown('reg_companion_id',$option,'',$extra);
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- <button type="button" class="btn btn-danger waves-effect" id="btn_category_reset">Bersihkan</button> -->
                </div>
                <?php echo form_close(); ?>
            </div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-primary waves-effect" id="do_edit_companiontenant" data-dismiss="modal">Lanjut</button>
			</div>
		</div>
	</div>
</div>
<!-- END INFORMATION SUCCESS EDIT KATEGORI MODAL -->

<!-- Content -->
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header"><h2>Pendampingan Tenant</h2></div>
            <div class="body">
            <?php if( !empty($is_admin) ): ?>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="accompaniment">
                    <li role="accompaniment" class="active">
                        <a href="#listaccompaniment" id="listaccompaniment_tab" data-toggle="tab">
                            <i class="material-icons">list</i> DAFTAR PENDAMPINGAN
                        </a>
                    </li>
                    <li role="accompaniment">
                        <a href="#companionassignment" id="companionassignment_tab" data-toggle="tab">
                            <i class="material-icons">add_box</i> PENETAPAN PENDAMPING
                        </a>
                    </li>
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Tab Content List Accompaniment -->
                    <div role="tabpanel" class="tab-pane fade in active" id="listaccompaniment">
                        <div class="table-container table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tenantaccompaniment_list" data-url="<?php echo base_url('tenants/daftarpendampingan'); ?>">
                                <thead>
            						<tr role="row" class="heading bg-blue">
            							<th class="width5 text-center">No</th>
            							<th class="width20">Nama Tenant</th>
                                        <th class="width15 text-center">Pelaksana</th>
                                        <th class="width15 text-center">Peneliti Utama</th>
                                        <th class="width15 text-center">Pendamping</th>
            							<th class="width10 text-center">Actions<br /><button class="btn btn-xs btn-warning table-search"><i class="material-icons">search</i></button></th>
            						</tr>
                                    <tr role="row" class="filter display-hide table-filter">
            							<td></td>
                                        <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_title" /></td>
            							<td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_tenant_name" /></td>
                                        <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_name" /></td>
                                        <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_companion_name" /></td>
            							<td style="text-align: center;">
                                            <div class="bottom5">
            								    <button class="btn bg-blue waves-effect filter-submit" id="btn_accompaniment_list">Search</button>
                                            </div>
                                            <button class="btn bg-red waves-effect filter-cancel">Reset</button>
            							</td>
            						</tr>
                                </thead>
                                <tbody>
                                    <!-- Data Will Be Placed Here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Tab Content Add Accompaniment -->
                    <div role="tabpanel" class="tab-pane fade" id="companionassignment">
                        <div class="table-container table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tenantacceptedselection_list" data-url="<?php echo base_url('tenant/tenantacceptedlistdata'); ?>">
                                <thead>
            						<tr role="row" class="heading bg-blue">
            							<th class="width5 text-center">No</th>
            							<th class="width15 text-center">Nama Tenant</th>
            							<th class="width15">Judul Kegiatan</th>
                                        <th class="width15 text-center">Pelaksana</th>
                                        <th class="width15 text-center">Peneliti Utama</th>
            							<th class="width15 text-center">Actions<br /><button class="btn btn-xs btn-warning table-search"><i class="material-icons">search</i></button></th>
            						</tr>
                                    <tr role="row" class="filter display-hide table-filter">
            							<td></td>
                                        <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_name_tenant" /></td>
                                        <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_title" /></td>
            							<td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_user_name" /></td>
                                        <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_name" /></td>
            							<td style="text-align: center;">
                                            <div class="bottom5">
            								    <button class="btn bg-blue waves-effect filter-submit" id="btn_acceptedselection_list">Search</button>
                                            </div>
                                            <button class="btn bg-red waves-effect filter-cancel">Reset</button>
            							</td>
            						</tr>
                                </thead>
                                <tbody>
                                    <!-- Data Will Be Placed Here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php elseif( !empty($is_pendamping) ) : ?>
                <div class="table-container table-responsive">
                    <div class="table-container table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tenantaccompaniment_list" data-url="<?php echo base_url('tenants/daftarpendampingan'); ?>">
                            <thead>
        						<tr role="row" class="heading bg-blue">
        							<th class="width5 text-center">No</th>
        							<th class="width20">Nama Tenant</th>
                                    <th class="width15 text-center">Pelaksana</th>
                                    <th class="width15 text-center">Peneliti Utama</th>
        							<th class="width10 text-center">Actions<br /><button class="btn btn-xs btn-warning table-search"><i class="material-icons">search</i></button></th>
        						</tr>
                                <tr role="row" class="filter display-hide table-filter">
        							<td></td>
                                    <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_title" /></td>
        							<td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_tenant_name" /></td>
                                    <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_name" /></td>
        							<td style="text-align: center;">
                                        <div class="bottom5">
        								    <button class="btn bg-blue waves-effect filter-submit" id="btn_accompaniment_list">Search</button>
                                        </div>
                                        <button class="btn bg-red waves-effect filter-cancel">Reset</button>
        							</td>
        						</tr>
                            </thead>
                            <tbody>
                                <!-- Data Will Be Placed Here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else : ?>
                <div class="table-container table-responsive">
                    <div class="table-container table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tenantaccompaniment_list" data-url="<?php echo base_url('tenants/daftarpendampingan'); ?>">
                            <thead>
        						<tr role="row" class="heading bg-blue">
        							<th class="width5 text-center">No</th>
        							<th class="width20">Nama Tenant</th>
                                    <th class="width15 text-center">Pelaksana</th>
                                    <th class="width15 text-center">Peneliti Utama</th>
                                    <th class="width15 text-center">Pendamping</th>
        							<th class="width10 text-center">Actions<br /><button class="btn btn-xs btn-warning table-search"><i class="material-icons">search</i></button></th>
        						</tr>
                                <tr role="row" class="filter display-hide table-filter">
        							<td></td>
                                    <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_title" /></td>
        							<td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_tenant_name" /></td>
                                    <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_name" /></td>
                                    <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_companion_name" /></td>
        							<td style="text-align: center;">
                                        <div class="bottom5">
        								    <button class="btn bg-blue waves-effect filter-submit" id="btn_accompaniment_list">Search</button>
                                        </div>
                                        <button class="btn bg-red waves-effect filter-cancel">Reset</button>
        							</td>
        						</tr>
                            </thead>
                            <tbody>
                                <!-- Data Will Be Placed Here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- #END# Content -->