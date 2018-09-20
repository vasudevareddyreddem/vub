<head>
<meta property="og:url" content="<?php echo base_url('institutes/page/'.base64_decode($details['i_id']).'/'.$details['i_name']); ?>" />
<meta property="fb:app_id" content="219204818951085" /> 
<meta property="og:type"   content="website" /> 
<meta property="og:title"  content="<?php echo $details['i_name']; ?>" /> 
<meta property="og:description" content="<?php echo $details['i_about']; ?>" />
<?php if(isset($details['i_logo']) && $details['i_logo']!=''){ ?>
<meta property="og:image"  content="<?php echo base_url('assets/institute_logo/'.$details['i_logo']); ?>" /> 
<?php }else{ ?>
<meta property="og:image"  content="" /> 
<?php } ?>
<meta http-equiv="refresh" content="0; url=<?php echo base_url('institutes/page/'.base64_decode($details['i_id']).'/'.$details['i_name']); ?>" />



<meta name="twitter:creator" content="<?php echo $details['i_name']; ?>">
<meta name="twitter:title" content="<?php echo $details['i_name']; ?>">
<meta name="twitter:description" content="<?php echo $details['i_about']; ?>">
<meta name="twitter:image" content="<?php echo base_url('assets/files/'.$post_images['p_list'][0]['imgname']); ?>">
<?php if(isset($details['i_logo']) && $details['i_logo']!=''){ ?>
<meta name="twitter:image"  content="<?php echo base_url('assets/institute_logo/'.$details['i_logo']); ?>" /> 
<?php }else{ ?>
<meta name="twitter:image"content="" /> 
<?php } ?>


<meta name="title" property="og:title" content="<?php echo $details['i_name']; ?>">
 <meta property="og:type" content="website"> 
 <?php if(isset($details['i_logo']) && $details['i_logo']!=''){ ?>
<meta name="image" property="og:image"  content="<?php echo base_url('assets/institute_logo/'.$details['i_logo']); ?>" /> 
<?php }else{ ?>
<meta name="image" property="og:image"  content="" /> 
<?php } ?>
 <meta name="description" property="og:description" content="<?php echo $details['i_about']; ?>">
 <meta name="author" content="<?php echo $details['i_name']; ?>">