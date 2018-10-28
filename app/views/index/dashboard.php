<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 09/09/18
 * Time: 11:36
 */
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>PELAKSANAAN TINDAK LANJUT</h2>
                        <table class="table table-striped">
                            <tr>
                                <th>Unit</th>
                                <th class="text text-success">On-Track</th>
                                <th class="text text-warning">Alert</th>
                                <th class="text text-danger">Off-Track</th>
                                <th class="text text-info">Done</th>
                                <th>Total</th>
                            </tr>
                            <?php
                            $arr = [];
                            foreach ($dashboard as $data): ?>
                                <tr>
                                    <td><?= $data['unit'] ?></td>
                                    <td class="text-success"><a
                                                href="<?= $this->url->get("index/detail/" . $data['unit'] . "/" . $data['ONTRACK']) ?>"><?= $data['ONTRACK'] ?></a>
                                    </td>
                                    <td class="text-warning">
                                        <a href="<?= $this->url->get("index/detail/" . $data['unit'] . "/" . $data['Alert']) ?>"><?= $data['Alert'] ?></a>
                                    </td>
                                    <td class="text-danger"><a
                                                href="<?= $this->url->get("index/detail/" . $data['unit'] . "/" . $data['OFFTRACK']) ?>"><?= $data['OFFTRACK'] ?></a>
                                    </td>
                                    <td class="text-info"><a
                                                href="<?= $this->url->get("index/detail/" . $data['unit']. "/" . $data['Done']) ?>"><?= $data['Done'] ?></a>
                                    </td>
                                    <td>
                                        <?= $sum = $data['ONTRACK'] + $data['Alert'] + $data['OFFTRACK'] + $data['Done'] ?>
                                    </td>
                                </tr>
                                <?php
                                array_push($arr, [$data['unit'], $sum]);
                            endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    --><?php //echo (new Phalcon\Debug\Dump())->variable($arr)?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-box">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function () {

        var options = {
            title: {
                text: "Statistik Tindak Lanjut"
            },
            data: [{
                type: "pie",
                startAngle: 45,
                showInLegend: "true",
                legendText: "{label}",
                indexLabel: "{label} ({y})",
                yValueFormatString: "#,##0.#" % "",
                dataPoints: [
                    <?php foreach ($status as $data): ?>

                    {label: "<?= $data->status ?>", y: <?=$data->jumlah ?>},
                    <?php endforeach; ?>
                ]
            }]
        };
        $("#chartContainer").CanvasJSChart(options);

    }
</script>