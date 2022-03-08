<?php require __DIR__ . '/../layouts/head.php'; ?>

<a class="btn btn-md btn-primary" href="<?= route('/article/create') ?>">CREATE NEW</a>
<br><br>
<table class="table table-bordered">
    <tr>
        <th style="width: 13%;"></th>
        <th class="text-center" style="width: 3%;">ID</th>
        <th>TITLE</th>
        <th>CONTENT</th>
        <th style="width: 13%;">CREATED BY</th>
        <th style="width: 13%;">CREATED DATE</th>
    </tr>

    <!-- iterate $cruddata from our controller  -->
    <?php foreach ($blogs as $blog) { ?>
        <tr>
            <td class="text-center">
                <a class="btn btn-secondary btn-sm" href="<?= route('/article/edit', $blog['id']) ?>">
                    edit
                </a>
                <a class="btn btn-danger btn-sm" href="" onclick="deleteItem('<?= $blog['id'] ?>')">
                    delete
                </a>
            </td>
            <td class="text-center"><?= $blog['id'] ?></td>
            <td><?= $blog['title'] ?></td>
            <td><?= (strlen($blog['content']) > 200) ? substr($blog['content'], 0, 200) . '...' : $blog['content']; ?></td>
            <td><?= (!empty($blog['users'][0])) ? $blog['users'][0]['fullname'] : $blog['users']['fullname']; ?></td>
            <td><?= date('M d, Y', strtotime($blog['created_at'])) ?></td>
        </tr>
    <?php } ?>

</table>

<?= $links ?>

<script>
    function deleteItem(id) {
        $.post(base_url + "/article/delete", {
            id: id
        }, function(data) {
            var res = JSON.parse(data);
            if (res == 1) {
                alert("ALL GOOD!");
                location.reload();
            } else {
                alert("ERROR DELETING");
            }
        });
    }
</script>

<?php require __DIR__ . '/../layouts/footer.php'; ?>