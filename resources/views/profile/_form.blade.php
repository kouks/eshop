<form action="" method="POST">
    <h3 class="title is-5 has-text-centered">General</h3>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label for="name" class="label">Name</label>
        </div>

        <div class="field-body">
            <div class="control">
                <input id="name" name="name" type="text" value="Jon Doe" class="input is-subtle">
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label for="phone" class="label">Phone</label>
        </div>

        <div class="field-body">
            <div class="control">
                <input id="phone" name="phone" type="text" value="070 8235 8926" class="input is-subtle">
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Email</label>
        </div>

        <div class="field-body">
            <p class="control">
                <input type="text" value="jon@doe.com" disabled class="input is-subtle">
            </p>
        </div>
    </div>

    <hr>
    <h3 class="title is-5 has-text-centered">Address</h3>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label for="street" class="label">Street</label>
        </div>

        <div class="field-body">
            <p class="control">
                <input id="street" name="street" type="text" value="95 Guild Street" class="input is-subtle">
            </p>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label for="city" class="label">City</label>
        </div>

        <div class="field-body">
            <p class="control">
                <input id="city" name="city" type="text" value="London" class="input is-subtle">
            </p>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label for="country" class="label">Country</label>
        </div>

        <div class="field-body">
            <p class="control">
                <input id="country" name="country" type="text" value="Great Britain" class="input is-subtle">
            </p>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label for="postcode" class="label">Postcode</label>
        </div>

        <div class="field-body">
            <p class="control">
                <input id="postcode" name="postcode" type="text" value="NW5 3UF" class="input is-subtle">
            </p>
        </div>
    </div>

    <hr>

    <div class="field">
        <button type="submit" class="button is-primary">Save</button>
        <a href="/profile" class="button is-default">Discard</a>
    </div>
</form>
