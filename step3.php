<div class="step" data-step="3">
    <h3>Enter Your Info</h3>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <?php if (isset($errors['password'])) { ?>
            <p class="error"><?php echo $errors['password']; ?></p>
        <?php } ?>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" value="<?php echo isset($address) ? $address : ''; ?>" required>
        <?php if (isset($errors['address'])) { ?>
            <p class="error"><?php echo $errors['address']; ?></p>
        <?php } ?>
    </div>
    <div class="form-group">
        <label for="mobile_no">Mobile Number</label>
        <input type="tel" name="mobile_no" value="<?php echo isset($mobile_no) ? $mobile_no : ''; ?>" required>
        <?php if (isset($errors['mobile_no'])) { ?>
            <p class="error"><?php echo $errors['mobile_no']; ?></p>
        <?php } ?>
    </div>
    <button type="button" onclick="goToStep(2)">Previous</button>
    <button type="submit" name="submit">Submit</button>
</div>
