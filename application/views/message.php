<?php if ($this->session->has_userdata('error')) { ?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    <i class=""></i><?= $this->session->flashdata('error'); ?>
</div>
<?php } ?>