// Show Image whern choose file
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img-display')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
// End Show Image

// Post Delete
function deletePost(id)
{
    var id = id;
    var url = "/delete/" + id;
    $(".deleteForm").attr('action', url);
    $(".postID").attr('value', id);
}
