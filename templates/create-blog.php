<?php $this->layout("layout", ["title" => "HomePage"]); ?>

<?php $this->push("styles") ?>
<link rel="stylesheet" href="/public/css/create-blog.css">
<?php $this->end() ?>

<?php $this->start("main") ?>

<form action="post-blog" method="post" class="create-form">
    <h1 class="create-form-head">Create Blog</h1>
    <div class="create-inp-grp"><label for="title">Title </label><input type="text" id="title" name="title"
            placeholder="Blog title here" required></div>
    <div class="create-inp-grp"><label for="excerpt">Excerpt </label><input type="text" id="excerpt" name="excerpt"
            placeholder="Blog excerpt here" required></div>
    <div class="create-inp-grp"><label for="author_name">Author Name</label><input type="text" id="author_name"
            name="author_name" placeholder="Author name here" required>
    </div>
    <div class="create-inp-grp"><label for="body">Body </label><textarea type="text" id="body" name="body"
            placeholder="Blog content here" required></textarea></div>
    <div class="create-btn-grps"><button type="submit">Submit</button><button type="button">Cancel</button>
    </div>
</form>

<?php $this->stop() ?>