<?php
$message = '';
$alert_class = 'success';
if ($this->session->userdata('success')):
    $message = $this->session->userdata('success');
    $this->session->unset_userdata('success');
    $class = 'success';
elseif ($this->session->userdata('error')):
    $message = $this->session->userdata('error');
    $this->session->unset_userdata('error');
    $class = 'danger';
elseif ($this->session->userdata('warning')):
    $message = $this->session->userdata('warning');  
    $this->session->unset_userdata('warning');
    $class = 'warning';
elseif ($this->session->userdata('info')):
    $message = $this->session->userdata('info');
    $this->session->unset_userdata('alert_info');
    $class = 'info';
endif;
?>


<div class="page-bar">
    <div class="page-title-breadcrumb"> 
            <?php if ($message):  ?>
            <div class="alert alert-<?php echo $class; ?> text-left" id="message_div"><?php echo $message; ?> </div>
            <?php endif; ?>
            
    </div>
</div>
