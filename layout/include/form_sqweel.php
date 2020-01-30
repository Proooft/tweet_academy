<div class="container wrap">
	<h1 class="resume_actualite">Resume de actualite</h1>
    <form name="form1" method="post" action="fil_actualite.php?action=commentaire&color=true">
        <div>
            <textarea name="tweet_text" id="" cols="80" rows="5" placeholder="Votre Tweet ici" required><?php if(isset($_GET['user'])) { ?>@<?php echo $_GET['user'] . " "; }?></textarea>

            <input type="hidden" name="id" <?php if(isset($_GET['id'])) { ?>value="<?php echo $_GET['id']; }?>">
        </div>
        <input type="submit" <?php if (isset($_GET['id'])) { ?>name="resqweel"<?php } else { ?>name="sqweel"<?php } ?>value="Sqweel">
    </form>
</div>