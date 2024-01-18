<style>
    body{
        background-color: #E5E5E5;
    }
    .col-sm-10{
        margin-top: 60px;
        margin-left: 16.66666667%;
    }

    .box{
        background-color: #ffff;
        width: 400px;
        height: 350px;
        transform: translate(350px, 25px);
    }
    h3{
        padding: 10px;
    }

    .inputs{
        padding-left: 50px;
    }
    .drop-down{
        padding: 17px 11px;
        color: #333;
        background-color: #fff;
        border: 1px solid #dddd;
        cursor: pointer;
        width: 100px;
    }
    
</style>
<body>

<div class="col-sm-10">
    <?= form_open('add_expenses'); ?>
    <div class="container">
        <div class="box">
            <h3>Expenses:</h3>
            <div class="inputs">
                <div class="content d-flex">
                    <div class="form-floating mb-2" style="width: 200px;">
                        <input type="text" name="qty" class="form-control rounded-4" id="qty" placeholder="Quantity:" value="<?= set_value('qty'); ?>" required>
                        <label for="qty">Quantity:</label>
                    </div>

                    <div class="form-floating mb-2">
                        <select name="UOM" class="drop-down rounded-4" required>
                            <option selected disabled>UOM:</option>
                            <option value="kg" <?= set_select('UOM', 'kg'); ?>>kg</option>
                            <option value="pcs" <?= set_select('UOM', 'pcs'); ?>>pcs</option>
                            <option value="meters" <?= set_select('UOM', 'meters'); ?>>meters</option>
                        </select>
                    </div>
                </div>
                <div class="form-floating mb-2" style="width: 300px;">
                    <input type="text" name="Description" class="form-control rounded-4" id="Description" placeholder="Description:" value="<?= set_value('Description'); ?>" required>
                    <label for="Description">Description:</label>
                </div>

                <div class="form-floating mb-2" style="width: 300px;">
                    <input type="text" name="amount" class="form-control rounded-4" id="amount" placeholder="Amount:" value="<?= set_value('amount'); ?>" required>
                    <label for="amount">Amount:</label>
                </div>

                <div class="btn">
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 200px;">Submit</button>
                </div>
            </div>
        </div>
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    </div>
    <?= form_close(); ?>
</div>
</body>
