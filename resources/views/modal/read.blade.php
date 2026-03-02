<div class="modal fade" id="read-message-modal" tabindex="-1" aria-labelledby="readmessageModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">     
    <div class="modal-content">                            
      <div class="modal-header border-bottom-0 justify-content-between">
        <h5 class="modal-title fw-semibold">Message</h5>
        <button class="btn bg-none" type="button" data-bs-dismiss="modal">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>From:</strong> <span id="message-fullname"></span></p>
        <p><strong>Email:</strong> <span id="message-email"></span></p>
        <p><strong>Message:</strong></p>
        <p id="message-content"></p>
      </div>
      <div class="modal-footer">
        <a id="message-reply-btn" class="btn btn-primary">
          <i class="fa-solid fa-reply"></i> Reply
        </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#edit-message-modal" >Back</button>
      </div>
    </div>
  </div>
</div>