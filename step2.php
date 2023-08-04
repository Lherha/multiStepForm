<div class="step" data-step="2">
    <h3>Enter Your Info</h3>
    <div class="form-group">
        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="male" <?php if ($gender === 'male') echo 'checked'; ?> required> Male
        <input type="radio" name="gender" value="female" <?php if ($gender === 'female') echo 'checked'; ?> required> Female
        <?php if (isset($errors['gender'])) { ?>
            <p class="error"><?php echo $errors['gender']; ?></p>
        <?php } ?>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
        <?php if (isset($errors['email'])) { ?>
            <p class="error"><?php echo $errors['email']; ?></p>
        <?php } ?>
    </div>
    <button type="button" onclick="goToStep(1)">Previous</button>
    <button type="submit" name="next">Next</button>
</div>
