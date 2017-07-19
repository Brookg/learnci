    <?php echo validation_errors(); ?>
    <?php echo form_open('news/create') ?>
        <p>
            <label for="title">Title</label>
            <input type="text" name="title" />
        </p>
        <p>
            <label for="text">Content</label>
            <textarea name="text"></textarea>
        </p>
        <p><input type="submit" name="submit" value="Create news item" /></p>
    </form>