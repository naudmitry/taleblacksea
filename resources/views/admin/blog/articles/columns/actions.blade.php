<div class="btn-group">
    <a
        href="{{ route('admin.blog.article.edit', '') }}/@{{blog.id}}"
        class="btn btn-primary"
    ><i class="fa fa-lg fa-edit" style="color: #FFF"></i></a>

    <a
        href="{{ route('admin.blog.article.delete', '') }}/@{{blog.id}}"
        class="btn btn-primary blog-article-delete"
    ><i class="fa fa-lg fa-trash" style="color: #FFF"></i></a>
</div>