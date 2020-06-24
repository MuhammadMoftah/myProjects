$("#uploadimgs").on('change', function () {
    $('.images-preview').html('');

    if (this.files && this.files[0]) {
        for (var i = 0; i < this.files.length; i++) {
            $('.images-preview').append('<div class="m-1 d-inline-block"><label style="cursor:pointer">' +
                '<img height="200px" width="200px" style="margin:5px;" src="' + URL.createObjectURL(event.target.files[i]) + '" alt="">' + '</label></div>');
        }
    }
});

$('#add-paragraph').click(function (e) {
    let paragraph_new_number = $(this).attr('data-number');
    $(this).attr('data-number', parseInt(paragraph_new_number) + 1)
    let new_paragraph = `
    <h3>
        New Paragraph
    </h3>
    <div class="form-group form-float">
    <div class="form-line">
        <p>
            <b>English Title</b>
        </p>
        <textarea type="text" value="" id="title_en_${paragraph_new_number}" class="form-control editor" name="paragraphs[${paragraph_new_number}][title_en]"></textarea>
    </div>
    <div class="help-info"></div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <p>
            <b>Arabic Title</b>
        </p>
        <textarea type="text" value="" id="title_ar_${paragraph_new_number}" class="form-control editor" name="paragraphs[${paragraph_new_number}][title_ar]"></textarea>
    </div>
    <div class="help-info"></div>
</div>
<div class="form-group form-float">
    <label class="form-label">English Description</label>
    <div class="form-line">
        <textarea id="description_en_${paragraph_new_number}" name="paragraphs[${paragraph_new_number}][description_en]" cols="30" rows="5" class="form-control no-resize editor"></textarea>
    </div>
</div>
<div class="form-group form-float">
    <label class="form-label">Arabic Description</label>
    <div class="form-line">
        <textarea id="description_ar_${paragraph_new_number}" name="paragraphs[${paragraph_new_number}][description_ar]" cols="30" rows="5" class="form-control no-resize editor"></textarea>
    </div>
</div>
<div class="form-group form-float">
<div class="form-line">
    <p>
        <b>Youtube Link</b>
    </p>
    <input type="url" value="" class="form-control" name="paragraphs[${paragraph_new_number}][youtube_link]">
</div>
<div class="help-info"></div>
</div>
<div class="form-group form-float" style="width:90%">
    <label class="form-label">Paragraph image </label>
    <div class="form-line">
        <input style="margin-left: 50px;" type="file" hidden class="form-control" name="paragraphs[${paragraph_new_number}][image]">
    </div>
    <div class="help-info"></div>
</div>
<div class="col-md-12">
    <p>
        <b>Image Position</b>
    </p>
    <select required name="paragraphs[${paragraph_new_number}][position]" class="form-control show-tick">
        <option>top</option>
        <option>bottom</option>
        <option>left</option>
        <option>right</option>
    </select>
</div>
<script>
    $('.editor').each(function() {
        var id = $(this).attr('id');
        var textarea = document.getElementById(id);
        CKEDITOR.replace(textarea);
    });
    $('.editor').each(function() {
        $(this).removeClass('editor')
    });
</script>
`;
    $('#paragraphs').append(new_paragraph);
});