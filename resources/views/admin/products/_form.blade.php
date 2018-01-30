<form action="/admin/products" method="POST" class="box" enctype="multipart/form-data">
    <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input class="input" type="text" name="name" placeholder="Product Name">
        </div>
    </div>

    <div class="field">
        <label class="label">Description</label>
        <div class="control">
            <input class="input" type="text" name="description" placeholder="Product Description">
        </div>
    </div>

    <div class="columns">
        <div class="column is-4-tablet">
            <div class="field">
                <label class="label">Category</label>
                <div class="control">
                    <div class="select">
                        <select name="category">
                            <option value="1">Men</option>
                            <option value="2">Women</option>
                            <option value="3">Kids</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="column is-4-tablet">
            <div class="field">
                <label class="label">Stock</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static">#</i></a>
                    </p>
                    <p class="control">
                        <input class="input" type="number" name="stock" placeholder="Stock Count">
                    </p>
                </div>
            </div>
        </div>

        <div class="column is-4-tablet">
            <div class="field">
                <label class="label">Price</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static"><i class="fa fa-gbp"></i></a>
                    </p>
                    <p class="control">
                        <input class="input" type="number" name="price" step="0.01" placeholder="Price">
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <label class="label">Product Image</label>
        <div class="file has-name is-fullwidth">
            <label class="file-label">
                <input class="file-input" type="file" name="resume" id="product-image">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fa fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Choose an image...
                    </span>
                </span>
                <span class="file-name" id="product-image-name">
                    Product Image
                </span>
            </label>
        </div>
    </div>

    <hr>

    <div class="field is-grouped">
        <div class="control">
            <button type="submit" class="button is-primary">Submit</button>
        </div>

        <div class="control">
            <a href="/admin" class="button is-text">Cancel</a>
        </div>
    </div>
</form>
