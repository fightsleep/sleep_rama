<table id="acti" class="table table-bordered table-striped table-hover" width="100%">
                        <thead class="table-warning">
                            <tr>
                                <th width="5%">ลำดับ</th>
                                <th width="5%">HN</th>
                                <th width="15%">วันที่ชั่ง</th>
                                <th width="10%">ส่วนสูง</th>
                                <th width="5%">นัำหนัก</th>
                                <th width="10%">รอบคอ</th>
                                <th width="15%">รอบเอว</th>
                                <th width="5%">รอบสะโพก</th>
                                <th width="5%">ความดันเลือด</th>
                                <th width="5%">แก้ไข</th>
                                <th width="5%">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($result_physical as $physical) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $physical['hn_physical']; ?></td>
                                    <td><?= DateThai($physical['date_physical']); ?></td>
                                    <td><?= $physical['weight']; ?></td>
                                    <td><?= $physical['height']; ?></td>
                                    <td><?= $physical['neck']; ?></td>
                                    <td><?= $physical['waist']; ?></td>
                                    <td><?= $physical['hip']; ?></td>
                                    <td><?= $physical['blood_pressure']; ?></td>
                                    <td>
                                        <button type="button" name="update_physical" class="btn btn-warning btn-block update_physical" id="update_physical" data-id=<?= $physical['id_physical']; ?>>แก้ไข</button>
                                    </td>
                                    <td><button type="button" name="delete_physical" class="btn btn-danger" id="delete_physical" data-id=<?= $physical['id_physical']; ?>> ลบ </button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>