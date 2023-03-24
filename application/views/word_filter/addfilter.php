<!DOCTYPE html>
<html>
<head>
    <title>Add Foul Words</title>
</head>
<body>
    <?php if($this->session->tempdata('success',1)) : ?>
    <?= '<p class="alert alert-success">'.$this->session->tempdata('success',1).'</p>'?>
    <?php endif;?>
    <?= validation_errors();?>
    <?php if($this->session->tempdata('error',1)) : ?>
        <?= '<p class="alert alert-danger">'.$this->session->tempdata('error',1).'</p>'?>
    <?php endif;?>

    <?php echo form_open('Words_filter/addlist'); ?>

    <label for="words">Foul Words</label>
    <!-- <input type="text" name="word" id="word"  value="<?php echo set_value('word'); ?>" /> -->
    <div class="form-group">
    <textarea type="text" id="word" cols="30" name="word" rows="10"><?php echo set_value('word'); ?></textarea>
    </div>
    <button type="submit">Add Foul Words</button>

    <?php echo form_close(); ?>
</body>
</html>
