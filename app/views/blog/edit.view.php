<?php require __DIR__ . '/../layouts/head.php'; ?>

<input type="hidden" id="crud_id" value="<?= $data['id'] ?>">

<a class="btn btn-md btn-secondary" href="<?= route('/article') ?>">GO BACK</a>
<br><br>

<input class="form-control" type="text" id="title" placeholder="title" value="<?= $data['title'] ?>">
<span class="text-danger" id="title-error"></span>

<!-- <input class="form-control mt-4" type="file" id="thumbnail" placeholder="thumbnail"> -->

<br>

<div class="alert alert-warning mt-3" role="alert">
    The content is markdown ready. Please visit to the markdown cheat sheet.
</div>

<div class="form-control" style="font-size: 16px;word-break: break-word;white-space: pre-wrap;color: #4e4e4e; margin-bottom: 5px;line-height: 22px;-webkit-user-modify: read-write-plaintext-only;outline: -webkit-focus-ring-color auto 0px;background-color: #fff;padding: 30px;border-radius: 4px;" contenteditable="true" id="description"><?= html_entity_decode($data['content']) ?></div>

<span class="text-danger" id="description-error"></span>

<br><br>
<button class="btn btn-md btn-primary float-right" onclick="update()">UPDATE BLOG</button>
<br><br><br><br>


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