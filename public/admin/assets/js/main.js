// handle delete modal 
function handleDeleteCategory(id) {

    var form = document.getElementById('deleteCategoryForm')
    form.action = '/admin/category/delete/' + id
    console.log('deleting.', form);
    $('#deleteModal').modal('show')
}

function handleDeleteTag(id) {
    var form = document.getElementById('deleteTagForm')
    form.action = '/admin/tag/delete/' + id
    console.log('deleting.', form)
    $('#deleteModal').modal('show')
}

function handleDeletePost(id) {
    var form = document.getElementById('deletePostForm')
    form.action = '/admin/post/delete/' + id
    console.log('deleting.', form)
    $('#deleteModal').modal('show')
}

function handleDeleteBanner(id) {
    var form = document.getElementById('deleteBannerForm')
    form.action = '/admin/banner/delete/' + id
    console.log('deleting.', form)
    $('#deleteModal').modal('show')
}

// Selected2 multiple
$(document).ready(function () {
    $('.tags-selector').select2();
});

