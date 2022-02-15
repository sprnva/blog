<?php require __DIR__ . '/../layouts/head.php'; ?>

<input type="hidden" id="crud_id" value="<?= $data['id'] ?>">

<input class="form-control" type="text" id="title" placeholder="title" value="<?= $data['title'] ?>">
<span class="text-danger" id="title-error"></span>

<br>

<!-- <input class="form-control" type="text" id="description" placeholder="description" value="<?= $data['content'] ?>"> -->
<div style="font-size: 16px;word-break: break-word;white-space: pre-wrap;color: #4e4e4e; margin-bottom: 5px;line-height: 22px;-webkit-user-modify: read-write-plaintext-only;outline: -webkit-focus-ring-color auto 0px;background-color: #e6e6e6;padding: 20px;border-radius: 4px;" contenteditable="true" id="description"><?= html_entity_decode($data['content']) ?></div>

<span class="text-danger" id="description-error"></span>

<br><br>

<button class="btn btn-md btn-primary" onclick="update()">UPDATE</button>


<script>
    function update() {
        var title = $("#title").val();
        var description = $("#description").html();
        var crud_id = $("#crud_id").val();

        // remember base_url + "/crud_update" will be 
        // directed to config->routes->web.php
        $.post(base_url + "/article/update", {
            id: crud_id,
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
                $("#description-error").html(res.description);
            }
        });
    }
</script>

<?php require __DIR__ . '/../layouts/footer.php'; ?>