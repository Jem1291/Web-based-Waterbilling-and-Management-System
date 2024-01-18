
<style>
    .col-lg-5{
        margin-top: 6%;
        margin-left: 40%;
    }
    .form-group{
        width: 500px;
    }
    .form-control{
        margin-bottom: 10px;
    }
    .btn{
        height:40px;
        width: 90px;

    }
    .drop-down{
        padding: 17px 11px;
        color: #333;
        background-color: #fff;
        border: 1px solid #dddd;
        cursor: pointer;
    }
    .dropdown{
        padding: 17px 11px;
        width: 300px;
        color: #333;
        background-color: #fff;
        border: 1px solid #dddd;
        cursor: pointer; 
    }
</style>
<body>
<div class="row">
    <div class="col-lg-5">
        <?= form_open('set_price');?>
            <h4>Update Price:</h4>
            <div class="form-group">
              <div class="form-floating mb-2" style="width: 450px;">
              <select name="choices" class="drop-down rounded-4" onchange="if (this.selectedIndex) window.location.href=this.value;">
              <?php if ($type != null) {
                    if ($type == 1) { ?>                  
                        <option value="<?= base_url('update_price/').'1';?>">Residential</option>
                        <option value="<?= base_url('update_price/').'2';?>">Commercial</option>
                    <?php } elseif($type == 2){?>
                        <option value="<?= base_url('update_price/').'2';?>">Commercial</option>
                        <option value="<?= base_url('update_price/').'1';?>">Residential</option>
                    <?php }?>
                <?php }?>
              </select>

              </div>
              <div class="form-floating mb-2" style="width: 400px;">
                <input type="text" name="present_rate" class="form-control rounded-4" id="floatingInput" placeholder="Previous Price" value="<?= $present?>">
                <label for="floatingset_valueInput">Previous Price:</label>
                <input type="hidden" name="type" value="<?= $type;?>">

              </div>
          <div class="form-floating mb-2" style="width: 400px;">
              <input type="text" name="new_price" class="form-control rounded-4" id="floatingInput" placeholder="New Price" value="">
              <label for="floatingset_valueInput">New Price:</label>
          </div>  
                    
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 200px;">
                    <button type="submit" name="submit" class="btn btn-success" style="width: 400px;">Update</button>
                </div>
                </div>
            </div>
                
        </div>







