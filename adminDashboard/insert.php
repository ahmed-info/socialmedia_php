<?php include('includes/header.php') ?>
<div class="container-fluid py-4">
    <div class="row min-vh-80 h-100">
        <div class="col-12">
           
            <div class="card">
                <div class="card-header">
                    <h4>
                        insert data
                        <a href="index.php" class="btn btn-danger float-end ms-2">back</a>
                        <a href="insert.php" class="btn btn-primary float-end">insert data</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="code.php">
  <div class="mb-3">
    <input type="number" class="form-control" name="post_owner" placeholder="post_owner">
    <input type="number" class="form-control" name="post_visibility" value="1" placeholder="post_visibility">
  </div>

    <div class="mb-3">
    <label for="post_date" class="form-label">post date</label>
    <input type="date" class="form-control" id="" name="post_date">
  </div>

    <div class="mb-3">
    <label for="text_content" class="form-label">enter text</label>
    <input type="text" class="form-control" name="text_content" placeholder="text content">
  </div>

    <div class="mb-3">
    <label for="picture_media" class="form-label">picture_media
</label>
    <input type="text" class="form-control" name="picture_media">
  </div>

  <div class="mb-3">
    <label for="picture_media" class="form-label">picture_media
</label>
    <input type="text" class="form-control" name="video_media">
  </div>

  <div class="mb-3">
    <label for="picture_media" class="form-label">picture_media
</label>
    <input type="hidden" class="form-control" value="12" name="post_place">
  </div>

  <button type="submit" name="save_btn" class="btn btn-primary">save data</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>