<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 09/09/18
 * Time: 8:49
 */
?>
<script>
    window.onload = function () {

        var options = {
            animationEnabled: true,
            title: {
                text: "Kegiatan KPPN Pekanbaru"
            },

            axisX: {
                title: "Kegiatan"
            },
            data: [{
                type: "column",
                dataPoints: [
                    <?php foreach ($data as $datum): ?>
                    {label: "<?= $datum->status ?>", y: <?= $datum->jumlah ?>},
                    <?php endforeach; ?>
                ]
            }]
        };
        $("#chartContainer").CanvasJSChart(options);

    }
</script>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">
            Statistik Kegiatan Berdasarkan Status
        </h4>
    </div>
    <div class="card-body d-flex justify-content-between">
        <div id="chartContainer" style="height: 400px; width: 100%;"></div>

    </div>
</div>
