<div class="modal" id="delete">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Record?</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger btn-sm" style="width: 70px;">Delete</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal" id="bill">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Billing Statement</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Date: <strong><?= $date;?></strong></p>
                <p>Fullname: <strong><?= $fname.' '.$mname.' '.$lname.' '.$name_ex ?></strong></p>
                <p>Meter No: <strong><?= $meter;?></strong></p>
                <p>Previous reading: <strong><?= $prev_read;?></strong></p>
                <p>Present reading: <strong><?= $present_read;?></strong></p>
                <p>Amount: <strong><?= $amount;?></strong></p>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="window.print()">Print</button>
            </div>
            </div>
        </div>
        </div>
