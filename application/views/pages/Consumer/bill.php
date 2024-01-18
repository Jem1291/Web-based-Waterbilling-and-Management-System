<style>
    @media print{
        body  * {
            visibility: hidden  ;
        }
        .pbtn *{
            visibility: hidden  ;
        }
        .modal-content, .modal-content * {
            visibility: visible;
        }
    }
</style>

<div class="col-sm-10">
<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSheet">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-bottom-0">
        <h1 class="modal-title fs-5"><div class="logo d-flex">
      <img src="<?php echo base_url();?>assets/img/srwasa-icon.png" alt="" class="img" style="width: 30px; height: 30px; ">
      <div class="logo_name">SRWASA</div>
    </div></h1>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body py-0" style="padding-left: 120px; padding-right: 120px;">
        <p>Date: <strong>May 2023</strong></p>
        <p>Fullname: <strong><?= $fname.' '.$mname.' '.$lname.' '.$name_ex ?></strong></p>
        <p>Previous reading: <strong>10115</strong></p>
        <p>Present reading: <strong>10127</strong></p>
        <p>Amount: <strong>₱ 180.00</strong></p>
      </div>
      <div class="modal-footer flex-column align-items-stretch w-50 gap-2 pb-3 border-top-0">
        <div class="d-flex" style="align-content: center;">
        <button type="button" class="btn btn-lg btn-primary pbtn" onclick="window.print()">Print</button>
        <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>