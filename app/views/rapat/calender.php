<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 08/09/18
 * Time: 21:28
 */
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= $this->url->get('rapat/index') ?>" class="btn btn-outline-dark">Kembali</a>
            </div>
            <div class="card-body">

                <div id='calendar1' style="width: 100%; "></div>

            </div>
        </div>
    </div>
</div>
<script>
    $("#calendar1").fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: ' month,basicWeek,basicDay'
        },
        editable: !0,
        droppable: !0,
        dragRevertDuration: 0,
        eventLimit: !0,
        events: [

            <?php
            $dataTanggal = Rapat::find(['order' => 'rapatID DESC']);
            foreach ($dataTanggal as $datassss): ?>
            {
                title: '<?= $datassss->rapatNama ?>',
                start: '<?= $datassss->rapatTanggal ?>'
            },
            <?php endforeach; ?>

        ]

    });
</script>