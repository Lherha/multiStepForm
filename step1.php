<div class="step" data-step="1">
    <h3>Enter Your Info</h3>
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="<?php echo isset($first_name) ? $first_name : ''; ?>" required>
        <?php if (isset($errors['first_name'])) { ?>
            <p class="error"><?php echo $errors['first_name']; ?></p>
        <?php } ?>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="<?php echo isset($last_name) ? $last_name : ''; ?>" required>
        <?php if (isset($errors['last_name'])) { ?>
            <p class="error"><?php echo $errors['last_name']; ?></p>
        <?php } ?>
    </div>
    <button type="submit" name="next">Next</button>
</div>
