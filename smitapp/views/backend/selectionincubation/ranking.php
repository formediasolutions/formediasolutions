<!-- Content -->
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header"><h2>Penilaian Peringkat</h2></div>
            <div class="body">
                <?php //if($is_admin): ?>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#step_one" data-toggle="tab">
                                <i class="material-icons">label</i> TAHAP 1
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#step_two" data-toggle="tab">
                                <i class="material-icons">label</i> TAHAP 2
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="step_one">
                                <div class="table-container table-responsive table-praincubation-score">
                                    <div class="table-actions-wrapper">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-warning dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                                                Export
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:;" class="table-export-excel"> Export ke Excel </a></li>
                                                <!-- <li><a href="javascript:;" class="table-export-pdf"> Export ke PDF </a></li> -->
                                            </ul>
                                        </div>
                            		</div>
                                    <table class="table table-striped table-bordered table-hover" id="admin_stepone" data-url="<?php echo base_url('seleksiinkubasi/peringkatstep1'); ?>">
                                        <thead>
                                			<tr role="row" class="heading bg-blue">
                                  				<th class="width5">No</th>
                                                <th class="width10 text-center">Tahun</th>
                                  				<th class="width20">Nama Peneliti Utama</th>
                                                <th class="width15 text-center">Satuan Kerja</th>
                                                <th class="width20 text-center">Judul Kegiatan</th>
                                  				<th class="width5 text-center">Total Nilai</th>
                                  				<th class="width5 text-center">Rata Nilai</th>
                                                <th class="width10 text-center">Tanggal Daftar</th>
                                  				<th class="width10 text-center">Actions<br /><button class="btn btn-xs btn-warning table-search"><i class="material-icons">search</i></button></th>
                 						     </tr>
                                            <tr role="row" class="filter display-hide table-filter">
                                                <td></td>
                                                <td>
                                                    <select name="search_year" class="form-control form-filter input-sm def">
                                                    <?php
                                                        $option = array(''=>'Pilih Tahun');
                                                        $year_now   = date('Y')+1;
                                                        $year_arr   = smit_select_year(1945,$year_now);
                                                        if( !empty($year_arr) ){
                                                            foreach($year_arr as $val){
                                                                $option[$val] = $val;
                                                            }
                                                        }

                                                        if( !empty($option) ){
                                                            foreach($option as $val){
                                                                echo '<option value="'.$val.'">'.$val.'</option>';
                                                            }
                                                        }else{
                                                            echo '<option value="">Tahun Kosong</option>';
                                                        }
                                                    ?>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_name" /></td>
                                                <td>
                                                    <?php
                                                    	$workunit_type = smit_workunit_type();
                                                        $option = array('' => 'Pilih...');
                                                        $extra = 'name="search_workunit" class="form-control show-tick"';

                                                        if( !empty($workunit_type) ){
                                                            foreach($workunit_type as $val){
                                                                $option[$val->workunit_id] = $val->workunit_name;
                                                            }
                                                        }
                                                        echo form_dropdown('workunit_type',$option,'',$extra);
                                                    ?>
                                                </td>
                    							<td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_title" /></td>
                    							<td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_score" /></td>
                    							<td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_avarage_score" /></td>
                                                <td>
                    								<input type="text" class="form-control form-filter input-sm date-picker text-center bottom5" readonly name="search_datecreated_min" placeholder="From" />
                    								<input type="text" class="form-control form-filter input-sm date-picker text-center" readonly name="search_datecreated_max" placeholder="To" />
                    							</td>
                    							<td style="text-align: center;">
                                                    <div class="bottom5">
                    								    <button class="btn bg-blue waves-effect filter-submit" id="btn_admin_stepone">Search</button>
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

                        <div role="tabpanel" class="tab-pane fade" id="step_two">
                            <div class="table-container table-responsive">
                                <div class="table-actions-wrapper">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-warning dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                                            Export
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:;" class="table-export-excel"> Export ke Excel </a></li>
                                            <!-- <li><a href="javascript:;" class="table-export-pdf"> Export ke PDF </a></li> -->
                                        </ul>
                                    </div>
                        		</div>
                                <table class="table table-striped table-bordered table-hover" id="admin_steptwo" data-url="<?php echo base_url('seleksiinkubasi/peringkatstep2'); ?>">
                                    <thead>
                						<tr role="row" class="heading bg-blue">
                							<th class="width5">No</th>
                                            <th class="width10 text-center">Tahun</th>
                							<th class="width20">Nama Peneliti Utama</th>
                                            <th class="width15 text-center">Satuan Kerja</th>
                                            <th class="width20 text-center">Judul Kegiatan</th>
                							<th class="width5 text-center">Total Nilai</th>
                    						<th class="width5 text-center">Rata Nilai</th>
                                            <th class="width10 text-center">Tanggal Daftar</th>
                							<th class="width10 text-center">Actions<br /><button class="btn btn-xs btn-warning table-search"><i class="material-icons">search</i></button></th>
   						                </tr>
                                        <tr role="row" class="filter display-hide table-filter">
                							<td></td>
                                            <td>
                                                <select name="search_year" class="form-control form-filter input-sm def">
                                                <?php
                                                    $option = array(''=>'Pilih Tahun');
                                                    $year_now   = date('Y')+1;
                                                    $year_arr   = smit_select_year(1945,$year_now);
                                                    if( !empty($year_arr) ){
                                                        foreach($year_arr as $val){
                                                            $option[$val] = $val;
                                                        }
                                                    }

                                                    if( !empty($option) ){
                                                        foreach($option as $val){
                                                            echo '<option value="'.$val.'">'.$val.'</option>';
                                                        }
                                                    }else{
                                                        echo '<option value="">Tahun Kosong</option>';
                                                    }
                                                ?>
                                                </select>
                                            </td>
                							<td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_name" /></td>
                                            <td>
                                                <?php
                                                	$workunit_type = smit_workunit_type();
                                                    $option = array('' => 'Pilih...');
                                                    $extra = 'name="search_workunit" class="form-control show-tick"';

                                                    if( !empty($workunit_type) ){
                                                        foreach($workunit_type as $val){
                                                            $option[$val->workunit_id] = $val->workunit_name;
                                                        }
                                                    }
                                                    echo form_dropdown('workunit_type',$option,'',$extra);
                                                ?>
                                            </td>
                							<td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_title" /></td>
                							<td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_score" /></td>
                							<td><input type="text" class="form-control form-filter input-sm text-uppercase" name="search_avarage_score" /></td>
                                            <td>
                								<input type="text" class="form-control form-filter input-sm date-picker text-center bottom5" readonly name="search_datecreated_min" placeholder="From" />
                								<input type="text" class="form-control form-filter input-sm date-picker text-center" readonly name="search_datecreated_max" placeholder="To" />
                							</td>
                							<td style="text-align: center;">
                                                <div class="bottom5">
                								    <button class="btn bg-blue waves-effect filter-submit" id="btn_admin_steptwo">Search</button>
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

                <?php //endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- #END# Content -->
