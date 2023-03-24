<html>
    <head>

    </head>
    <body>
        <form action="<?php echo base_url('Words_filter/save_comment'); ?>" method="post">
        <label for="comment">Comment:</label>
        <div class="form-group">
            <textarea name="comment" cols="30" rows="10"></textarea>
        </div>
        <button type="submit">Submit</button>
        </form>

    </body>
</html>