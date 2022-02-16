<?php require __DIR__ . '/../layouts/head.php'; ?>

<a class="btn btn-md btn-primary" href="<?= route('/article/create') ?>">CREATE NEW</a>
<br><br>
<table class="table table-striped table-bordered">
    <tr>
        <th></th>
        <th>ID</th>
        <th>TITLE</th>
        <th>CONTENT</th>
        <th>CREATED BY</th>
        <th>CREATED DATE</th>
    </tr>

    <!-- iterate $cruddata from our controller  -->
    <?php foreach ($blogs->get() as $blog) { ?>
        <tr>
            <td class="text-center">
                <a href="<?= route('/article/edit', $blog['id']) ?>">
                    edit
                </a>
                <span class="text-muted">|</span>
                <a href="" onclick="deleteItem('<?= $blog['id'] ?>')">
                    delete
                </a>
            </td>
            <td><?= $blog['id'] ?></td>
            <td><?= $blog['title'] ?></td>
            <td><?= (strlen($blog['content']) > 200) ? substr($blog['content'], 0, 200) . '...' : $blog['content']; ?></td>
            <td><?= (!empty($blog['users'][0])) ? $blog['users'][0]['fullname'] : $blog['users']['fullname']; ?></td>
            <td><?= date('M d, Y', strtotime($blog['created_at'])) ?></td>
        </tr>
    <?php } ?>

</table>

<?= $blogs->links() ?>

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