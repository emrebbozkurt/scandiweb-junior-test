$(function () {
    const form = $('#product_form');
    const button = $('#submit-btn');
    const attribute = $('#attributes');
    const productType = $('#productType');

    productType.change(function () {
        attribute.empty();
        switch (productType.val()) {
            case 'dvd':
                attribute.append('<div class="mb-3 row">\n' +
                    '                <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>\n' +
                    '                <div class="col-sm-4">\n' +
                    '                    <input type="number" class="form-control" name="size" id="size" required>\n' +
                    '                </div>\n' +
                    '                <p class="description">Please, provide size in MB format</p>\n' +
                    '            </div>');
                break
            case 'book':
                attribute.append('<div class="mb-3 row">\n' +
                    '                <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>\n' +
                    '                <div class="col-sm-4">\n' +
                    '                    <input type="number" class="form-control" name="weight" id="weight" required>\n' +
                    '                </div>\n' +
                    '                <p class="description">Please, provide weight in KG format</p>\n' +
                    '            </div>');
                break
            case 'furniture':
                attribute.append('<div class="mb-3 row">\n' +
                    '                <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>\n' +
                    '                <div class="col-sm-4">\n' +
                    '                    <input type="number" class="form-control" name="height" id="height" required>\n' +
                    '                </div>\n' +
                    '            </div>');
                attribute.append('<div class="mb-3 row">\n' +
                    '                <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>\n' +
                    '                <div class="col-sm-4">\n' +
                    '                    <input type="number" class="form-control" name="width" id="width" required>\n' +
                    '                </div>\n' +
                    '            </div>');
                attribute.append('<div class="mb-3 row">\n' +
                    '                <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>\n' +
                    '                <div class="col-sm-4">\n' +
                    '                    <input type="number" class="form-control" name="length" id="length" required>\n' +
                    '                </div>\n' +
                    '                <p class="description">Please, provide dimensions in HxWxL format</p>\n' +
                    '            </div>');
                break
        }
    });

    button.click(function () {
        var submit = true;
        $(':input[required]', form).each(function () {
            if (this.value.trim() === '') {
                alert('Please, submit required data');
                submit = false;
                return false;
            }
        });
        if (!submit) {
            return false;
        } else {
            form.submit();
        }
    });
});