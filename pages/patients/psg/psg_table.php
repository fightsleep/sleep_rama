<table id="" class="table table-bordered table-striped table-hover" width="100%">
                        <thead class="table-success">
                            <tr>
                                <th width="5%">ลำดับ</th>
                                <th width="5%">HN</th>
                                <th width="10%">ชื่อ</th>
                                <th width="10%">วันที่ตรวจ</th>
                                <th width="5%">แผนก</th>
                                <th width="10%">แพทย์ส่งตรวจ</th>
                                <th width="10%">แพทย์อ่านผล</th>
                                <th width="15%">PreDx</th>
                                <th width="5%">AHI</th>
                                <th width="5%">RDI</th>
                                <th width="5%">Rera</th>
                                <th width="15%">ผลการตรวจ</th>
                                <th width="5%">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($result_psg as $psg) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $psg['hn_psg']; ?></td>
                                    <td><?= $psg['firstname']; ?></td>
                                    <td><?= DateThai($psg['date_psg']); ?></td>
                                    <td><?= $psg['opd_psg']; ?></td>
                                    <td><?= $psg['doctor_refering']; ?></td>
                                    <td><?= $psg['doctor_review']; ?></td>
                                    <td><?= $psg['predx']; ?></td>
                                    <td><?= $psg['ahi']; ?></td>
                                    <td><?= $psg['rdi']; ?></td>
                                    <td><?= $psg['rera_index']; ?></td>
                                    <!-- <td><?= $psg['min_sat']; ?></td> -->
                                    <td><a href="psg/psg_detail.php?id_psg=<?= $psg['id_psg']; ?>" class="btn btn-info btn-sm">รายละเอียด</a></td>
                                     <!-- <td><a href="/my_project/sleeprama_systems/pages/patients/psg/form_psg_edit.php?id_psg=<?= $psg['id_psg']; ?>" class="btn btn-warning">
                        แก้ไข </a></td> -->
                                     <td><button type="button" name="delete_psg" class="btn btn-danger" id="delete_psg" data-id=<?= $psg['id_psg']; ?>> ลบ </button></td> 
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>