<?php require __DIR__ . '/../layouts/head.php'; ?>

<input class="form-control" type="text" id="title" placeholder="title">
<span class="text-danger" id="title-error"></span>
<br>
<input class="form-control" type="text" id="description" placeholder="description">
<span class="text-danger" id="description-error"></span>
<br><br>
<button class="btn btn-md btn-primary" onclick="add()">ADD</button>
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
            <td><?= $blog['content'] ?></td>
            <td><?= $blog['user_id'] ?></td>
            <td><?= date('M d, Y', strtotime($blog['created_at'])) ?></td>
        </tr>
    <?php } ?>

</table>

<?= $blogs->links() ?>

<script>
    function add() {
        var title = $("#title").val();
        var description = $("#description").val();

        // remember base_url + "/crud_add" will be 
        // directed to config->routes->web.php
        $.post(base_url + "/article/add", {
            title: title,
            content: description
        }, function(data) {

            // parse the json response from our controller
            var res = JSON.parse(data);

            if (res == 1) {
                alert("ALL GOOD!");
                location.reload();
            } else {
                // display the error in the span under the inputs
                $("#title-error").html(res.title);
                $("#description-error").html(res.content);
            }
        });
    }

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